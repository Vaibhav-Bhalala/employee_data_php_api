<?php
header("Access-Control-Allow-Methods: PATCH");

include("../config/config.php");

$config = new Config();

if($_SERVER['REQUEST_METHOD'] == 'PATCH'){

    $object= file_get_contents("php://input");

    parse_str($object,$_UPDATE);

    $id = $_UPDATE['id'];
    $emp_id = $_UPDATE['emp_id'];
    $emp_name = $_UPDATE['emp_name'];
    $emp_dep = $_UPDATE['emp_dep'];
    $emp_salary = $_UPDATE['emp_salary'];
    $emp_location = $_UPDATE['emp_location'];

    $isUpdated = $config->UpdateEmployee($emp_id,$emp_name,$emp_dep,$emp_salary,$emp_location,$id);


   if($isUpdated){
    $res['data'] = "Employee Updated Succesfully...";
   }else{
    $res['error'] = "Employee Not Update...";
   }

}else{
    $res['error'] = "Only PATCH http Method is Allowed....";
}

echo json_encode($res);


?>