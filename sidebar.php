<div id="sidebar" class="col-md-4">
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php
            $recent_cmd = "SELECT p_id, p_title, p_description, c.cname, u.first_name, u.last_name, p.p_date, p_image, p_author FROM `post` p LEFT JOIN category c ON p.p_category = c.cid LEFT JOIN users u ON p.p_author = u.id ORDER BY p.p_id DESC LIMIT 1,5";
            $result  = mysqli_query($connection, $recent_cmd);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="recent-post">
            <a class="post-img" href="single.php?post=<?php echo $row['p_id']?>">
                <img src="admin/upload/<?php echo $row['p_image'];?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="single.php?post=<?php echo $row['p_id']?>"><?php echo $row['p_title'];?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='category.php'><?php echo $row['cname'] ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $row['p_date']; ?>
                </span>
                <a class="read-more" href="single.php?post=<?php echo $row['p_id'];?>">read more</a>
            </div>
        </div>
        <?php
                }
            }
        ?>
    </div>
    <!-- /recent posts box -->
</div>
