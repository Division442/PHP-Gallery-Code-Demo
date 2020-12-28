<?php

/**
 * The comments class holds all related methods
 *
 * @package     Comments management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */

class Comment extends Db_object {

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

    protected static $db_table = "comments";
    protected static $db_table_id = "photo_id";
    protected static $db_table_fields = array('photo_id', 'author', 'body', 'created');

    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $created;

    /**
     * Insert comment provided through front end.
     * 
     * @param int $photo_id
     * @param string $author
     * @param string $body
     * @param string $created
     * 
     * @return bool|string
     */        
    public static function create_comment($photo_id, $author, $body, $created) {
        if(!empty($photo_id) && !empty($author) && !empty($body)) {
            
            $comment = new Comment();
            
            $comment->photo_id  = (int) $photo_id;
            $comment->author    = (string) $author;
            $comment->body      = (string) $body;
            $comment->created   = (string) $created;

            return $comment;
        } else {
            return false;
        }
    }
    
    /**
     * Find all comments related to specific photo.
     * 
     * @param int $photo_id
     * 
     * @return array
     */ 
    public static function find_the_comments($photo_id=0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE " . self::$db_table_id .  " = " . $database->escape_string($photo_id) . " " . "and deleted is NULL";
        return self::find_by_query($sql);
    } 



// End of comment class - don't place methods here.    
}



?>