<?php

/**
 * The db_objects class holds all database query and related functions
 *
 * @package     Database management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */
class Db_object {

    /**
     * Default query to pull all records based on values passed in.
     * 
     * @return array an array collection of data retrieved from database
     */ 
    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE deleted is NULL");
    }

    /**
     * Default query to pull all photos uploaded by the logged in user.
     * 
     * @param string User ID stored within the $_SESSION["id"] variable
     * 
     * @return array an array collection of data retrieved from database
     */ 
    public static function find_all_user_photos() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id = {$_SESSION["id"]} and deleted is NULL");
    }

    /**
     * Query to find item by specific ID.
     * 
     * @param string $id ID of item to be pulled from database
     * 
     * @return array an array collection of data retrieved from database
     */ 
    public static function find_by_id($id) {

        global $database;

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = {$id} and deleted is NULL");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }

    /**
     * Find user based on user ID passed in.
     * 
     * @param string $id ID of item to be pulled from database
     * 
     * @return array an array collection of data retrieved from database
     */ 
    public static function find_by_user_id($id) {

        global $database;

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE user_id = {$id}");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
    
    /**
     * Custom queries are passed through here.
     * 
     * @param string $sql custom SQL
     * 
     * @return array an array collection of data retrieved from database
     */ 
    public static function find_by_query($sql) {

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;

    }

    /**
     * Basic data modelling.
     * 
     * Used by the find_by_query method to create an array of data from the returned query
     * 
     * @param array $the_record
     * 
     * @return array
     */ 
    public static function instantiation($the_record) {

        $calling_class = get_called_class();
        $the_object = new $calling_class;
        foreach($the_record as $the_attribute => $value) {
            if($the_object->has_the_attribute($the_attribute)) {
                $the_object->$the_attribute = $value;
            }
        }
        return $the_object;
    }

    /**
     * Gets the properties of the supplied data.
     * 
     * Used by the instantiation method 
     * 
     * @param array $the_attribute
     * 
     * @return array
     */ 
    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

    /**
     * Gets the properties of the supplied data.
     * 
     * Used by the instantiation method 
     * 
     * @param array $the_attribute
     * 
     * @return array
     */ 
    public function create() {
        global $database;

        $properties = $this->clean_properties();

        $sql = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ")";
        $sql .= "VALUES ('" . implode("','", array_values($properties)) ."')";


        if($database->query($sql)) {
            $this->id = $database->the_insert_id();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Save method.
     * 
     * Checks that an ID exists, if so, passes to update method, if not, passes to create method
     * 
     * @return null
     */ 
    public function save() {
        return isset($this->id) ? $this->update() : $this->create();
    }

    /**
     * Update method.
     * 
     * Paramaters are passed in via the class static table properties
     * 
     * @return boolean true if no errors, false if errors
     */ 
    public function update() {
		global $database;
		$properties = $this->clean_properties();
		$properties_pairs = array();

        // Table column fields passed in with values assigned to field
		foreach ($properties as $key => $value) {
			$properties_pairs[] = "{$key}='{$value}'";
		}

		$sql = "UPDATE  " .static::$db_table . "  SET ";
		$sql .= implode(", ", $properties_pairs);
		$sql .= " WHERE id= " . $database->escape_string($this->id);

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	}

    /**
     * Delete method.
     * 
     * Do not hard delete data, set the deleted field to a timestamp when user was deleted
     * Useful for archiving purposes and reporting
     * 
     * @return boolean true if no errors, false if errors
     */ 
    public function delete() {
        global $database;

        $sql = "UPDATE " .static::$db_table . " SET deleted = " . "'" . date('Y-m-d H:i:s') . "'";
        $sql .= " WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    /**
     * Delete method for users.
     * 
     * Created a specific method for deleting users as the ID field is named differently from other tables.
     * This is to be refactored so the name os the specific table ID is passed in via class private property $db_table_id.
     * 
     * Do not hard delete data, set the deleted field to a timestamp when user was deleted.
     * Useful for archiving purposes and reporting.
     * @todo Need to loop through images and pull ID's to delete comments associated with the deleted account
     * @return boolean true if no errors, false if errors
     */ 
    public function delete_user_content($user_id) {
        global $database;

        // Can be used for any table using the user_id value to track
        $sql = "UPDATE " .static::$db_table . " SET deleted = " . "'" . date('Y-m-d H:i:s') . "'";
        $sql .= " WHERE user_id = " . $database->escape_string($user_id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    /**
     * Create an array from database table fields passed in through each class.
     * 
     * @return array of database table fields that are set within each individual class
     */     
    protected function properties() {

        $properties = array();

        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    /**
     * Clean all data that is to be passed in through various methods.
     * 
     * @return array of cleaned data
     */    
    protected function clean_properties() {
        global $database;
        $clean_properties = array();

        // Escape string function contained within the database class
        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }

    /**
     * Pulls all records from passed in table.
     * 
     * Used to create counts eye candy on dashboard
     * Serves no purpose other than that
     * @todo remove and convert
     * 
     * @return array holding record count
     */
    public static function count_all() {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " " . "where deleted IS NULL";
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }

    /**
     * Pulls all records from photos table uploaded by logged in user.
     * 
     * Used to create counts eye candy on dashboard
     * Serves no purpose other than that
     * @todo remove and convert
     * 
     * @param int $user_id usually passed in via a session var specific to the userID 
     * 
     * @return array holding record count
     */
    public static function count_all_user_photos($user_id) {
        global $database;
        $sql = "SELECT COUNT(*) FROM " . static::$db_table . " " . "where deleted IS NULL AND user_id = $user_id";
        $result_set = $database->query($sql);
        $row = mysqli_fetch_array($result_set);
        return array_shift($row);
    }
    
}

?>