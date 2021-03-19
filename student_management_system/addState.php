<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $country = $_POST['country'];
    
    try{        
        $sql = 'INSERT INTO STATE(sr_name, country_id) VALUES(:sname,:country)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sname' => $name, 'country' => $country]);
        header('Location: state.php');
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
    <title>State Management</title>
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
                    <center><h1>Add State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="state.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">State Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter State Name" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="country">Options</label>
                            </div>
                            <select class="custom-select country" id="country" name="country" required>
                            <option selected>Choose Country</option>
                            <?php
                            $getCountry = $pdo->query("SELECT * FROM COUNTRY")->fetchAll();
                            foreach ($getCountry as $Country) {  ?>
                                <option value="<?php echo $Country->sr_id; ?>"><?php echo $Country->sr_name; ?></option>
                            <?php     }
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
</body>
</html>
