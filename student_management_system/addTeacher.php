<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $qualname = $_POST['qname'];
    $telno = $_POST['telno'];
    $city = $_POST['city'];
     
    try{        
        
        $sql = 'INSERT INTO TEACHER(teach_name, qual_name, tel_no, city_name) VALUES(:tname,:qname,:tno,:cname)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['tname' => $name, 'qname' => $qualname, 'tno' => $telno, 'cname' => $city]);
        header('Location: teacher.php');
        exit;
    }catch(PDOException $e){
        echo $e;
    }
}
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
    <style>
    .card1{
        margin: 0 25px;
        padding:25px 0;
    }
    .save{
        width:20%;
    }
    </style>
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
                    <center><h1>Add Teacher&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="teacher.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Teacher Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Teacher Name" required>
                        </div>
                        <div class="form-group">
                            <label for="qname">Qualifications</label>
                            <input type="text" name="qname" class="form-control" id="qname" placeholder="Enter Teachers Qualification" required>
                        </div>
                        <div class="form-group">
                            <label for="telno">Telephone No</label>
                            <input type="number" name="telno" class="form-control" id="telno" placeholder="Enter Teachers Number" required>
                        </div>
                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter Teachers City" required>
                        </div>
                        
                        <input type="submit" class="btn btn-outline-primary save" name="submit" value="Save">
                  </form>
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
