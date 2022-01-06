<?php
    include "header.php"; 
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-offset-4 col-md-4">
                    <h3 class="heading">Site Settings</h3>
                    <!-- Form Start -->
                    <form  action="save-settings.php" method ="POST">
                        <?php
                            
                            $query = "SELECT * FROM settings";

                            $result = mysqli_query($connection,$query);
                            if(mysqli_num_rows($result)>0){
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input value="<?php echo $row['site_name'];?>" type="text" name="name" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input value="<?php echo $row['home_title'];?>" type="text" name="title" class="form-control" placeholder="Title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Developer</label>
                                        <input value="<?php echo $row['developer'];?>" type="text" name="developer" class="form-control" placeholder="Developer" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Developer Website</label>
                                        <input value="<?php echo $row['developer_website_link'];?>" type="text" name="developer_web" class="form-control" placeholder="Developer website" required>
                                    </div>
                                    <input type="submit" name="save" class="btn btn-primary" value="save" />
                            <?php
                                    }
                                }
                            ?>
                    </form>
                    <!-- /Form  End -->
              </div>
              
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
