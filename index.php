<?php
include('header.php');
include('db.php');
if(isset($_POST['submit'])){
    foreach($_POST['atten_status'] as $id=>$atten_status)
    {
    $name = $_POST['name'][$id];
    $roll = $_POST['roll'][$id];
    $date=date("Y-m-d H:i:s");

    $query=mysqli_query($dbcon,"INSERT INTO `atten_records`(`name`, `roll`, `atten_status`, `date`) VALUES ('$name','$roll','$atten_status','$date')");
        if($query == true){
                header('location:index.php?msg=Success!Attendance taken succefully.');
            }
        else{
            header('location:index.php?msg=Data inserted error!');
            }
        }
    }
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="add.php"><button class="btn btn-success">Add</button></a>
            <a href="view_all.php" class="pull-right"><button class="btn btn-success">View All</button></a>
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
                    <div class="well text-center"><h4><b>Date : </b><?php echo date('d-m-Y');?></h4></div>
                    <form action="index.php" method="POST">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-teal">
                                <?php
                                    $sql ="SELECT * FROM `attendance`";
                                    $view =mysqli_query($dbcon, $sql);
                                ?>                        
                    
                                <tr>
                                    <th>Id</th>
                                    <th>Student Name</th>
                                    <th>Student Roll</th>
                                    <th>Attendance Status</th>
                                </tr>
                            </thead>
                            <tbody>   
                            <?php
                            $id=0;
                            $count=0;
                            while($data =mysqli_fetch_array($view))
                                        { 
                                            $id++;
                            ?>                
                                <tr class="table">
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $data['name'];?>
                                    <input type="hidden" value="<?php echo $data['name'];?>" name="name[]">
                                    </td>
                                    <td><?php echo $data['roll'];?>
                                    <input type="hidden" value="<?php echo $data['roll'];?>" name="roll[]">
                                    </td>
                                    <td>
                                        <label class="radio-inline"></label>
                                        <input type="radio" name="atten_status[<?php echo $count; ?>]" value="Present" required="atten_status">Present

                                        <label class="radio-inline"></label> 
                                        <input type="radio" name="atten_status[<?php echo $count;?>]" value="Absent" required="atten_status">Absent
                                    </td>
                                </tr>  
                                <?php
                                $count++;

                                    }
                                ?>    
                            </tbody>
                        </table>  
                        <input type="submit" class="btn btn-success" name="submit" value="submit" > 
                    </form>
                </div>                      
            </div>
        </div>
    </div>      
    <div>
        <div class="panel-footer panel-primary"></div>
    </div>
</div>
