<?php

require_once("config.php");

/**
 * The db_objects class holds all database query and related functions
 *
 * @package     Database management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */
class Database {

    public $connection;

    /**
     * Construct to open database connection.
     */ 
    function __construct() {
        $this->open_db_connection();
    }

    /**
     * Open database connection.
     * 
     * Variables passed in are from db_object.php
     * 
     */     
    public function open_db_connection() {
        $this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        if($this->connection->connect_errno) {
            die("Database Connection Failed." . " " . $this->connection->connect_error);
        }
    }

    /**
     * Method that all SQL queries are pased through.
     * 
     * @param string $sql canned and custom queries
     * 
     * @return array an array collection of data retrieved from database
     */     
    public function query($sql) {
        $result = $this->connection->query($sql);
        $this->confirm_query($result);
        return $result;
    }

    /**
     * Confirm that query passed or failed.
     * 
     */     
    private function confirm_query($result) {
        if(!$result) {
            die("Query Failed." . " " . $this->connection->error);
        }
    }

    /**
     * Escape strings for sanitization.
     * 
     * @param string $string data/string to be escaped for sanitizing data passed through from front end
     * 
     * @return string
     */     
    public function escape_string($string) {
        $escaped_string = $this->connection->real_escape_string($string);
        return $escaped_string;
    }

    /**
     * Return last inserted ID.
     * 
     * @return int
     */ 
    public function the_insert_id() {
        return mysqli_insert_id($this->connection);
    }

}

$database = new Database();

?>