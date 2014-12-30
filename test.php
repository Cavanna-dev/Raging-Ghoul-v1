<?php

$data = array(
    "test" => "test json noob"
    );
header('Content-Type: application/json');
echo json_encode($data);

?>