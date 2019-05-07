<?php
include('header.php');
include('db.php');

if(isset($_POST['submit'])){
$name= $_POST['name'];
$roll= $_POST['roll'];

$sql = "INSERT INTO `attendance`(`name`, `roll`) VALUES ('$name','$roll')";
$query=mysqli_query($dbcon, $sql);
    if($query == true)
    {
        header('location:add.php?msg=Success!Data inserted succefully.');
    }
    else{
        header('location:add.php?msg=Data inserted error!');
    }
}
?>
 
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="add.php"><button class="btn btn-success">Add</button></a>
            <a href="index.php" class="pull-right"><button class="btn btn-success">Back</button></a>
        </div>
    </div>
            <div class="alert alert-success">
                <strong>
                    <?php
                        if(isset($_GET['msg'])){
                            $msg=$_GET['msg'];
                            echo $msg;
                        }
                    ?>
                </strong> 
            </div>
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="body table-responsive">
                <form action="add.php" method="POST">
                    <div class="form-group">
                        <label for="name">Student Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                    </div>
                    <div class="form-group">
                    <label for="roll">Student Roll:</label>
                    <input type="text" class="form-control" id="roll" placeholder="Enter roll" name="roll">
                    </div>
                    <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                </form>
            </div>                      
        </div>
        </div>
    </div>      
    <div>
        <div class="panel-footer panel-primary"></div>
    </div>
</div>
