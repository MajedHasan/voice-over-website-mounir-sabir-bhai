<?php
    if(isset($_SESSION['loggedInUser'])){
        session_destroy($_SESSION['loggedInUser']);
    }
?>