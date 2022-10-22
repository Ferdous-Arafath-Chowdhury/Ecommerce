<?php
$db = mysqli_connect("localhost","root","","ecommerce");

function getProducts(){
    global $db;
    $get_products= "select * from products order by 1 DESC LIMIT 0,8";
    $run_product= mysqli_query($db,$get_products);

    while($row_product= mysqli_fetch_array($run_product)){
        $product_id = $row_product['product_id'];
        $product_title = $row_product['name'];
        $product_price = $row_product['price'];
        $product_img = $row_product['image'];

        echo"
        <div class='col-lg-3 col-sm-6'>
            <div class='product'>

                <a href='details.php?product_id=$product_id'>
                    <img src='assets/".$product_img."' class='img-res'>
                </a>

                <div class='text'>
                  <h3><a href='details.php?product_id=$product_id'></a>$product_title</h3>
                  <p class='price'>BDT $product_price </p>
                  <p class='buttons'> 
                      <a href='details.php?product_id=$product_id' class='btn btn-secondary'>View Details</a>
                      <a href='cart.php?product_id=$product_id'  class='btn btn-success'><i class='fa fa-shopping-cart'></i>Add to cart</a>
                  </p>
                
               </div>

            </div>

            

        </div>
        ";
    }

}



                
?>