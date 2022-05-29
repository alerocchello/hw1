<?php

session_start();
    
    function checkAuthorization() {
        if(isset($_SESSION['username'])) {
            return $_SESSION['username'];
        } else 
            return 0;
    }
    
?>