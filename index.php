<?php include 'header.php'; 
        include 'admin/config.php';
?>
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- post-container -->
                    <div class="post-container">

                        <?php

                            $sql_command = "SELECT p_id, p_title, p_description, c.cname, u.first_name, u.last_name, p.p_date, p_image FROM `post` p LEFT JOIN category c ON p.p_category = c.cid LEFT JOIN users u ON p.p_author = u.id";
                            $result  = mysqli_query($connection, $sql_command);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                                    <div class="post-content"> 
                                        <div class="row">
                                            <div class="col-md-4">
                                                <a class="post-img" href="single.php?post=<?php echo $row['p_id'];?>"><img src="admin/upload/<?php echo $row['p_image'];?>" alt=""/></a>
                                            </div>
                                            <div class="col-md-8">
                                                <div class="inner-content clearfix">
                                                    <h3><a href='single.php'><?php echo $row['p_title']; ?></a></h3>
                                                    <div class="post-information">
                                                        <span>
                                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                                            <a href='category.php'><?php echo $row['cname'] ?></a>
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
                                                    <p class="description">
                                                        <?php echo $row['p_description']; ?>
                                                    </p>
                                                    <a class='read-more pull-right' href='single.php?post=<?php echo $row['p_id'];?>'>read more</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                        <?php
                                }
                            }
                        ?>


                        <ul class='pagination'>
                            <li class="active"><a href="">1</a></li>
                            <li><a href="">2</a></li>
                            <li><a href="">3</a></li>
                        </ul>
                    </div><!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
