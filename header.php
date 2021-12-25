<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>DarkBlog</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="css/font-fffawesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="css/style.css">
</head> 
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class="col-md-4">
                <a href="./" id="logo" class="h3"><b>DARKBLOG</b></a>
            </div>
            <!-- /LOGO -->
            <!-- Menu Bar -->
            <div class="col-md-8">
                <div id="menu-bar">
                    <ul class='menu'>
                        <li><a href='category.php'>Business</a></li>
                        <li><a href='category.php'>Entertainment</a></li>
                        <li><a href='category.php'>Sports</a></li>
                        <li><a href='category.php'>Politics</a></li>
                    </ul>
                </div>
            </div>
            <!-- Menu Bar -->
        </div>
        <div class="row">
            <!-- search box -->
                <div class="search-box-container">
                    <form class="search-post" action="search.php" method ="GET">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Search .....">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-danger">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
    <!-- /search box -->
        </div>
    </div>
</div>
<!-- /HEADER -->
