<?php 

Class Sessions {

    private static $_sessionStarted = false;

    public static function sessionStart() {
        if(self::$_sessionStarted == false) {
            session_start();
            self::$_sessionStarted = true;
        }
    }

    
        
    public static function setSession($key, $value){
        $_SESSION[$key]= $value;
    }

    public static function getSession($key){

        if(isset($_SESSION[$key])) {
            
            if($key == "SuccessMessage"){
                return self::sessionMessage("SuccessMessage", "bgBluerive");
            } elseif ($key =="ErrorMessage") {
                return self::sessionMessage("ErrorMessage", " bgRedrive ");
            } else {
                return $_SESSION[$key];
            }

        }
        
    }
    public static function sessionMessage($key, $class) {

        $Output = "<div class=\" p-2 mb-5 $class text-center\">" ;
        $Output .= htmlentities($_SESSION[$key]);
        $Output .= "</div>";
        $_SESSION[$key] = null;
        echo $Output;
    }



    public static function destroySessions() {

        if(self::$_sessionStarted == true) {
            
            session_unset();
            session_destroy();
        }
    }
        


}