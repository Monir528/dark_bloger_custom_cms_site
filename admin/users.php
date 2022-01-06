<?php
    include "header.php"; 

    $def = 3;
    $current_page = (isset($_GET['user']))?$_GET['user']:1;
    $ofset = ($current_page-1)*$def;
?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-user.php">add user</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                            $query = "SELECT * FROM users ORDER BY username DESC LIMIT {$ofset},{$def}";

                            $result = mysqli_query($connection,$query);
                            if(mysqli_num_rows($result)>0){
                                while($rows = mysqli_fetch_assoc($result)){
                                ?>
                                <tr>
                                    <td class='id'><?php echo $rows['id'];?></td>
                                    <td><?php echo $rows['first_name']." ".$rows['last_name'];?></td> 
                                    <td><?php echo $rows['username'];?></td>
                                    <td><?php echo $rows['role']==1?"Admin":"Normal User";?></td>
                                    <td class='edit'><a href='update-user.php?id=<?php echo $rows["id"];?>'><i class='fa fa-edit'></i></a></td>
                                    <td class='delete'><a href='delete-user.php?id=<?php echo $rows["id"];?>'><i class='fa fa-trash-o'></i></a></td>
                                </tr>
                            <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
                <ul class='pagination admin-pagination'>
                <?php

                    
                    $query = "SELECT* FROM users";
                    $result = mysqli_query($connection,$query);
                    $total_page = mysqli_num_rows($result);
                    for($i = 1;  $i<=ceil($total_page/$def); $i++){
                        $active = ($current_page==$i)?"active":"";
                        echo "<li class='".$active."'><a href='".$_SERVER['PHP_SELF']."?user=".$i."'>".$i."</a></li>";
                    }
                ?>
                </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
