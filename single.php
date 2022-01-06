<?php include 'header.php';
        include 'admin/config.php';
    if(isset($_GET['post'])){
        $post_no = $_GET['post'];
    }else{
        header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/");
    }
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <?php
                                $sql = "SELECT p_id, p_title, p_description, c.cname, u.first_name, u.last_name, p.p_date, p_image FROM `post` p LEFT JOIN category c ON p.p_category = c.cid LEFT JOIN users u ON p.p_author = u.id WHERE p_id = {$post_no}";
                                $result  = mysqli_query($connection, $sql);
                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                            ?>
                                        <h3><?php echo $row['p_title']; ?></h3>
                                        <div class="post-information">
                                            <span>
                                                <i class="fa fa-tags" aria-hidden="true"></i>
                                                <?php echo $row['cname'] ?>
                                            </span>
                                            <span>
                                                <i class="fa fa-user" aria-hidden="true"></i>
                                                <a href='author.php'><?php echo $row['first_name']." ".$row['last_name']; ?></a>
                                            </span>
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                                <?php echo $row['p_date']; ?>
                                            </span>
                                        </div>
                                        <img class="single-feature-image" src="admin/upload/<?php echo $row['p_image'];?>" alt=""/>
                                        <p class="description">
                                            <?php echo $row['p_description'];?>
                                        </p>
                            <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
