<?php 

Class SessionHelper{

    private static $_sessionStarted = false;

    /**
     * start_session
     *
     * @return void
     */
    public static function sessionStart() {
        if(self::$_sessionStarted == false) {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    /**
    * set session
    *
    * @param String $key
    * @param String $value
    * @return String
    */
    public static function setSession(String $key, String $value){
        $_SESSION[$key]= $value;
    }

    public static function getSession($key){
        if(isset($_SESSION[$key])) {
            if($key == "SuccessMessage"){
                return self::sessionMessage("SuccessMessage", "bg-success");
            } elseif ($key =="ErrorMessage") {
                return self::sessionMessage("ErrorMessage", " bg-danger");
            } else {
                return $_SESSION[$key];
            }
        }
    }


    /**
     * Print Message
     *
     * @param String $key
     * @param String $class
     * @return void
     */
    public static function sessionMessage(String $key, String $class) {
        $Output = "<div class=\" p-2 $class text-center text-light fw-bold\">" ;
        $Output .= htmlentities($_SESSION[$key]);
        $Output .= "</div>";
        $_SESSION[$key] = null;
        echo $Output;
    }



    /**
     * destroy message
     *
     * @return void
     */
    public static function destroySessions() {
        if(self::$_sessionStarted == true) {
            session_unset();
            session_destroy();
        }
    }

    
    /**
     * Redirect page 
     *
     * @param String $page
     * @return void
     */
    public static function redirectTo($page){
        header('location:'.URLROOT.$page);
        exit;
    }
        


}