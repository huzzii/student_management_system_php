<?php
require 'includes/dbconnect.php';
$state = $_REQUEST['state'];
$getCity= $pdo->query("SELECT * FROM CITY WHERE state_id=$state")->fetchAll(PDO::FETCH_ASSOC);

$rows = array();

foreach ($getCity as $city) {
    $rows[] = [ 'success' => true,
        'code' => $city['sr_id'],
        'name' => $city['sr_name']
    ];
}
header("Content-type: application\json");
echo json_encode($rows);
?>