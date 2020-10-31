<?php

class Comment extends Db_object {

    protected static $db_table = "comments";
    protected static $db_table_id = "photo_id";
    protected static $db_table_fields = array('photo_id', 'author', 'body');

    public $id;
    public $photo_id;
    public $author;
    public $body;
    public $created;

    public static function create_comment($photo_id, $author, $body) {
        if(!empty($photo_id) && !empty($author) && !empty($body)) {
            
            $comment = new Comment();
            
            $comment->photo_id  = (int) $photo_id;
            $comment->author    = (string) $author;
            $comment->body      = (string) $body;

            return $comment;
        } else {
            return false;
        }
    }

    public static function find_the_comments($photo_id=0) {

        global $database;

        $sql = "SELECT * FROM " . self::$db_table;
        $sql .= " WHERE " . self::$db_table_id .  " = " . $database->escape_string($photo_id);
        
        return self::find_by_query($sql);
    } 



// End of comment class - don't place methods here.    
}



?>