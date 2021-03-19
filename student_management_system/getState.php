<?php
require 'includes/dbconnect.php';
$country = $_REQUEST['country'];
$getState = $pdo->query("SELECT * FROM STATE WHERE country_id=$country")->fetchAll(PDO::FETCH_ASSOC);

$rows = array();

foreach ($getState as $state) {
    $rows[] = [ 'success' => true,
        'code' => $state['sr_id'],
        'name' => $state['sr_name']
    ];
}
header("Content-type: application\json");
echo json_encode($rows);
?>