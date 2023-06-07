<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Analytics</h1>
        <h3>------------------------------</h3>
                <?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
                ?>
                
               <?php 
                        //Get all the orders from database
                        $sql = "SELECT * FROM tbl_order"; // DIsplay the Latest Order at First
                        //Execute Query
                        $res = mysqli_query($conn, $sql);
                        //Count the Rows
                        $count = mysqli_num_rows($res);
                        $mof = "SELECT food, COUNT(food) AS `value_occurrence` FROM tbl_order GROUP BY food ORDER BY `value_occurrence` DESC LIMIT 1;";
                        $a =mysqli_query($conn,$mof);
                        $totalp = "SELECT SUM(total) as tottal FROM tbl_order;";
                        $b =mysqli_query($conn,$totalp);
                        $moc = "SELECT customer_name, COUNT(customer_name) AS `frequency` FROM tbl_order GROUP BY customer_name ORDER BY `frequency` DESC LIMIT 1;";
                        $c =mysqli_query($conn,$moc);
                        if(!$a) 
                        {
                            die("Query Failed!");
                        } 
                        if(!$b) 
                        {
                            die("Query Failed!");
                        }
                        
                           ?>
                                    <br/>
                                    <h3>Total Number of Orders:&emsp; <?php echo $count; ?></h3>
                                        <br/>
                                    <h3>Most Ordered Food:&emsp; <?php 
                                                                        while($row=mysqli_fetch_assoc($a))
                                                                        {
                                                                            $food = $row['food'];                                                      
                                                                            echo $food;
                                                                        }
                                                                        mysqli_free_result($a);
                                                            
                                                                    ?></h3>
                                        <br/>                                   
                                    <h3>Total Profit Generated:&emsp;<?php 
                                                                        while($row=mysqli_fetch_assoc($b))
                                                                        {
                                                                            $tottal = $row['tottal'];
                                                                            echo $tottal;
                                                                        }
                                                                        mysqli_free_result($b);
                                                            
                                                                    ?>

                                    </h3>
                                        <br/>
                                    <h3>Most Frequent Customer:&emsp;<?php 
                                                                        while($row=mysqli_fetch_assoc($c))
                                                                        {
                                                                            $customer_name = $row['customer_name'];                                                      
                                                                            echo $customer_name;
                                                                        }
                                                                        mysqli_free_result($c);
                                                            
                                                                    ?>

                                    </h3>                            
                                    <?php
                            
            ?>
        <h3>------------------------------</h3>
        <br/><br/>
        <h1>Export to Excel</h1>
        <br/>
        <a href="export.php"><button type="button" class="btn btn-primary">Export</button>

    </div>
    
</div>

<?php include('partials/footer.php'); ?>