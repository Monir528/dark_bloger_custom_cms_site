<?php include 'header.php';
    $def  = 5;
    $current_page = (isset($_GET['no']))?$_GET['no']:1;
    $ofset = ($current_page - 1) * $def;
    if(isset($_GET['author'])){
        $a_no = $_GET['author'];
        $sql = "SELECT * FROM users WHERE id = {$a_no}";
        $res = mysqli_query($connection,$sql);
        if(mysqli_num_rows($res) > 0){
            $row = mysqli_fetch_assoc($res);
            $a_name = $row['first_name']." ".$row['last_name'];
        }
    }
?>
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading"><?php echo $a_name;?></h2>
                    <?php
                        $sql_command = "SELECT p_id, p_title, p_description, c.cname, u.first_name, u.last_name, p.p_date, p_image, p_author FROM `post` p LEFT JOIN category c ON p.p_category = c.cid LEFT JOIN users u ON p.p_author = u.id WHERE p_author = {$a_no} LIMIT {$ofset}, {$def}";
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
                                                <h3><a href='single.php?post=<?php echo $row['p_id']?>'><?php echo $row['p_title']; ?></a></h3>
                                                <div class="post-information">
                                                    <span>
                                                        <i class="fa fa-tags" aria-hidden="true"></i>
                                                        <a href='category.php'><?php echo $row['cname'] ?></a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-user" aria-hidden="true"></i>
                                                        <a href='author.php?author=<?php echo $row['p_author']; ?>'><?php echo $row['first_name']." ".$row['last_name']; ?></a>
                                                    </span>
                                                    <span>
                                                        <i class="fa fa-calendar" aria-hidden="true"></i>
                                                        <?php echo $row['p_date']; ?>
                                                    </span>
                                                </div>
                                                <p class="description">
                                                    <?php echo substr($row['p_description'],0,100)."..."; ?>
                                                </p>
                                                <a class='read-more pull-right' href='single.php?post=<?php echo $row['p_id'];?>'>read more</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                    <?php
                            }
                        }else{
                            echo "<div class='alert alert-danger' role='alert'>No Record Found!</div>";
                        }
                    ?>

                        
                        <!-- Pagination -->
                        <ul class='pagination'>
                            <?php
                                $sql = "SELECT p_id, p_title, p_description, c.cname, u.first_name, u.last_name, p.p_date, p_image, p_author FROM `post` p LEFT JOIN category c ON p.p_category = c.cid LEFT JOIN users u ON p.p_author = u.id WHERE p_author = {$a_no}";
                                $result = mysqli_query($connection,$sql);
                                $total_page = mysqli_num_rows($result);
                                for($i = 1; $i<=ceil($total_page/$def); $i++){
                                    $active = ($current_page==$i)?"active":"";
                                    echo "<li class='".$active."'><a href='".$_SERVER['PHP_SELF']."?author=".$a_no."&no=".$i."'>".$i."</a></li>";
                                }
                            ?>
                        </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>
<?php include 'footer.php'; ?>
