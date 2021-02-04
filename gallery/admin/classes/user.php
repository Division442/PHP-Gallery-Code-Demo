<?php

/**
 * The userclass manages all user related methods
 *
 * @package     User management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */


class User extends Db_object {

    /**
     * Default config for this object.
     *
     * - `db_table` name of database table
     * - `db_table_fields` table fields the application communicates with
     * - `db_table_id` the primary key ID field for the table
     * 
     * @todo convert SQL queries to pass $db_table_id through to database related query methods. Currently table ID's are named ID, lacks flexibility of specific primary key ID's.
     * 
     * @var string public variables for the database table fields
     * @var string private variables needed for application to prevent them from being passed into query results
     * 
     */
    protected static $db_table = "users";
    protected static $db_table_id = "user_id";
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

    /**
     * Sets the image file path for the user image.
     * 
     * @return string
     */
    public function image_path_and_placeholder() {
        return empty($this->user_image) ? self::$image_placeholder : self::$upload_directory.DS.$this->user_image;
    }

    /**
     * Find a user record using the username and password provided.
     * 
     * Pass username/password then pull enrypted password from database and compare with password_verify.
     * 
     * @param string $username
     * @param string $password plain text password passed from login form
     * 
     * @return boolean true|false either user exists or they don't or the login information wasn't valid
     */
    public static function verify_user($username, $password) {

        global $database;

        $username = $database->escape_string($username);
        $user_password = $database->escape_string($password);

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

    /**
     * Pull enrypted password from database from supplied username.
     *
     * @param string $username The username/identifier
     * 
     * @return array|false Either false on failure, or an array of user data.
     */
    private static function get_encrypted_password($username) {
        $sql_password = "SELECT password FROM " . self::$db_table . " " . " WHERE username ='{$username}' AND deleted is NULL LIMIT 1";
        $the_password_result_array = self::find_by_query($sql_password);
        return !empty($the_password_result_array) ? array_shift($the_password_result_array) : false;
    }

    /**
     * Legacy method to save user image from a modal window offering the user a range of images uploaded to the gallery admin.
     * 
     * @todo Delete and refactor any code that uses this function
     * 
     * @deprecated no longer in use and will be removed in later versions
     * @param string $user_image The username/identifier.
     * @param int $user_id The users password.
     * 
     * @return string calls method image_path_and_placeholder to image file path for the user image 
     */
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

    /**
     * Legacy method to delete user photo.
     * 
     * Images are not hard deleted, deleted is handled via delete flag in database table.
     * 
     * @deprecated will be refactored into other functions as hard delete of images no longer happens
     * @todo Commented out the hard delete until I refactor legacy code back into other methods.
     * @param string $user_image The username/identifier.
     * @param int $user_id The users password.
     * 
     * @return string calls method image_path_and_placeholder to image file path for the user image 
     */
    public function delete_user_photo() {

		if($this->delete()) {
			// $target_path = SITE_ROOT . DS . 'admin' . DS . $this->image_path_and_placeholder();
            // return unlink($target_path) ? true : false;
            return true;
			
		} else {
			return false;
		}
    }
    
    /**
     * - Check that an image has been passed from the user creation or update methods.
     * 
     * - If there are no errors the file name is modified with the addition of a uniqid to ensure file is not overwritten.
     * 
     * @param mixed $file/s that are selected to upload for user image
     * 
     */
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

    /**
     * Takes image/file and uploads to upload directory.
     * 
     * Checks if file is empty, if not set target path and upload.
     * 
     * @return boolean
     */
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

// End of user class   
}
?>