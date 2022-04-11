

<?php   
       require_once 'dbconnection.php';

       $sql3="SELECT * FROM product";
        $query3=$conn->query($sql3);

       $data_list= array();

       while($data3= mysqli_fetch_assoc($query3)){

     $product_id =$data3['product_id'];
       $product_name =$data3['product_name'];
       
       
        $data_list[$product_id ]= $product_name;
    }

    session_start();

    $user_first_name= $_SESSION['user_first_name'];
    $user_last_name=  $_SESSION['user_last_name'];
    
    if(!empty($user_first_name) && !empty($user_last_name)){     
    
  
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />    
        
</head>
<body>


              
                    
                      

<div class="container bg-light">
            <div class="container-fluid border-bottom border-success"><!-- topbar -->
                   <?php include('topbar.php') ?>
                    
            </div><!-- topbar -->
            <div class="container-fluid">
                <div class="row"><!-- Start of row -->                            
                    <div class="col-sm-3 bg-light p-0 m-0"><!-- Start of left side -->

                            <?php include('leftsidebar.php') ?>      

                    </div>    <!-- end of left side -->




                    <div class="col-sm-9 p-5 border-start border-success"><!-- Start of right side -->
                                
                    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

    
Product Select Name:
<select name="product_name" >
<?php  


                $sql= "SELECT * FROM product";
                $query=$conn->query($sql);
                  
                while( $data=mysqli_fetch_assoc($query)){

                $product_id=$data['product_id'];
                $product_name=$data['product_name'];
                ?>
                 <option value="<?php echo $product_id?>"> <?php echo $product_name?></option>

                 <?php  }?>
</select>

<input type="submit" value="Report Genarate">

</form>
                  <h1 class="text-success">Store Product</h1>

            <?php 
                  
                  if(isset($_GET['product_name'])){
                       
                 $product_name= $_GET['product_name'];

                   $sql1= "SELECT * FROM store_product WHERE store_product_name='$product_name'";

                   $query1=$conn->query($sql1);
                   
                  while($data1=mysqli_fetch_array($query1)) {
                               $store_product_name=$data1['store_product_name'];
                                $store_product_quantity=$data1['store_product_quantity'];
                                $store_product_entrydate=$data1['store_product_entrydate'];
                   
                     echo "<h3>$data_list[$store_product_name]</h3>";
                    echo "<table class='table  table-success'> <tr> <th>Date</th><th> Amount</th></tr>";
                    echo "<tr> <td>$store_product_quantity</td><td>$store_product_entrydate</td>";

                    echo "</table>";

                  }
                } 

                  ?>





                <h1 class="text-success">Spend Product</h1>

                <?php 
                      
                      if(isset($_GET['product_name'])){
                          
                    $product_name= $_GET['product_name'];

                      $sql4= "SELECT * FROM spend_product WHERE spend_product_name='$product_name'";

                      $query4=$conn->query($sql4);
                      
                      while($data4=mysqli_fetch_array($query4)) {
                                  $spend_product_name=$data4['spend_product_name'];
                                    $spend_product_quantity=$data4['spend_product_quantity'];
                                    $spend_product_entrydate=$data4['spend_product_entrydate'];
                      
                        echo "<h3>$data_list[$spend_product_name]</h3>";
                        echo "<table class='table  table-primary'> <tr> <th>Amount</th><th> Date</th></tr>";
                        echo "<tr> <td>$spend_product_quantity</td><td>$spend_product_entrydate</td>";

                        echo "</table>";

                      }
                    } 

                      ?>
                                         
                     </div>   <!--end of right side -->
            </div>
            <div class="container-fluid border-top border-success">   <!-- start of bottom -->
            <?php include('bottombar.php') ?>   
            </div><!-- end of bottom -->

        </div>   <!-- end of continer -->








    
</body>
</html>

<?php 
  }else{
    header("location:login.php");
   }


?>

