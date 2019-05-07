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
                        <table class="table table-bordered table-hover">
                            <thead class="bg-teal">
                                <?php
                                    $sql ="SELECT DISTINCT date FROM `atten_records`";
                                    $view =mysqli_query($dbcon, $sql);
                                ?>                        
                    
                                <tr>
                                    <th>Id</th>
                                    <th>Dates</th>
                                    <th>Show Attendance</th>
                                </tr>
                            </thead>
                            <tbody>   
                            <?php
                            $id=0;
                            while($data =mysqli_fetch_array($view))
                                        { 
                                            $id++;
                            ?>                
                                <tr class="table">
                                    <td><?php echo $id;?></td>
                                    <td><?php echo $data['date'];?>
                                    </td>
                                    <td>
                                        <form action="show_atten.php" method="POST">
                                            <input type="hidden" value="<?php echo $data['date'];?>" name="date">
                                            <input type="submit" class="btn btn-success" value="Show Attendance" name="">
                                            
                                        </form>
                                    </td>
                                </tr>  
                                <?php

                                    }
                                ?>    
                            </tbody>
                        </table>  
                </div>                      
            </div>
        </div>
    </div>      
    <div>
        <div class="panel-footer panel-primary"></div>
    </div>
</div>
