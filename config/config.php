<?php
class Config{
    public $HOSTNAME = "127.0.0.1";
    public $USERNAME = "root";
    public $PASSWORD = "";
    public $DATABASE_NAME = "employee";
    public $con_res;

    public function Connect(){

        $this->con_res = mysqli_connect($this->HOSTNAME,$this->USERNAME,$this->PASSWORD,$this->DATABASE_NAME);
        return $this->con_res;
    }

    public function insertemployee($emp_id,$emp_name,$emp_dep,$emp_salary,$emp_location){
        $this->Connect();

        $query = "INSERT INTO emp_data(emp_id,emp_name,emp_dep,emp_salary,emp_location) VALUES ('$emp_id','$emp_name','$emp_dep','$emp_salary','$emp_location');";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function fetchemployee(){
        $this->Connect();

        $query = "SELECT * FROM emp_data";

        $object = mysqli_query($this->con_res,$query);
        return $object;
    }

    public function DeleteEmployee($id){
        $this->Connect();

        $query = "DELETE FROM emp_data WHERE id=$id; ";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }

    public function UpdateEmployee($emp_id,$emp_name,$emp_dep,$emp_salary,$emp_location,$id){
        $this->Connect();

        $query = "UPDATE emp_data SET emp_id='$emp_id',emp_name='$emp_name',emp_dep='$emp_dep',emp_salary='$emp_salary',emp_location='$emp_location' WHERE id=$id; ";

        $res = mysqli_query($this->con_res,$query);
        return $res;
    }   

}

?>