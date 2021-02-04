<?php 

/**
 * The photo class manages
 * - Uploading new photos
 * - Editing existing photos
 * - Setting photo directory paths to display
 *
 * @package     Photo management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */

class Photo extends Db_object {


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
     * @var array create array with file related error messages (used to notify user of file upload errors)
     * 
     */

    protected static $db_table = "photos";
    protected static $db_table_id = "photo_id";
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


    /**
     * Check that an image has been passed from the user creation or update methods. 
     * 
     * If there are no errors the file name is modified with the addition of a uniqid to ensure file is not overwritten.
     * 
     * @param mixed $file/s that are selected to upload for user image
     * @return boolean|string
     * 
     */
    public function set_file($file) { 

		if(empty($file) || !$file || !is_array($file)) {
		    $this->errors[] = "There was no file uploaded here";
		    return false;

		}   elseif($file['error'] !=0) {

		    $this->errors[] = $this->upload_errors_array[$file['error']];
		    return false;

		} else {

            $file_name_holder = pathinfo(basename($file['name']));
            $seoFileName = $this->seoUrl($file_name_holder["filename"] . "-" . uniqid() . "." . $file_name_holder["extension"]);

            $this->filename = $seoFileName;
            $this->original_file_name = basename($file['name']);
            $this->tmp_path = $file['tmp_name'];
            $this->type     = $file['type'];
            $this->size     = $file['size'];
		}

    }

    /**
     * Check that an image has been passed from the user creation or update methods. 
     * 
     * If there are no errors the file name is modified with the addition of a uniqid to ensure file is not overwritten.
     * 
     * @return boolean true if photo upload successful, false if there is an error
     * 
     */
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
    
    /**
     * Sets the image file path.
     * 
     * @return string
     */
    public function picture_path() {
        return $this->upload_directory.DS.$this->filename;
	}
    
    /**
     * Legacy function that hard deleted a photo.
     * 
     * @todo delete method and refactor code that references
     * 
     * @return boolean
     */
	public function delete_photo() {

		if($this->delete()) {
            // Hard delete from database doesn't happen so deleting the photos shouldn't happen. 
			//$target_path = SITE_ROOT . DS . 'admin' . DS . $this->picture_path();

            //return unlink($target_path) ? true : false;
            return true;
			
		} else {
			return false;
		}
    }
    
    /**
     * Legacy function that displayed photo data on ajax driver modal when viewing image. 
     * 
     * @todo delete method and refactor code that references
     * 
     * @return string
     */
    public static function display_sidebar_data($photo_id) {

		$photo = Photo::find_by_id($photo_id);

		$output = "<p><strong>Filename:</strong> {$photo->filename}</p>";
		$output .= "<p><strong>Type:</strong> {$photo->type}</p>";
		$output .= "<p><strong>Size:</strong> {$photo->size}</p>";

		echo $output;

    }
    
    /**
     * Converts filename into SEO friendly file name.
     * 
     * @param string $string 
     * @return string
     */
    public static function seoUrl($string) {
        $string = strtolower($string);
        $string = preg_replace("/[\s-]+/", " ", $string);
        $string = preg_replace("/[\s_]/", "-", $string);
        return $string;
    }


}


?>