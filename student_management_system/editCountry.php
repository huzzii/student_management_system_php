<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    
    try{ 
        $sql = "UPDATE COUNTRY SET sr_name=:sname WHERE sr_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sname' => $name, 'id' => $id]);
        header('Location: country.php');
        exit;
    }catch(PDOException $e){
        echo $e;
    }
}
    $getid = $pdo->query("SELECT * FROM COUNTRY WHERE sr_id=$id")->fetch();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Class Management</title>
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
                    <center><h1>Edit Country&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="country.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Country Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter country name" value="<?php echo $getid->sr_name; ?>" required>
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
