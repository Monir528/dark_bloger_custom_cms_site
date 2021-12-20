<?php include "header.php";

    if(isset($_POST['save'])){
        include "config.php";

        $first_name = mysqli_real_escape_string($connection,$_POST['fname']);
        $last_name = mysqli_real_escape_string($connection,$_POST['lname']);
        $user_name = mysqli_real_escape_string($connection,$_POST['user']);
        $password = mysqli_real_escape_string($connection,md5($_POST['password']));
        $role = $_POST['role'];

        $user_check_query = "SELECT username FROM users WHERE username = '{$user_name}'";
        
        $result = mysqli_query($connection,$user_check_query) or die("Query failed");

        if(mysqli_num_rows($result)==0){
            $query = "INSERT INTO users(first_name,last_name,username,password,role) VALUES('{$first_name}','{$last_name}','{$user_name}','{$password}',{$role})";
            if(mysqli_query($connection,$query)){
                header("Location: http://{$hostname}/PHP/Project/news/Self/admin/users.php");
            }
        }else{
            echo "<div class='alert alert-danger'>user already exits</div>";
        }

    }
    $_POST = array();
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Add User</h1>
              </div>
              <div class="col-md-offset-3 col-md-6">
                  <!-- Form Start -->
                  <form  action="<?php $_SERVER['PHP_SELF'];?>" method ="POST" autocomplete="off">
                      <div class="form-group">  
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" placeholder="First Name" required>
                      </div>
                          <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="user" class="form-control" placeholder="Username" required>
                      </div>

                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" name="password" class="form-control" placeholder="Password" required>
                      </div>
                       
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                              <option value="0">Normal User</option>
                              <option value="1">Admin</option>
                          </select>
                      </div>
                      <input type="submit"  name="save" class="btn btn-primary" value="Save" required />
                  </form>
                   <!-- Form End-->
               </div>
           </div>
       </div>
   </div>
<?php include "footer.php"; ?>
