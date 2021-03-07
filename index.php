<?php
    session_start();
    require 'includes/dbconnect.php';
    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);
    
        $sql = 'SELECT * FROM USER WHERE user_name = :user AND password = :pass';
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['user' => $username, 'pass' => $password]);
        $users = $stmt->rowCount();
        if($users > 0){
            $users = $stmt->fetch();

            $_SESSION['username'] = $users->user_name;
            $_SESSION['password'] = $users->password;
            $_SESSION['name'] = $users->sr_name;
            header('Location: https://hujjiibaba.dev/itvphp/dashboard.php');
            exit;
        }else{
            $connError = 'Username Or Password Not Matched! Please Try Again!';
        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Login Form</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <script>
    </script>
</head>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"> <img src="assets/img/mainlogo.png" class="logo"> </div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"> <img src="https://i.imgur.com/uNGdWHi.png" class="image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row mb-4 px-3">
                        <h4 class="mb-0 mr-4 mt-2">School Management System</h4>
                        <?php 
                        if(!empty($_GET['msg'])){
                            if(!empty($_GET['msg'])){ ?>
                               <div class="alert alert-success" role="alert">
                               <button type="button" class="close" data-dismiss="alert">x</button>
                               <?php echo "Mail Sent Successfully! Please Check Your Mail & Login Again."; $_GET['msg'] = ''; ?>
                               </div>
                           <?php } else { ?>
                               <div class="alert alert-danger" role="alert">
                               <button type="button" class="close" data-dismiss="alert">x</button>
                                <?php echo "Mail Not Sent. Please Contact Admin"; $_GET['msg'] = ''; ?>
                               </div>
                            <?php   }
                            
                        }
                        ?>
                        
                        
                    </div>
                    <form action="#" method="POST">
                        <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Username</h6>
                        </label> 
                        <input class="mb-4" type="text" name="username" placeholder="Enter your username" required> </div>
                        <div class="row px-3"> 
                        <label class="mb-1">
                            <h6 class="mb-0 text-sm">Password</h6>
                        </label>
                        <input type="password" name="password" placeholder="Enter your password" required> </div>
                        <div class="row px-3 mb-4">
                            <a href="forget.php" class="ml-auto mb-0 text-sm">Forgot Password?</a>
                        </div>
                        <div class="row mb-3 px-3"> 
                            <input type="submit" name="submit" value="submit" class="btn btn-blue text-center"> 
                        </div>
                    </form>
                    <?php 
                    if(!empty($connError)){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $connError; ?>
                        </div>
                   <?php }
                    ?>
                    <!-- <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div> -->
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