<?php

class Db_object {

    protected static $db_table = "users";

    public static function find_all() {
        return static::find_by_query("SELECT * FROM " . static::$db_table . " ");
    }

    public static function find_by_id($id) {

        global $database;

        $the_result_array = static::find_by_query("SELECT * FROM " . static::$db_table . " WHERE id = $id LIMIT 1");
        return !empty($the_result_array) ? array_shift($the_result_array) : false;

    }
    
    public static function find_by_query($sql) {

        global $database;
        $result_set = $database->query($sql);
        $the_object_array = array();

        while ($row = mysqli_fetch_array($result_set)) {
            $the_object_array[] = static::instantiation($row);
        }

        return $the_object_array;

    }

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

    private function has_the_attribute($the_attribute) {
        $object_properties = get_object_vars($this);
        return array_key_exists($the_attribute, $object_properties);
    }

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

    public function save() {
        return isset($this->user_id) ? $this->update() : $this->create();
    }


    // TODO; Refactor to remove the update_user() method - this is duplicating code.
    public function update() {
		global $database;
		$properties = $this->clean_properties();
		$properties_pairs = array();

		foreach ($properties as $key => $value) {
			$properties_pairs[] = "{$key}='{$value}'";
		}

		$sql = "UPDATE  " .static::$db_table . "  SET ";
		$sql .= implode(", ", $properties_pairs);
		$sql .= " WHERE id= " . $database->escape_string($this->id);

		$database->query($sql);

		return (mysqli_affected_rows($database->connection) == 1) ? true : false;
	}

    public function update_user() {
        global $database;
        $properties = $this->clean_properties();
        $property_pairs = array();

        foreach ($properties as $key => $value) {
            $property_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$db_table . " SET ";
        $sql .= implode(", ", $property_pairs);
        // No longer required due to abstraction! Yah!
        // $sql .= "username = '" . $database->escape_string($this->username)      . "', ";
        // $sql .= "password = '" . $database->escape_string($this->password)      . "', ";
        // $sql .= "first_name = '" . $database->escape_string($this->first_name)    . "', ";
        // $sql .= "last_name = '" . $database->escape_string($this->last_name)     . "' ";
        $sql .= " WHERE user_id = " . $database->escape_string($this->user_id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    // TODO: convert function to set delete date within database - NEVER remove a record completely unless for a specific reason. For that I will need a recursive delete that will purge ALL references to user.
    public function delete() {
        global $database;

        $sql = "DELETE FROM " . static::$db_table . " ";
        $sql .= " WHERE id = " . $database->escape_string($this->id);

        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    protected function properties() {
        //return get_object_vars($this);

        $properties = array();

        foreach (static::$db_table_fields as $db_field) {
            if(property_exists($this, $db_field)) {
                $properties[$db_field] = $this->$db_field;
            }
        }

        return $properties;
    }

    protected function clean_properties() {
        global $database;
        $clean_properties = array();

        foreach ($this->properties() as $key => $value) {
            $clean_properties[$key] = $database->escape_string($value);
        }

        return $clean_properties;
    }


    
}

?>