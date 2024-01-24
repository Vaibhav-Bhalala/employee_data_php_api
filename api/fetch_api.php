<?php
header("Access-Control-Allow-Methods: GET");

include("../config/config.php");

$config = new Config();

if($_SERVER['REQUEST_METHOD'] == 'GET'){

   $emp_id = _GET['emp_id'];
   $emp_name = _GET['emp_name'];
   $emp_dep = _GET['emp_dep'];
   $emp_salary = _GET['emp_salary'];
   $emp_location = _GET['emp_location'];
   

   $responce = $config->fetchemployee($emp_id,$emp_name,$emp_dep,$emp_salary,$emp_location);

   if($responce){
    $res['data'] = "Employee Data Fetched Succesfully...";
   }else{
    $res['error'] = "Employee Data fatching Failed...";
   }

}else{
    $res['error'] = "Only GET http Method is Allowed....";
}

echo json_encode($res);


?>