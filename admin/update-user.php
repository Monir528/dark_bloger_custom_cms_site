<?php include "header.php";

    if(isset($_POST['submit'])){
        include("config.php");
        $id = $_POST['user_id'];
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $username = $_POST['username'];
        $role = $_POST['role'];
        $update_query = "UPDATE users SET first_name = '{$f_name}', last_name = '{$l_name}', username = '{$username}', role = {$role} WHERE id = {$id}";
        $res =  mysqli_query($connection, $update_query) or die("Query Failed");
        if($res){
            header("Location: http://{$hostname}/PHP/Project/news/Blog_Site/admin/users.php");
        }
        die();
    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method ="POST">
                    <?php
                        include("config.php");
                        $query = "SELECT* FROM users WHERE id = {$_GET['id']}";
                        $result = mysqli_query($connection,$query);
                        if(mysqli_num_rows($result)>0){
                            while($rows = mysqli_fetch_assoc($result)){
                    ?>
                                <div class="form-group">
                                    <input type="hidden" name="user_id"  class="form-control" value="<?php echo $rows['id'];?>" placeholder="" >
                                </div>
                                    <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" name="f_name" class="form-control" value="<?php echo $rows['first_name']; ?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" name="l_name" class="form-control" value="<?php echo $rows['last_name']; ?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>User Name</label>
                                    <input type="text" name="username" class="form-control" value="<?php echo $rows['username']; ?>" placeholder="" required>
                                </div>
                                <div class="form-group">
                                    <label>User Role</label>
                                    <select class="form-control" name="role" value="<?php echo $rows['role']; ?>">
                                        <option value="0" <?php echo $rows['role']==0?"SELECTED":"";?>>normal User</option>
                                        <option value="1" <?php echo $rows['role']==1?"SELECTED":"";?>>Admin</option>
                                    </select>
                                </div>
                      <?php
                            }
                      }
                      ?>
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
