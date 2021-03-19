<?php
require("includes/check_auth_user.php");
session_unset($_SESSION["username"]);
session_unset($_SESSION["password"]);
session_unset($_SESSION["name"]);
session_destroy();
header("Location: index.php");
?>