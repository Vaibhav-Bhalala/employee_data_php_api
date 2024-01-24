<?php
header("Access-Control-Allow-Methods: POST");

include("../config/config.php");

$config = new Config();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

   $emp_id = _POST['emp_id'];
   $emp_name = _POST['emp_name'];
   $emp_dep = _POST['emp_dep'];
   $emp_salary = _POST['emp_salary'];
   $emp_location = _POST['emp_location'];
   

   $responce = $config->insertemployee($emp_id,$emp_name,$emp_dep,$emp_salary,$emp_location);

   if($responce){
    $res['data'] = "Employee Added Succesfully...";
   }else{
    $res['error'] = "Employee Insertion Failed...";
   }

}else{
    $res['error'] = "Only POST http Method is Allowed....";
}

echo json_encode($res);


?>