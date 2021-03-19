<?php
require 'includes/dbconnect.php';
require 'includes/check_auth_user.php';
$view = $_GET['view'];
$dobfrom = trim($_GET['dobfrom']);
$dobto = trim($_GET['dobto']);
$class = $_GET['class'];

if($view == 1){
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
    .container-fluid{
        max-width:100%;
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
                    <div class="row d-flex">
                        <div class="col-lg-12">
                            <div class="card1 pb-5">
                                <center><h1>Student Report&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="studentReportFilter.php" class="btn btn-outline-warning">Go Back</a></h1></center>
                                <table class="table table-dark">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Number</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">DOB</th>
                                    <th scope="col">Class Name</th>
                                    <th scope="col">Class </th>
                                    <th scope="col">Class NOS</th>
                                    <th scope="col">Class floor</th>
                                    <th scope="col">Teacher</th>
                                    <th scope="col">Teacher City</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $getStudent = $pdo->query("SELECT * FROM STUDENT WHERE class_id=$class AND dob >= '$dobfrom' AND dob <= '$dobto'")->fetchAll();
                                    if($getStudent){
                                        foreach ($getStudent as $Student) {
                                            $getClass = $pdo->query("SELECT * FROM CLASS WHERE sr_id=$class")->fetch();
                                            $getTeacher = $pdo->query("SELECT * FROM TEACHER WHERE sr_id=$Student->teach_id")->fetch();
                                            echo '<tr>
                                            <th scope="row">' . $Student->sr_id . '</th>
                                            <td>' . $Student->sr_name . '</td>
                                            <td>' . $Student->tel_no . '</td>
                                            <td>' . $Student->email_id . '</td>
                                            <td>' . $Student->dob . '</td>
                                            <td>' . $getClass->class_name . '</td>
                                            <td>' . $getClass->tel_no . '</td>
                                            <td>' . $getClass->no_of_student . '</td>
                                            <td>' . $getClass->floor . '</td>
                                            <td>' . $getTeacher->teach_name . '</td>
                                            <td>' . $getTeacher->city_name . '</td>
                                            </tr> ';
                                        }  
                                    }else {
                                    echo '<tr><th colspan="11" scope="row">No Record Found</th></tr>';
                                        
                                    }
                                    ?>
                                
                                </tbody>
                            </table>

                            </div>
                        </div>
                    </div>
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

<?php
    
} else {
    $contents.="ID,Student Name,Student Number,Email,DOB,Class Name,Class Tel No,Class NOS,Floor,Teacher Name,Teachers Address\n";
    $getStudent = $pdo->query("SELECT * FROM STUDENT WHERE class_id=$class AND dob >= '$dobfrom' AND dob <= '$dobto'")->fetchAll();
    if($getStudent){
        foreach ($getStudent as $Student) {
            $getClass = $pdo->query("SELECT * FROM CLASS WHERE sr_id=$class")->fetch();
            $getTeacher = $pdo->query("SELECT * FROM TEACHER WHERE sr_id=$Student->teach_id")->fetch();
            $contents.=$Student->sr_id . ",";
            $contents.=$Student->sr_name . ",";
            $contents.=$Student->tel_no . ",";
            $contents.=$Student->email_id . ",";
            $contents.=$Student->dob . ",";
            $contents.=$getClass->class_name . ",";
            $contents.=$getClass->tel_no . ",";
            $contents.=$getClass->no_of_student . ",";
            $contents.=$getClass->floor . ",";
            $contents.=$getTeacher->teach_name . ",";
            $contents.=$getTeacher->city_name . "\n";
        }  
        $contents = strip_tags($contents);
        header("Content-Disposition: attachment; filename=student_report" . "_summary_" . date('d-m-Y') . ".csv");
        print $contents;
    }else {
    echo '<tr><th colspan="11" scope="row">No Record Found</th></tr>';
        
    }

}

?>