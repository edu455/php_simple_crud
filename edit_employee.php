<?php
include 'php_scripts/database.php';
include 'php_scripts/functions.php';
if(isset($_GET['employee_id'])&&employee_exist($_GET['employee_id'])){
    $employee=employee_exist($_GET['employee_id']);
}
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $name=htmlspecialchars($_POST['name']);
    $lastname=htmlspecialchars($_POST['lastname']);
    $email=htmlspecialchars($_POST['email']);
    $date=date('Y-m-d',strtotime($_POST['date']));
    $salary=htmlspecialchars($_POST['salary']);
    $role=htmlspecialchars($_POST['role']);
    edit_employee($id,$name,$lastname,$email,$date,$salary,$role);
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <script src="assets/js/bootstrap.bundle.min.js" defer></script>
</head>

<body class="">
    <div>
        <a href="index.php">Back</a>
    </div>
    <div class="d-flex justify-content-center align-items-center" style="height: 90vh;">
        <form class="p-5 shadow-lg rounded " action="" method="post">
            <input type="hidden" value="<?php echo $employee['employee_id'];?>" name="id">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $employee['employee_name'];?>">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Lastname</label>
                <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $employee['employee_lastname'];?>">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $employee['employee_email'];?>">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date"  class="form-control" id="birthday" name="date" >
            </div>
            <div class="mb-3">
                <label for="salary" class="form-label">Salary</label>
                <input type="number" class="form-control" id="salary" name="salary" value="<?php echo $employee['employee_salary'];?>">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" id="role" name="role" value="<?php echo $employee['employee_role'];?>">
            </div>
            <input type="submit" value="Update" name="submit" class="btn btn-primary">
        </form>
    </div>
</body>

</html>