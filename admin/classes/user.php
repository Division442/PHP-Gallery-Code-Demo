<?php

class User extends Db_object {

    protected static $db_table = "users";
    protected static $db_table_fields = array('username', 'password', 'first_name', 'last_name', 'user_level', 'user_image', 'created', 'description', 'bio');

    public $id;
    public $username;
    public $first_name;
    public $last_name;
    public $user_level;
    public $password;
    public $user_image;
    public $created;
    public $decrypted_password;
    public $description;
    public $bio;
    private static $upload_directory = "images";
    private static $image_placeholder = "https://via.placeholder.com/150";

    public function image_path_and_placeholder() {
        return empty($this->user_image) ? self::$image_placeholder : self::$upload_directory.DS.$this->user_image;
    }


    public static function verify_user($username, $password) {

        global $database;

        $username = $database->escape_string($username);
        $user_password = $database->escape_string($password);

        // First, pull password from database - need to add an IF statement to toggle onlu if a result is found
        $set_encrypted_password = self::get_encrypted_password($username);
        if(!empty($set_encrypted_password)) {
            foreach($set_encrypted_password as $user_query) {
                if($user_query) {
                    $encrypted_password = $user_query;
                }
            }
        } else {
            $encrypted_password = "";
        }

        if (password_verify($user_password, $encrypted_password)) {
            $password = $encrypted_password;
            $sql = "SELECT * FROM " . self::$db_table . " " . " WHERE username ='{$username}' AND password='{$password}' AND deleted is NULL LIMIT 1";
            $the_result_array = self::find_by_query($sql);
            return !empty($the_result_array) ? array_shift($the_result_array) : false;
        }
    }

    private static function get_encrypted_password($username) {
        $sql_password = "SELECT password FROM " . self::$db_table . " " . " WHERE username ='{$username}' AND deleted is NULL LIMIT 1";
        $the_password_result_array = self::find_by_query($sql_password);
        return !empty($the_password_result_array) ? array_shift($the_password_result_array) : false;
    }

    public function ajax_save_user_image($user_image, $user_id) {
        global $database;

        $user_image = $database->escape_string($user_image);
        $id = $database->escape_string($user_id);

        $this->user_image = $user_image;
        $this->user_id = $user_id;

        $sql  = "UPDATE " . self::$db_table . " SET user_image = '{$this->user_image}' ";
		$sql .= " WHERE id = {$this->user_id} ";
		$update_image = $database->query($sql);

		
		echo $this->image_path_and_placeholder();

    }

    public function delete_user_photo() {

		if($this->delete()) {
            // TODO: Commented out until I convert the call to this function to another function that does not delete the photo.
			// $target_path = SITE_ROOT . DS . 'admin' . DS . $this->image_path_and_placeholder();
            // return unlink($target_path) ? true : false;
            return true;
			
		} else {
			return false;
		}
    }
    
    public function set_file($file) { 

		if(empty($file) || !$file || !is_array($file)) {
		    $this->errors[] = "There was no file uploaded here";
		    return false;

		} elseif($file['error'] !=0) {

		    $this->errors[] = $this->upload_errors_array[$file['error']];
		    return false;

		} else {
            $file_name_holder   = pathinfo(basename($file['name']));
            $seoFileName        = Photo::seoUrl($file_name_holder['filename'] . '-' . uniqid() . '.' . $file_name_holder['extension']);
            $this->user_image   = $seoFileName;
            $this->tmp_path     = $file['tmp_name'];
            $this->type         = $file['type'];
            $this->size         = $file['size'];
		}

    }


    public function upload_photo() {

        if(!empty($this->errors)) {
            return false;
        }

        if(empty($this->user_image) || empty($this->tmp_path)){
            $this->errors[] = "the file was not available";
            return false;
        }

        $target_path = SITE_ROOT . DS . 'admin' . DS . self::$upload_directory . DS . $this->user_image;

        if(file_exists($target_path)) {
            $this->errors[] = "The file {$this->user_image} already exists,  please select another file to upload.";
            return false;
        }

        if(move_uploaded_file($this->tmp_path, $target_path)) {

            
            unset($this->tmp_path);
            return true;
            

        } else {
            $this->errors[] = "The file directory permissions need to be checked for write access.";
            return false;
        }

    }

// End of user class - don't place functions here.    
}
?>