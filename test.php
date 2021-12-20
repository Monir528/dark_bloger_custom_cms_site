<?php
    
    $_POST['user'] = 'word';
    echo $_POST['user'];
    
    if(isset($_POST['user'])){
        $_POST['user'] = 'fuck';
    }
    echo $_POST['user'];

?>