<?php
include("../AdminPanel/connection.php");
$title = "View Crop Scouting";
include('header.php');
include('sidebar.php');

if(!isset($_SESSION['username'])){
    ?>
    <script>window.location.href = "login.php";</script>
    <?php
}

$sql = "SELECT * from cropscouting";
$result = mysqli_query($conn, $sql); 
$id = "";
?>

?>
            <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row ">
                                <div class="col-12 col-md-12 col-lg-12 ">
                                    <form class="card card-sm" method="POST">
                                        <div class="card-body row no-gutters align-items-center ">
                                            <div class="col-auto ">
                                                <i class="fas fa-search h4 text-body "></i>
                                            </div>
                                            <div class="col-md-3 ">
                                                <input class="form-control form-control form-control-borderless ml-2 " name="searchid" type="search " placeholder="Search By Assigned To">
                                            </div>

                                            <div class="col-auto ">
                                                <input class="btn btn-lg btn-primary ml-3"  type="submit" name="search" value="Search">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                 
                            <?php
                                         if(isset($_POST['search'])){
                                            $id = $_POST['searchid'];

                                            $query1 = "SELECT * FROM  cropscouting WHERE assign='$id'";
                                    ?>
                           
                                    <div class="main-card mb-3 card mt-4">
                                    

                                        <div class="card-body">
                                            <h5 class="card-title">Crop Scouting Information</h5>
                                            <table class="mb-0 table table-bordered">
                                                <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Fields</th>
                                                        <th>Details</th>
                                                        <th>Assigned To</th>
                                                        <th>Due Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                        $query_run = mysqli_query($conn, $query1);
                                                        
                                                        while($roww = mysqli_fetch_array($query_run)){
                                                            
                                                            ?>
                                                    <tr class="text-center">
                                                        <th scope="row"><?php echo $roww["id"] ?></th>
                                                        <td><?php echo $roww["date"] ?></td>
                                                        <td><?php echo $roww["field"] ?></td>
                                                        <td><?php echo $roww["details"] ?></td>
                                                        <td><?php echo $roww["assign"] ?></td>
                                                        <td><?php echo $roww["duedate"] ?></td>
                                                        <td> <a href="updateCropScouting.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm ">Edit</a> &nbsp; &nbsp;<a href="deleteCropScouting.php?id=<?php echo $row['id'] ?>"  class="btn btn-danger btn-sm ">Delete</a></td>
                                                    </tr>
                                                    <?php 
                                                        }
                                                    }
                                                    ?> 
                                                </tbody>
                                            </table>
                                        </div>
                                        </div>
                                        
                            <?php
                            if($id == ""){
                            ?>
                            <div class="main-card mb-3 card mt-4">

                                <div class="card-body">
                                    <h5 class="card-title">Crop Scouting Information</h5>
                                    <table class="mb-0 table table-bordered">
                                        <thead>
                                                    <tr class="text-center">
                                                        <th>#</th>
                                                        <th>Date</th>
                                                        <th>Fields</th>
                                                        <th>Details</th>
                                                        <th>Assigned To</th>
                                                        <th>Due Date</th>
                                                        <th>Action</th>
                                                    </tr>
                                        </thead>
                                        <tbody>
                                        <?php if (mysqli_num_rows( $result ) > 0) {
                                            
                                            while($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr class="text-center">
                                                        <th scope="row"><?php echo $row["id"] ?></th>
                                                        <td><?php echo $row["date"] ?></td>
                                                        <td><?php echo $row["field"] ?></td>
                                                        <td><?php echo $row["details"] ?></td>
                                                        <td><?php echo $row["assign"] ?></td>
                                                        <td><?php echo $row["duedate"] ?></td>
                                                        <td> <a href="updateCropScouting.php?id=<?php echo $row['id'] ?>" class="btn btn-warning btn-sm ">Edit</a> &nbsp; &nbsp;<a href="deleteCropScouting.php?id=<?php echo $row['id'] ?>"  class="btn btn-danger btn-sm ">Delete</a></td>
                                                    </tr>
                                            <?php 
                                                }
                                            }
                                        }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php
include('footer.php');

?>