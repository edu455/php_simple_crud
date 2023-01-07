<?php
include 'php_scripts/database.php';
include 'php_scripts/functions.php';
    if(isset($_GET['delete'])&&employee_exist($_GET['delete'])){
        delete_employee($_GET['delete']);
        header('Location: index.php');
    }else if(isset($_GET['delete'])&&!employee_exist($_GET['delete'])){
        header('Location: index.php');
    }
    $maintable;
    if(isset($_GET['search'])&&search_employee($_GET['search'])){
        $maintable=search_employee($_GET['search']);
    }else{
        $maintable=employee_array();
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
    <div class="container mt-5">
        <div class="row">
            <h1 class="text-center">EMPLOYEE LIST</h1>
            <div class="col-10">
                <form class="d-flex" role="search" action="" method="get">
                    <input class="form-control" type="search" placeholder="Search" name="search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
            <div class="col-2">
                <a href="add_employee.php" class="btn btn-success">Add</a>
                <a href="index.php" class="btn btn-primary">Refresh</a>
            </div>
        </div>
        <div class="row mt-5">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">LASTNAME</th>
                        <th scope="col">EMAIL</th>
                        <th scope="col">BIRTHDAY</th>
                        <th scope="col">SALARY</th>
                        <th scope="col">ROLE</th>
                        <th scope="col">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($maintable) {
                        foreach($maintable as $employee){
                    ?>
                        <tr>
                            <td><?php echo $employee['employee_id'] ;?></td>
                            <td><?php echo $employee['employee_name'] ;?></td>
                            <td><?php echo $employee['employee_lastname'] ;?></td>
                            <td><?php echo $employee['employee_email'] ;?></td>
                            <td><?php echo $employee['employee_birthday'] ;?></td>
                            <td><?php echo $employee['employee_salary'] ;?></td>
                            <td><?php echo $employee['employee_role'] ;?></td>
                            <td>
                                <a href="edit_employee.php?employee_id=<?php echo $employee['employee_id'];?>" class="btn btn-primary">Edit</a>
                                <a href="?delete=<?php echo $employee['employee_id'];?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php
                        }
                    }else{
                        ?>
                            <h1>NO RESULTS</h1>
                        <?php
                    }
                    ?>

                </tbody>
            </table>
        </div>
    </div>
</body>

</html>