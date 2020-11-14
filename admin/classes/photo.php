<?php 

class Photo extends Db_object {

    protected static $db_table = "photos";
    protected static $db_table_fields = array('title', 'description', 'filename', 'type', 'size', 'caption', 'alt_text', 'user_id', 'created', 'original_file_name');

    public $id;
    public $title;
    public $description;
    public $filename;
    public $original_file_name;
    public $type;
	public $size;
	public $caption;
    public $alt_text;
    public $user_id;
    public $created;

    public $tmp_path;
    public $upload_directory = "images";
    public $errors = array();
    public $upload_errors = array(
                            UPLOAD_ERR_OK           => "There is no error",
                            UPLOAD_ERR_INI_SIZE		=> "The uploaded file exceeds the upload_max_filesize directive in php.ini",
                            UPLOAD_ERR_FORM_SIZE    => "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form",
                            UPLOAD_ERR_PARTIAL      => "The uploaded file was only partially uploaded.",
                            UPLOAD_ERR_NO_FILE      => "No file was uploaded.",               
                            UPLOAD_ERR_NO_TMP_DIR   => "Missing a temporary folder.",
                            UPLOAD_ERR_CANT_WRITE   => "Failed to write file to disk.",
                            UPLOAD_ERR_EXTENSION    => "A PHP extension stopped the file upload.");

    // This is passing $_FILES['uploaded_file'] as an argument.
    public function set_file($file) { 

		if(empty($file) || !$file || !is_array($file)) {
		    $this->errors[] = "There was no file uploaded here";
		    return false;

		}   elseif($file['error'] !=0) {

		    $this->errors[] = $this->upload_errors_array[$file['error']];
		    return false;

		} else {

            $file_name_holder = pathinfo(basename($file['name']));
            $seoFileName = $this->seoUrl($file_name_holder['filename'] . '-' . uniqid() . '.' . $file_name_holder['extension']);

            $this->filename = $seoFileName;
            $this->original_file_name = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
		}

    }


	public function save() {

		if($this->id) {
			$this->update();
		} else {
			if(!empty($this->errors)) {
				return false;
			}

			if(empty($this->filename) || empty($this->tmp_path)){
				$this->errors[] = "The file was not available.";
				return false;
			}

			$target_path = SITE_ROOT . DS . 'admin' . DS . $this->upload_directory . DS . $this->filename;

			if(file_exists($target_path)) {
				$this->errors[] = "The file {$this->filename} already exists,  please select another file to upload.";
				return false;
			}

			if(move_uploaded_file($this->tmp_path, $target_path)) {

				if(	$this->create()) {
					unset($this->tmp_path);
					return true;
				}

			} else {
				$this->errors[] = "The file directory permissions need to be checked for write access.";
				return false;
			}
	   	}

    }
    
    public function picture_path() {
        return $this->upload_directory.DS.$this->filename;
	}
	
	public function delete_photo() {

		if($this->delete()) {
			//$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();

            //return unlink($target_path) ? true : false;
            return true;
			
		} else {
			return false;
		}
    }
    
    public static function display_sidebar_data($photo_id) {

		$photo = Photo::find_by_id($photo_id);

		$output = "<p><strong>Filename:</strong> {$photo->filename}</p>";
		$output .= "<p><strong>Type:</strong> {$photo->type}</p>";
		$output .= "<p><strong>Size:</strong> {$photo->size}</p>";

		echo $output;

    }
    
    public static function seoUrl($string) {

        //Lower case everything
        $string = strtolower($string);
        //Make alphanumeric (removes all other characters)
        $string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
        //Clean up multiple dashes or whitespaces
        $string = preg_replace("/[\s-]+/", " ", $string);
        //Convert whitespaces and underscore to dash
        $string = preg_replace("/[\s_]/", "-", $string);

        return $string;
    }


}


?>