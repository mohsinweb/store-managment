
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

                            $sql="SELECT * FROM store_product WHERE store_product_id=$getid";
                            $query=$conn->query($sql);
                            $data=mysqli_fetch_assoc($query);


                            $store_product_id1=$data['store_product_id'];
                            $store_product_name1=$data['store_product_name'];
                            $store_product_quantity1=$data['store_product_quantity'];
                         $store_product_entrydate1=$data['store_product_entrydate'];
                            
                    }


                    if(isset($_GET['store_product_name'])){

                        $new_store_product_name=$_GET['store_product_name'];
                      //  $new_product_category=$_GET['product_category'];
                        $new_store_product_quantity=$_GET['store_product_quantity'];
                        $store_product_entrydate=$_GET['store_product_entrydate'];
                        $new_store_product_id=$_GET['store_product_id'];
  
                          $sql1= "UPDATE  store_product SET store_product_name='$new_store_product_name', store_product_quantity='$new_store_product_quantity',	store_product_entrydate='$store_product_entrydate' WHERE store_product_id =$new_store_product_id";
  
                          $query1=$conn->query($sql1);
                          if($query1){
                            echo "update seccefully";
                          }else{
                            echo "not update".$conn->error;
                          }
  
                      }


                    ?>

                    



       <form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">

                   
                    <b>Store Product Name:</b>  <br>
                          <select name="store_product_name" >
                          
                        

                      
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
                      <input type="text" name="store_product_quantity" required value="<?php echo $store_product_quantity1?>"> <br><br>
                      
                      
                      
                      <b>Product Entry Date:</b> <br>                   
                    <input type="DATE" name="store_product_entrydate" required value="<?php echo $store_product_entrydate1?>"> <br> <br>
                       
                       
                       
                        <input type="text" name="store_product_id" required value="<?php echo $store_product_id1?>" hidden> <br> <br>
                        <input type="submit" value="ADD pRODUCT" name="submit">



    </form>
    
</body>
</html>