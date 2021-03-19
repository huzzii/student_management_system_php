<?php
    require 'includes/dbconnect.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $empid = $_POST['empid'];
    
        $sql = 'SELECT * FROM USER WHERE user_name = :user AND emp_id = :emp';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user' => $username, 'emp' => $empid]);
        $users = $stmt->fetchAll();
        if($users){
            $mail_from = "";
            $email_subject = "Reset Password For PHP";

            $email_body = "Username: $username . \n" .
                          "Employee Id: $empid . \n";

            $to = "mayuresh@itvedant.com";

            $header = "From: $mail_from \r\n";
            $header .= "Reply-To: $mail_from \r\n";

            if (mail($to, $email_subject, $email_body, $header)) {
                header('Location: index.php?msg=1');
                exit;
            } else {
                header('Location: index.php');
                exit;
            }
        }else{
            $connError = 'No User Found';
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Forget Password</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/forget.css">
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-12">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h4 class="mb-0 mr-4 mt-2">PHP Project</h4>
                    </div>
                    <div class="row mb-4 px-3">
                        <h6 class="mb-0 mr-4 mt-2">Reset Password</h6>
                    </div>
                    <form action="#" method="post">
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Username</h6>
                            </label> 
                            <input class="mb-4" type="text" name="username" placeholder="Enter your username" required>
                        </div>
                        <div class="row px-3"> 
                            <label class="mb-1">
                                <h6 class="mb-0 text-sm">Emp ID</h6>
                            </label>
                            <input type="text" name="empid" placeholder="Enter your Employee Id" required> 
                        </div>
                        
                        <div class="row mb-3 px-3"> <input type="submit" name="submit" value="reset" class="btn btn-red text-center"> </div>
                        <?php 
                        if(!empty($connError)){ ?>
                            <div class="alert alert-danger" role="alert">
                            <?php echo $connError; ?>
                            </div>
                       <?php }
                        ?>
                    </form>
                    <div class="row mb-4 px-3"> <small class="font-weight-bold">Login here <span style="font-size:27px;">&#8594; </span> <a href="index.php" class="text-blue ">Login</a></small> </div>

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
