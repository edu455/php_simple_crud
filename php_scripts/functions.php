<?php
    function employee_array(){
        global $conn;
        $query='SELECT * FROM EMPLOYEE_TABLE';
        $result=mysqli_query($conn,$query);
        if($result){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }else{
            return array();
        }
    }
    function insert_employee($name,$lastname,$email,$birthday,$salary,$role){
        global $conn;
        $query='INSERT INTO EMPLOYEE_TABLE VALUES (NULL,?,?,?,?,?,?)';
        $stmt=mysqli_prepare($conn,$query);
        $stmt->bind_param('ssssss',$name,$lastname,$email,$birthday,$salary,$role);
        if(!$stmt->execute()){
            die('Query failed: '.$stmt->errno);
        }
    }
    function delete_employee($id){
        global $conn;
        $query='DELETE FROM EMPLOYEE_TABLE WHERE EMPLOYEE_ID=?';
        $stmt=mysqli_prepare($conn,$query);
        $stmt->bind_param('s',$id);
        if(!$stmt->execute()){
            die('Query failed'.$stmt->errno);
        }
    }
    function edit_employee($id,$name,$lastname,$email,$birthday,$salary,$role){
        global $conn;
        $query='UPDATE EMPLOYEE_TABLE SET EMPLOYEE_NAME=?,EMPLOYEE_LASTNAME=?,EMPLOYEE_EMAIL=?,EMPLOYEE_BIRTHDAY=?,EMPLOYEE_SALARY=?,EMPLOYEE_ROLE=? WHERE EMPLOYEE_ID=?';
        $stmt=mysqli_prepare($conn,$query);
        $stmt->bind_param('sssssss',$name,$lastname,$email,$birthday,$salary,$role,$id);
        if(!$stmt->execute()){
            die('Query failed: '.$stmt->errno);
        }
        
    }
    function employee_exist($id){
        global $conn;
        $query='SELECT * FROM EMPLOYEE_TABLE WHERE EMPLOYEE_ID=?';
        $stmt=mysqli_prepare($conn,$query);
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0){
            return mysqli_fetch_assoc($result);
        }else{
            return array();
        }
    }
    function search_employee($id){
        global $conn;
        $query='SELECT * FROM EMPLOYEE_TABLE WHERE EMPLOYEE_NAME LIKE ?';
        $stmt=mysqli_prepare($conn,$query);
        $id='%'.$id.'%';
        $stmt->bind_param('s',$id);
        $stmt->execute();
        $result=$stmt->get_result();
        if($result->num_rows>0){
            return mysqli_fetch_all($result,MYSQLI_ASSOC);
        }else{
            return array();
        }
    }
?>