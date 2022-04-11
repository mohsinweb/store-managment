
<?php   
  require ('dbconnection.php');
  function data_list($table, $column1,$column2){

    require ('dbconnection.php');
        $sql="SELECT * FROM $table";
        $query=$conn->query($sql);


        while($data= mysqli_fetch_assoc($query)){
          $data_id=$data[$column1];
          $data_name=$data[$column2];
         
        
           echo "<option value='$data_id'>$data_name </option>";
           
          }
        }
    
 
                    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Store_Product</title>
</head>
<body>

<?php      

                    if(isset($_GET['id'])){
                        $getid=$_GET['id'];

                            $sql="SELECT * FROM spend_product WHERE spend_product_id=$getid";
                            $query=$conn->query($sql);
                            $data=mysqli_fetch_assoc($query);


                            $spend_product_id=$data['spend_product_id'];
                            $spend_product_name=$data['spend_product_name'];
                            $spend_product_quantity=$data['spend_product_quantity'];
                         $spend_product_entrydate	=$data['spend_product_entrydate'];
                            
                    }


                    if(isset($_GET['spend_product_name'])){

                        $new_spend_product_name=$_GET['spend_product_name'];
                      //  $new_product_category=$_GET['product_category'];
                        $new_spend_product_quantity=$_GET['spend_product_quantity'];
                        $spend_product_entrydate=$_GET['spend_product_entrydate'];
                        $new_spend_product_id=$_GET['spend_product_id'];
  
                          $sql1= "UPDATE  spend_product SET spend_product_name='$new_spend_product_name', spend_product_quantity='$new_spend_product_quantity',	spend_product_entrydate='$spend_product_entrydate' WHERE spend_product_id =$new_spend_product_id";
  
                          $query1=$conn->query($sql1);
                          if($query1){
                            echo "update seccefully";
                          }else{
                            echo "not update".$conn->error;
                          }
  
                      }


                    ?>

                    



       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                   
                    <b>Spend Product Name:</b>  <br>
                          <select name="spend_product_name" >
                          
                        

                      
                            <?php 
                                    // $sql="SELECT * FROM product";
                                    // $query=$conn->query($sql);


                                    // while($data= mysqli_fetch_assoc($query)){
                                    // $data_id=$data[$product_id];
                                    // $data_name=$data[$product_name];
                                    
                                    data_list('product','product_id','product_name');
                               ?>
                    
                               
                            
                          </select><br><br>                         
                        
                      <b>Product Quantity:</b>  <br>                      
                      <input type="text" name="spend_product_quantity" required value="<?php echo $spend_product_quantity?>"> <br><br>
                      
                      
                      
                      <b>Product Entry Date:</b> <br>                   
                    <input type="DATE" name="spend_product_entrydate" required value="<?php echo $spend_product_entrydate?>"> <br> <br>
                       
                       
                       
                        <input type="text" name="spend_product_id" required value="<?php echo $spend_product_id?>" hidden> <br> <br>
                        <input type="submit" value="ADD pRODUCT" name="submit">



    </form>
    
</body>
</html>