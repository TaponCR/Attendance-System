<?php
include('header.php');
include('db.php'); 
?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <a href="add.php"><button class="btn btn-success">Add</button></a>
            <a href="index.php" class="pull-right"><button class="btn btn-success">Back</button></a>
        </div>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="body table-responsive">
                    <form action="index.php" method="POST">
                        <table class="table table-bordered table-hover">
                            <thead class="bg-teal">
                                <?php
                                
                                    $sql ="SELECT * FROM `atten_records` where date='$_POST[date]'";
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
                                    </td>
                                    <td><?php echo $data['roll'];?>
                                    </td>
                                    <td>
                                        <label class="radio-inline"></label>
                                        <input type="radio" name="atten_status[<?php echo $count;?>]" 
                                        <?php if($data['atten_status']=="Present")
                                        echo "checked";
                                        ?>
                                        value="Present">Present

                                        <label class="radio-inline"></label> 
                                        <input type="radio" name="atten_status[<?php echo $count;?>]"
                                        <?php if($data['atten_status']=="Absent")
                                        echo "checked";
                                        ?>
                                         value="Absent">Absent
                                    </td>
                                </tr>  
                                <?php
                                $count++;

                                    }
                                ?>    
                            </tbody>
                        </table>  
                    </form>
                </div>                      
            </div>
        </div>
    </div>      
    <div>
        <div class="panel-footer panel-primary"></div>
    </div>
</div>
