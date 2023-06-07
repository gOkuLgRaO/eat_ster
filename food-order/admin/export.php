<?php 

    include('../config/constants.php');

?>

<?php 
                    if(isset($_SESSION['update']))
                    {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                    }
?>

<?php  
    $sql = "SELECT * FROM tbl_order";
    $result = mysqli_query($conn, $sql);
    $output= '<table class="tbl-full">
                    <tr>
                        <td>S.N.</td>
                        <td>Food</td>
                        <td>Price</td>
                        <td>Qty</td>
                        <td>Total</td>
                        <td>Order Date</td>
                        <td>Customer Name</td>
                        <td>Contact</td>
                        <td>Email</td>
                        <td>Address</td>
                    </tr>';  
    $sn=1;          
    while($row=mysqli_fetch_assoc($result))
    {
        $output.='  <tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['food'].'</td>
                        <td>'.$row['price'].'</td>
                        <td>'.$row['qty'].'</td>                        
                        <td>'.$row['total'].'</td>
                        <td>'.$row['order_date'].'</td>
                        <td>'.$row['customer_name'].'</td>
                        <td>'.$row['customer_contact'].'</td>
                        <td>'.$row['customer_email'].'</td>
                        <td>'.$row['customer_address'].'</td>
                    </tr>';
    }
	$output.= '</table>';                    
  	header('Content-Type: application/xls');
  	header('Content-Disposition: attachment; filename=download.xls');
 	echo $output;
?>