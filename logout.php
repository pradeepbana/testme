<?php
    //this includes the session start to resume the session on this page.It identifies that needs to be destroyed
    include_once 'session.php';

    //session_destroy() destroys the session.Then the header function redirects to the home page.
    session_destroy();
    header('Location: index.php')
?>