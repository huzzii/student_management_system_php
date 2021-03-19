<?php
require 'includes/dbconnect.php';
$teacher = $_REQUEST['teacher'];
$getClass = $pdo->query("SELECT * FROM CLASS WHERE teach_id=$teacher")->fetchAll(PDO::FETCH_ASSOC);

$rows = array();

foreach ($getClass as $class) {
    $rows[] = [ 'success' => true,
        'code' => $class['sr_id'],
        'name' => $class['class_name']
    ];
}
header("Content-type: application\json");
echo json_encode($rows);
?>