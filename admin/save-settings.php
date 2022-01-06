<?php
    include 'config.php';

    if(isset($_POST['name']) && isset($_POST['title']) && isset($_POST['developer']) && isset($_POST['developer_web'])){

        $name = $_POST['name'];
        $title = $_POST['title'];
        $developer = $_POST['developer'];
        $developer_web = $_POST['developer_web'];
        $result = mysqli_query($connection, "SELECT * FROM settings");
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);
            if($row['site_name'] != $name || $row['home_title'] != $title || $row['developer'] != $developer || $row['developer_website_link'] != $developer_web){
                if(mysqli_query($connection, "UPDATE settings SET site_name = '{$name}', home_title = '{$title}', developer = '{$developer}', developer_website_link = '{$developer_web}';")){
                    $success = 101;
                }
            }
        }else{
            if(mysqli_query($connection, "INSERT INTO settings(site_name, home_title, developer, developer_website_link) VALUES('{$name}', '{$title}', '{$developer}', '{$developer_web}');")){
                $success = 102;
            }
        }
        if(empty($success) || $success == 101 || $success == 102){
            header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/settings.php");
        }else{
            echo "Something wrong!";
        }

    }

?>