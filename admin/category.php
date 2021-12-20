<?php include "header.php";

    $current_page  = isset($_GET['c_page'])?$_GET['c_page']:1;
    $def = 4;
    $offset = (($current_page-1)*$def);

?>
<div id="admin-content">
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="add-category.php">add category</a>
            </div>
            <div class="col-md-12">
                <table class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                        <?php
                            include "config.php";
                            $sql = "SELECT * FROM category LIMIT {$offset}, {$def}";
                            $result = mysqli_query($connection, $sql);
                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                        ?>
                            <tr>
                                <td class='id'><?php echo $row['cid'];?></td>
                                <td><?php echo $row['cname'];?></td>
                                <td><?php echo $row['cpost'];?></td>
                                <td class='edit'><a href='update-category.php'><i class='fa fa-edit'></i></a></td>
                                <td class='delete'><a href='delete-category.php'><i class='fa fa-trash-o'></i></a></td>
                            </tr>
                        <?php
                                }
                            }

                        ?>
                    </tbody>
                </table>
                <ul class='pagination admin-pagination'>
                    <?php
                        $sql = "SELECT * FROM category";
                        $result = mysqli_query($connection, $sql);
                        $total_page = mysqli_num_rows($result);
                        for($i = 1; $i<=ceil(($total_page/$def));$i++){
                            $active = ($current_page==$i)?"active":"";
                            echo "<li class='".$active."'><a href='".$_SERVER['PHP_SELF']."?c_page=".$i."'>".$i."</a></li>";
                        }
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
