<?php 

/**
 * The session class manages and sets session variables as required by the application
 *
 * @package     Session management
 * @author      Blake Foss <blake@division442.com>
 * @version     1.0
 * @link        https://division442.com/gallery-demo 
 */

class Session {

    /**
     * Default config for this object.
     * 
     * @var string private variables to set default login status
     * @var string public variables used by class
     * 
     */    

    private $signed_in = false;
    public $id;
    public $message;
    public $count;

    /**
     * Constructor for start and check for existing sessions.
     * 
     */ 
    function __construct() {
        session_start();
        $this->check_the_login();
        $this->check_message();
        $this->visitor_count();
    }

    /**
     * Check if user logged in session exists.
     * 
     * @return boolean
     */ 
    public function is_signed_in() {
        return $this->signed_in;
    }

    /**
     * Sets sessions once login validated.
     */ 
    public function login($user) {
        if($user) {
            $this->id           = $_SESSION['id'] = $user->id;
            $this->name         = $_SESSION['name'] = $user->first_name . " " . $user->last_name;
            $this->admin_level  = $_SESSION['admin_level'] = $user->admin_level;
            $this->signed_in    = true;
        }
    }

    /**
     * Deletes all sessions related to user when logging out.
     * 
     * Sets signed_in as false
     * This will force user to login again
     */
    public function logout() {
        
        // unset($_SESSION['id']);
        // unset($_SESSION['count']);
        // unset($_SESSION['admin_level']);
        // unset($_SESSION['admin_level']);

        session_destroy();
        
        unset($user->name);
        unset($user->id);
        $this->signed_in = false;
    }

    /**
     * Checks that the user is logged in.
     * 
     * @return boolean
     */
    private function check_the_login() {
        if(isset($_SESSION['id'])) {
            $this->id = $_SESSION['id'];
            $this->signed_in = true;
        } else {
            unset($this->id);
            $this->signed_in = false;
        }
    }

    /**
     * Sets passed message string to session.
     * 
     * @param string $msg to be set as session message
     * @return string
     */
    public function message($msg="") {
        if(!empty($msg)) {
            $_SESSION['message'] = $msg;
        } else {
            return $this->message;
        }
    }

    /**
     * Checks if message session created and unsets..
     * 
     * If message sessions not exists set message to NULL
     * 
     * @return string
     */
    private function check_message() {

        if(isset($_SESSION['message'])) {
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        } else {
            $this->message = "";
        }
    }

    /**
     * Counts each page load and calls it a visitor count.
     * 
     * Only reason this exists is to offer some eye candy on the dashboard admin landing page.
     * 
     * @return int
     */
    public function visitor_count() {
        if(isset($_SESSION['count'])) {
            return $this->count = $_SESSION['count']++;
        } else {
            return $_SESSION['count'] = 1;
        }
    }

}

$session = new Session();
$message = $session->message();

?>