<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
$id = $_GET['id'];


if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $telno = $_POST['telno'];
    $email = $_POST['email'];
    $dob = $_POST['dob'];
    $class = $_POST['class'];
    $teacher = $_POST['teacher'];
    
    try{ 
        $sql = "UPDATE STUDENT SET sr_name=:sname, tel_no=:tel, email_id=:email, dob=:dob, class_id=:class, teach_id=:teach WHERE sr_id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['sname' => $name, 'tel' => $telno, 'email' => $email, 'dob' => $dob, 'class' => $class, 'teach' => $teacher, 'id' => $id]);
        header('Location: https://hujjiibaba.dev/itvphp/student.php');
        exit;
    }catch(PDOException $e){
        echo $e;
    }
}
    $getid = $pdo->query("SELECT * FROM STUDENT WHERE sr_id=$id")->fetch();
    $getTeacher = $pdo->query("SELECT * FROM TEACHER WHERE sr_id=$getid->teach_id")->fetch();
    $getClass = $pdo->query("SELECT * FROM CLASS WHERE sr_id=$getid->class_id")->fetch();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
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
                <center><h1>Edit Student&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="student.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                    
                    <form action="#" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="name">Student Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter Student Name" value="<?php echo $getid->sr_name; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="telno">Telephone No</label>
                            <input type="number" name="telno" class="form-control" id="telno" placeholder="Enter Number" value="<?php echo $getid->tel_no; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter Email "  value="<?php echo $getid->email_id; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input type="date" name="dob" class="form-control" id="dob"  value="<?php echo $getid->dob; ?>" required>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="teacher">Options</label>
                            </div>
                            <select class="custom-select teacher" id="teacher" name="teacher" required>
                            <option selected value="<?php echo $getTeacher->sr_id; ?>" ><?php echo $getTeacher->teach_name; ?></option>
                            <?php
                            $getTeacher = $pdo->query("SELECT * FROM TEACHER")->fetchAll();
                            foreach ($getTeacher as $Teacher) {  ?>
                                <option value="<?php echo $Teacher->sr_id; ?>"><?php echo $Teacher->teach_name; ?></option>
                            <?php     }
                            ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="class">Options</label>
                            </div>
                            <select class="custom-select class" id="class" name="class" required>
                            <option selected value="<?php echo $getClass->sr_id; ?>"><?php echo $getClass->class_name; ?></option>
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
<script src="assets/js/auto_get_teacher.js"></script>

</body>
</html>
