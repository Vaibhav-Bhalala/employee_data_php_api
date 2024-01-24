<?php
header("Access-Control-Allow-Methods: DELETE");

include("../config/config.php");

$config = new Config();

if($_SERVER['REQUEST_METHOD'] == 'DELETE'){

    $object= file_get_contents("php://input");

    parse_str($object,$_DELETE);

    $id = $_DELETE['id'];

    $isDeleted = $config->DeleteEmployee($id);


   if($isDeleted){
    $res['data'] = "Employee Deleted Succesfully...";
   }else{
    $res['error'] = "Employee Not Deleted...";
   }

}else{
    $res['error'] = "Only DELETE http Method is Allowed....";
}

echo json_encode($res);


?>