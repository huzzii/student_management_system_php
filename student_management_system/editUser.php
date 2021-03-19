<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $empid = $_POST['empid'];
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $picture = $_FILES["picture"]["name"];
    $picturetmp = $_FILES["picture"]["tmp_name"];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $city = $_POST['city'];
    $target_file = "assets/img/" . $empid . ".jpg";
    
    try{ 
        if(!empty($picture)){
            move_uploaded_file($picturetmp, $target_file);
        }
        $sql = "UPDATE USER SET sr_name=:name, emp_id=:emp, user_name=:user, password=:pass, picture=:pict, country_id=:country, state_id=:state, city_id=:city WHERE sr_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['name' => $name, 'emp' => $empid, 'user' => $username, 'pass' => $password, 'pict' => $target_file, 'country' => $country, 'state' => $state, 'city' => $city, 'id' => $id]);
        header('Location: user.php');
        exit;
    }catch(PDOException $e){
        echo $e;
    }
}
    $getid = $pdo->query("SELECT * FROM USER WHERE sr_id=$id")->fetch();
    $getcountry = $pdo->query("SELECT * FROM COUNTRY WHERE sr_id=$getid->country_id")->fetch();
    $getstate = $pdo->query("SELECT * FROM STATE WHERE sr_id=$getid->state_id")->fetch();
    $getcity = $pdo->query("SELECT * FROM CITY WHERE sr_id=$getid->city_id")->fetch();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
                    <center><h1>Edit User&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="user.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="<?php echo $getid->sr_name; ?>" placeholder="Enter your name" required>
                        </div>
                        <div class="form-group">
                            <label for="empid">Emp ID</label>
                            <input type="number" name="empid" class="form-control" id="empid" value="<?php echo $getid->emp_id; ?>"  placeholder="Enter your Emp ID" required>
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" class="form-control" id="username" value="<?php echo $getid->user_name; ?>"  placeholder="Enter your Username" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" name="password" class="form-control" id="password" value="<?php echo $getid->password; ?>" placeholder="Enter your Password" required>
                        </div>
                        <div class="form-group">
                            <label for="picture">Picture</label>
                            <input type="file" name="picture" class="form-control" id="picture"  accept="image/*">
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="country">Options</label>
                            </div>
                            <select class="custom-select country" id="country" name="country" required>
                                <option selected value="<?php echo $getid->country_id; ?>"><?php echo $getcountry->sr_name; ?></option>
                                <?php
                            $getCountry = $pdo->query("SELECT * FROM COUNTRY")->fetchAll();
                            foreach ($getCountry as $Country) {  ?>
                                <option value="<?php echo $Country->sr_id; ?>"><?php echo $Country->sr_name; ?></option>
              <?php              }
                            ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="state">Options</label>
                            </div>
                            <select class="custom-select state" id="state" name="state" required>
                                <option selected value="<?php echo $getid->state_id; ?>"><?php echo $getstate->sr_name; ?></option>
                                <?php
                            $getState = $pdo->query("SELECT * FROM STATE WHERE country_id=$getid->country_id")->fetchAll();
                            foreach ($getState as $State) {  ?>
                                <option value="<?php echo $State->sr_id; ?>"><?php echo $State->sr_name; ?></option>
              <?php              }
                            ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="city">Options</label>
                            </div>
                            <select class="custom-select city" id="city" name="city" required>
                                <option selected value="<?php echo $getid->city_id; ?>"><?php echo $getcity->sr_name; ?></option>
                                <?php
                            $getCity = $pdo->query("SELECT * FROM CITY WHERE state_id=$getid->state_id")->fetchAll();
                            foreach ($getCity as $City) {  ?>
                                <option value="<?php echo $City->sr_id; ?>"><?php echo $City->sr_name; ?></option>
              <?php              }
                            ?>
                            </select>
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
<script src="assets/js/dynamic_state_city.js"></script>
</body>
</html>
