<?php
session_start();
?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <style>

        .container 
        {
          
            
        }
       header 
       {
        display:flex;
        border:4px solid black;
        background-color: blanchedalmond;
        flex-direction: row;
      
        height: 200px;
       }
       .invoice 
       {
         margin-left: 45%;
       }

       #inv 
       {
        font-weight: bolder;
        font-size: 33px;
       }
       h3 
       {
        font-weight: bolder;
        font-size: 40px;
       }
       p 
       {
        font-weight: bolder;
        font-size: 15px;
       }
       table 
       {
       
        
      
        border-collapse: collapse;
        width: 62%
        
       }

       td 
       {
              margin-right: 10px;
              border: 1px solid black;
              padding: 9px;
              background-color: burlywood;
       }
       
       th
       {
        border: 1px solid black;
        padding: 20px;
        background-color: blanchedalmond;
       }
       .cash 
       {
        background-color:#a9e7e4f9;
        border: 2px solid black;
        width: 282px;
        font-weight: bolder;
        font-size: 24px;
         color: red;
         max-height: fit-content;
       }

       /* img 
       {
        display: block;
       margin-left: auto;
        margin-right: auto;
       } */

       .order-sum 
       {
        display: flex;
        justify-content: space-between;
        
       }

       .payable 
       {
        
        text-align: center;
        width: 200px;
        /* margin: auto; */
        /* margin-top: 20px; */
        font-size: 18px;
        margin-left: 77.25%;
        border: 1px solid black; 
        font-weight: bolder;
         font-size: 16px;
         background-color:#a9e7e4f9;;
       }
       
    </style>
    <div class="container">
    
   <section>

   
    <header>
 
        <div class="weblogo">
        <!-- <img src="logo.png" alt="" height="60px" width="60px"> -->
            <h3>shopMe: A Multivendor Website</h3>
            
        </div>
    
        <div class="invoice">
            <p id = "inv"><strong>Invoice</strong></p>
             <p id = "inv">Date:<?php  echo date("d/m/Y")?> </p>
        </div>
    </header>
   <div class="customer">
    <h3>Bill To</h3>

    <p>Customer Name: <?php  echo $_SESSION['username']?> </p>
      <p>Cutomer Address: <?php echo $_SESSION['address'] ?> </p>

      <p>Mobile No: <?php echo $_SESSION['mobile'] ?> </p>
      <!-- <p>Mobile No: <?php $i = 0;  echo  $_SESSION['qnt'.$i]?>  </p>
      <p>Price: <?php $j = 0;  echo  $_SESSION['price'.$j]?>  </p>
      

      <p> Amount : <?php echo  $_SESSION['amount']?></p>

      <p> Total : <?php echo     $_SESSION['total']?></p>

      <p>Total Carted Products: <?php echo $_SESSION['n_of_product']?>  </p>
    -->

    <!-- <table>

    <thead>

        
    </thead>
        <tr> 
 
        <th>Customer Name</th>
        <th>Mobile No</th>
        <th>Addtress</th>

                   
    </tr>
    
       <tbody>
          <tr>
        <td> <?php  echo $_SESSION['username']?></td>
        <td><?php  echo $_SESSION['address']?></td>
        <td><?php  echo $_SESSION['mobile']?></td>
         </tr>

        
       </tbody>

      

       

         
    </table> -->
    <h3>Order Summery</h3>
    
    <button onclick="window.print()">Print this page</button>
 
<div class="order-sum">


   
     
    <table id = "sum">

<thead>

    
</thead>
    <tr id = "sum"> 

    <th>Product Name</th>
    <th>Quantity</th>
    <th>Unit Price</th>
    <th> Subtotal </th> 
    

               
</tr>
    
   <tbody id = "sum">
    <?php
    $last = $_SESSION['n_of_product'];
    // $tot = 0;
    ?>
   <?php for($m = 0,$k = $last; $m<$_SESSION['n_of_product'] ;$m++,$k--)
   {

    $tot = 0;
  ?> 
      <tr>
      <td><?php  echo  $_SESSION['nm'.$m] ?></td>
    <!-- <td><?php  echo $_SESSION['address']?></td> -->
    <td><?php  echo $_SESSION['qnt'.$m];   $_SESSION['quantity'.$m] = $_SESSION['qnt'.$m]  ?></td>
    <td><?php  echo  $_SESSION['price'.$m]; $_SESSION['prc'.$m] = $_SESSION['price'.$m]?></td>
    <!-- <td><?php  echo $_SESSION['mobile']?></td> -->
    
    <!-- <td><?php  echo   $_SESSION['nm'.$k-1] ?></td> -->
    <!-- <td><?php  echo  $_SESSION['price'.$m]?></td> -->

    <td> 



    <?php
          
    $tot += ($_SESSION['qnt'.$m] * $_SESSION['price'.$m]);

    echo $tot ;

    ?>
        </td>
   

     </tr>

    <?php 
   }
   ?> 
   </tbody>
</table>

<div class="cash">


<?php
$tot = 0;
for($m = 0; $m<$last;$m++)
{
    // $amount[$m] = $tot += ($_SESSION['qnt'.$m] * $_SESSION['price'.$m]);
    $tot += ($_SESSION['qnt'.$m] * $_SESSION['price'.$m]);
    ?>
        
       <!-- Purchased Amount <?php echo  $tot ?>   -->
<?php
}
       ?>
        Purchased Amount <?php echo  $tot ?>  
       <br>
              Shipping Cost <span style = "margin-left: 16%;" > 100</span> <br>
       <?



?> 


</div>

<

</div>
</section>
    </div>

    <div class  = "payable">
        Total Payable  <?php echo $tot+100  ?>  টাকা
    </div>
</body>
</html>