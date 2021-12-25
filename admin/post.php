<?php include "header.php";
    include "config.php";

    $current_page = isset($_GET['post'])?$_GET['post']:1;
    $def = 4;
    $offset = (($current_page-1)* $def);
    
    if(isset($_GET['u_del'])){
        $u = $_GET['u_del'];
        $res = mysqli_query($connection, "SELECT * FROM post WHERE p_id = {$u};");
        if(mysqli_num_rows($res) > 0){
            $arr = mysqli_fetch_array($res,MYSQLI_ASSOC);
            $p_image = $arr['p_image'];
        }
        $sql = "DELETE FROM post WHERE p_id = {$u};";
        if(mysqli_query($connection,$sql)){
            unlink("upload/".$p_image);
            header("Location: http://localhost/PHP/Project/news/Blog_Site/admin/post.php?user=1");
        }
    }

?>
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="add-post.php">add post</a>
              </div>
              <div class="col-md-12">
                  <table class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                          <?php
                            //session_start();
                            if($_SESSION['user_role']==1){
                                $sql = "SELECT p.p_id, p.p_title, p.p_category, p.p_date, u.role, c.cname FROM post p LEFT JOIN users u ON p.p_author = u.id LEFT JOIN category c ON p.p_category = c.cid LIMIT {$offset},{$def}";
                            }else{
                                $sql = "SELECT p.p_id, p.p_title, p.p_category, p.p_date, u.role, c.cname FROM post p LEFT JOIN users u ON p.p_author = u.id LEFT JOIN category c ON p.p_category = c.cid WHERE p_author = {$_SESSION['user_id']} LIMIT {$offset},{$def}";
                            }
                            $result  = mysqli_query($connection,$sql);

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                            ?>
                          <tr>
                              <td class='id'><?php echo $row['p_id'];?></td>
                              <td><?php echo $row['p_title'];?></td>
                              <td><?php echo $row['cname'];?></td>
                              <td><?php echo $row['p_date'];?></td>
                              <td><?php echo $row['role']==1?"Admin":"Normal User";;?></td>
                              <td class='edit'><a href='update-post.php?post_no=<?php echo $row['p_id'];?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='post.php?u_del=<?php echo $row['p_id'];?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php
                                }
                            }
                          ?>
                      </tbody>
                  </table>
                  <ul class='pagination admin-pagination'>
                      <?php
                        if($_SESSION['user_role']==1){
                            $sql = "SELECT p_id FROM post";
                        }else{
                            $sql = "SELECT p_id FROM post WHERE p_author = {$_SESSION['user_id']}";
                        }
                        $result = mysqli_query($connection, $sql);
                        $total_page = mysqli_num_rows($result);
                        for($i = 1; $i<=ceil(($total_page/$def));$i++){
                            $active = ($current_page==$i)?"active":"";
                            echo "<li class='".$active."'><a href='".$_SERVER['PHP_SELF']."?post=".$i."'>".$i."</a></li>";
                        } 
                      ?>
                  </ul>
              </div>
          </div>
      </div>
  </div>
<?php include "footer.php"; ?>
