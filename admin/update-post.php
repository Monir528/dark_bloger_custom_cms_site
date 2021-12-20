<?php
    include "header.php"; 
    include "config.php";

    $post_id = isset($_GET['post_no'])?$_GET['post_no']:$_POST['post_id'];
    
    if(isset($_POST['submit'])){

        //post data
        $title = $_POST['post_title'];
        $des = $_POST['postdesc'];
        $category = $_POST['category'];

        if(empty($_FILES['new-image']['name'])){
            $file_name = $_POST['old-image'];
        }else{
            $file_name = $_FILES['new-image']['name'];
            $file_tmp_name = $_FILES['new-image']['tmp_name'];
            $file_size = $_FILES['new-image']['size'];
            $name_explode = explode(".", $file_name);
            $file_ext = strtolower(end($name_explode));
            $extentions = array('jpg', 'jpeg', 'png');
    
            if(!in_array($file_ext, $extentions)){
                $error[] = "Uploaded file extention must be jpg, jpeg, png ";
            }
    
            if($file_size > 3670016){
                $error[] = "Uploaded file size must be 3.5 MB";
            }
            
            if(empty($error)){

                move_uploaded_file($file_tmp_name, "upload/".$file_name);
                unlink("upload/".$_POST['old-image']);

            }else{
                echo "<div class=\"alert alert-danger\" role=\"alert\">"; 
                foreach($error as $value){
                    echo $value;
                }
                echo "</div>";
            }
        }
        
        $sql = "UPDATE post SET p_title = '{$title}', p_description = '{$des}', p_category = {$category}, p_image = '{$file_name}' WHERE p_id = {$post_id};";
                
        if(mysqli_query($connection, $sql)){
            echo "<div class=\"alert alert-success\" role=\"alert\">Successfully Updated!</div>"; 
        }else{
            echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to Update!</div>"; 
        }

    }
    ?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php
            $sql = "SELECT p.p_id, p.p_title, p.p_category, p.p_description, p.p_date, u.role, c.cname, p.p_image FROM post p LEFT JOIN users u ON p.p_author = u.id LEFT JOIN category c ON p.p_category = c.cid WHERE p_id = {$post_id};";
            $result = mysqli_query($connection, $sql);
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);
                    
        ?>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="post_id"  class="form-control" value="<?php echo $row['p_id'];?>" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputTile">Title</label>
                        <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $row['p_title'];?>">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"> Description</label>
                        <textarea name="postdesc" class="form-control"  required rows="5"><?php echo $row['p_description'];?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputCategory">Category</label>
                        <select class="form-control" name="category">
                            <?php
                                $sql = "SELECT cid, cname FROM category";
                                $result = mysqli_query($connection, $sql);
                                if(mysqli_num_rows($result)>0){
                                    while($row1 = mysqli_fetch_assoc($result)){
                            ?>
                                    <option <?php echo $row['p_category']==$row1['cid']?"selected":"";?> value="<?php echo $row1['cid'];?>"><?php echo $row1['cname'];?></option>
                            <?php
                                    }
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Post image</label>
                        <input type="file" name="new-image">
                        <img  src="upload/<?php echo $row['p_image'];?>" height="150px">
                        <input type="hidden" name="old-image" value="<?php echo $row['p_image'];?>">
                    </div>
                    <input type="submit" name="submit" class="btn btn-primary" value="Update" />
                </form>
        <?php
            }else{
        ?>
            <div class="row">
                <div class="col-sm-6 bg-danger">
                    <div class="card">
                      <div class="card-body">
                        <p class="card-text">No such post are not found!</p>
                        <a href="post.php" class="btn btn-primary">Go to Post</a>
                      </div>
                    </div>
                </div>
            </div>
        <?php
            }
        ?>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>
<?php include "footer.php"; ?>
