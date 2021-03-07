<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
if(isset($_POST['view'])){
    $class = $_POST['class'];
    $dobfrom = $_POST['dobfrom'];
    $dobto = $_POST['dobto'];
    
    try{        
        $url = "https://hujjiibaba.dev/itvphp/studentReportScr.php?class=$class&dobfrom=$dobfrom&dobto=$dobto&view=1";
        header('Location: ' . $url);
        exit;
    }catch(PDOException $e){
        echo $e;
    }
}
if(isset($_POST['excel'])){
    $class = $_POST['class'];
    $dobfrom = $_POST['dobfrom'];
    $dobto = $_POST['dobto'];
    
    try{        
        $url = "https://hujjiibaba.dev/itvphp/studentReportScr.php?class=$class&dobfrom=$dobfrom&dobto=$dobto&view=2";
        header('Location: ' . $url);
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
    <title>Student Report</title>
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
                    <form action="#" method="POST" enctype="multipart/form-data">
                        
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="class">Options</label>
                            </div>
                            <select class="custom-select class" id="class" name="class" required>
                            <option selected>Choose Class</option>
                            <?php
                            $getClass = $pdo->query("SELECT * FROM CLASS")->fetchAll();
                            foreach ($getClass as $Class) {  ?>
                                <option value="<?php echo $Class->sr_id; ?>"><?php echo $Class->class_name; ?></option>
                            <?php     }
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="dobfrom">DOB From</label>
                            <input type="date" name="dobfrom" class="form-control date" id="dobfrom" required>
                        </div>
                        <div class="form-group">
                            <label for="dobto">DOB To</label>
                            <input type="date" name="dobto" class="form-control date" id="dobto" required>
                        </div>
                        <input type="submit" class="btn btn-outline-info view" name="view" value="View Report">
                        <input type="submit" class="btn btn-outline-success excel" name="excel" value="Export In Excel">
                    </form>
                </div>
            </div>
        </div>
        
    </div>
</div>
    
<script src="assets/js/main.js"></script>
<script>
$( document ).ready(function() {
    // $(".date").datepicker({dateFormat: 'yy'});
});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
</body>
</html>
