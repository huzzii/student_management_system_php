<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-12">
                <div class="card1 pb-5">
                    <?php
                    require 'navbar.php';
                    ?>
                </div>
            </div>
        </div>
        
        <div class="row d-flex">
            <div class="col-lg-12">
                <div class="card1 pb-5">
                    <center><h1>Teachers&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addTeacher.php" class="btn btn-outline-success">Add Teacher</a></h1></center>
                    <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getTeacher = $pdo->query("SELECT * FROM TEACHER")->fetchAll();
                        if($getTeacher){
                            foreach ($getTeacher as $teacher) {
                                echo '<tr>
                                  <th scope="row">' . $teacher->sr_id . '</th>
                                  <td>' . $teacher->teach_name . '</td>
                                  <td><a href="editTeacher.php?id='.$teacher->sr_id .'" class="btn btn-outline-primary">Edit</a></td>
                                </tr> ';
                            }  
                        }else {
                        echo '<tr><th colspan="3" scope="row">No Record Found</th></tr>';
                            
                        }
                        ?>
                      
                    </tbody>
                  </table>

                </div>
            </div>
        </div>
        
    </div>
</div>
    
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
