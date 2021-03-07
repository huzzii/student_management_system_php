<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $telno = $_POST['telno'];
    $nos = $_POST['nos'];
    $floor = $_POST['floor'];
    $teacher = $_POST['teacher'];
    
    try{        
        $sql = 'INSERT INTO CLASS(class_name, tel_no, no_of_student, floor, teach_id) VALUES(:sname,:telno,:nos,:flr,:teach)';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sname' => $name, 'telno' => $telno, 'nos' => $nos, 'flr' => $floor, 'teach' => $teacher]);
        header('Location: https://hujjiibaba.dev/itvphp/class.php');
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
                    <center><h1>Add Class&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="class.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Class Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter class name" required>
                        </div>
                        <div class="form-group">
                            <label for="telno">Telephone No</label>
                            <input type="number" name="telno" class="form-control" id="telno" placeholder="Enter Number" required>
                        </div>
                        <div class="form-group">
                            <label for="nos">No Of Student</label>
                            <input type="number" name="nos" class="form-control" id="nos" placeholder="Enter No Of Student In Class " required>
                        </div>
                        <div class="form-group">
                            <label for="floor">Floor</label>
                            <input type="number" name="floor" class="form-control" id="floor" placeholder="Enter No Of Student In Class " required>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="teacher">Options</label>
                            </div>
                            <select class="custom-select teacher" id="teacher" name="teacher" required>
                            <option selected>Choose Class Teacher</option>
                            <?php
                            $getTeacher = $pdo->query("SELECT * FROM TEACHER")->fetchAll();
                            foreach ($getTeacher as $Teacher) {  ?>
                                <option value="<?php echo $Teacher->sr_id; ?>"><?php echo $Teacher->teach_name; ?></option>
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
