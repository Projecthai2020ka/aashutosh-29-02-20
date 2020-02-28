<?php
	session_start();
    require_once('php/test.php');
	require_once('php/component.php');
    
    if(isset($_POST['remove'])){
        if($_GET['action']=='remove'){
            foreach($_SESSION['cart'] as $key=>$value){
                if($value["product_id"]==$_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                    echo "<script>alert('product has been removed...!')</script>";
                    echo "<script>window.location = 'cart.php'</script>";
                }
            }
        }
    }


	if(isset($_POST['add'])){
		print_r($_POST['product_id']);
		
		if(isset($_SESSION['cart'])){
			
			
			$item_array_id=array_column($_SESSION['cart'],	 "product_id");
			
			if(in_array($_POST['product_id'],$item_array_id)){
				echo " <script> alert('product is already added') </script> ";
				echo " <script> window.location='index.php' </script> " ;
			}else{
				$count=count($_SESSION['cart']);
				$item_array=array(
					'product_id' => $_POST['product_id']
				);

				$_SESSION['cart'][$count]=$item_array;
				//print_r($_SESSION['cart']); 
			}
		
		}

		else{
			
			$item_array=array(
				'product_id' => $_POST['product_id']
			);
	
		 
			$_SESSION['cart'][0]=$item_array;
			print_r($_SESSION['cart']);
	
	}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cart</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/js/all.min.js" integrity="sha256-MAgcygDRahs+F/Nk5Vz387whB4kSK9NXlDN3w58LLq0=" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" href="style.css">
	
	
</head>


<body class="bg-light">
    <?php
        require_once('php/header.php');
    ?>
    
    <div class="container-fluid">
        <div class="row px-5">
            <div class="col-md-7">
                <div class="shopping-cart">
                    <h6>My Cart</h6>
                    <hr>

                    <?php
                        $total=0;
                        if(isset($_SESSION['cart'])){
                            
                            $product_id=array_column($_SESSION['cart'],'product_id');

                            $result = mysqli_query($db, "select * from products;");

                            while ($row = mysqli_fetch_assoc($result)) 
                                    {
                                    foreach($product_id as $id)
                                    {
                                        if($row['id']==$id)
                                        {
                                            cartElement($row['product_name'],$row['product_price'],$row['product_image'],$row['id']);   
                                            $total=$total + (int)$row['product_price'];
                                        }
                                    }

                                    }

                        }else{
                            echo "<h5>cart is empty</h5>";
                        }
                        
                        ?>
                </div>
            </div>
            <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">

            <div class="pt-4">
                <h6>Price Details</h6>
                <hr>
                <div class="row price-details">
                    <div class="col-md-6">
                        <?php
                            if(isset($_SESSION['cart'])){
                                $count=count($_SESSION['cart']);
                                echo "<h6>Price($count items)</h6>";
                            }else{
                                echo "<h6>Price(0 items)</h6>";
                            
                            }
                        ?>
                        <h6>Delivery Charges</h6>
                        <hr>
                        <h6>Amount Payable</h6>
                    
                    </div>
                    <div class="col-md-6">

                    <h6>
                    &#8377 <?php
                                echo $total;
                            ?>

                    </h6>
                    <h6 class="text-success">FREE</h6>
                    <hr>
                    <h6>
                    &#8377 <?php
                                echo $total;
                            ?>

                    </h6>                  
                </div>
                </div> <!--row-->
            </div><!--class pt4-->
           </div><!--class colmd5-->
       </div>
    </div>


<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
</body>
</html>