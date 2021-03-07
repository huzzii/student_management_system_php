<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Management</title>
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
                    <center><h1>Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="addCountry.php" class="btn btn-outline-success">Add Country</a></h1></center>
                    <table class="table table-dark">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Country Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getCountry = $pdo->query("SELECT * FROM COUNTRY")->fetchAll();
                        
                        if($getCountry){
                            foreach ($getCountry as $Country) {
                                echo '<tr>
                                  <th scope="row">' . $Country->sr_id . '</th>
                                  <td>' . $Country->sr_name . '</td>
                                  <td><a href="editCountry.php?id='.$Country->sr_id .'" class="btn btn-outline-primary">Edit</a></td>
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
