<?php





                                        $len  = 6;
                                        $uid = '';
                                        $val = '0123456789abcdeffhijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                        while(0<$len--)
                                        {
                                          $uid .= $val[random_int(0,strlen($val) - 1 )];
                                        }
                                        echo "$uid";


                                            include 'ConnectionProvider.php';
                                            $id=$_GET['id'];
                                            $Email = '$id' ;
                                            //  echo "$id";
                                            // echo "$Email";




                                           
                                            
                                            // $qry= "select * from fdonation where Email=$id";
                                            // $qry = "UPDATE `fdonation`
                                            //  SET Status_ = 'Accepted'    where Email= '$_GET[id]';";

                                            $qry = "UPDATE vendors SET _Status = 'Accepted'  WHERE vid = '$id' ";

                                            $result=mysqli_query($con,$qry);

                                            $qry1 = "UPDATE vendors SET password = '$uid'  WHERE vid = '$id' ";

                                            $result=mysqli_query($con,$qry);
                                            $result1=mysqli_query($con,$qry1);
                                            

                                            $sql = "SELECT *  FROM vendors Where vid = '$id'";
                                            $result1 = mysqli_query($con,$sql);
                                            $output1 = mysqli_fetch_array($result1);
                                            $email =  $output1['Email'];
                                            $photo = $output1['image'];
                                            $company = $output1['Company_name'];
                                            echo  "$company";
                                            $qr = "INSERT INTO valid_v(`company_name`,`email`,`image`,`password/vendor_id`) VALUES('$company', '$email', '$photo', '$uid')";
                                            $result5=mysqli_query($con,$qr);
                                            
                                            if(!$result5)
    
    {
         die("Could not connect to -> ".mysqli_connect_error());
        
     
    }


                                            if(!$result)
    
    {
         die("Could not connect to the database due to the following error --> ".mysqli_connect_error());
        
     
    }

    $rcv_email = $output1['Email']; 
    
    echo "$rcv_email";
    $subject = "Donation Notification";
    $body = "This Email is sent from Ferdous's  website.Your donation is accepted. Thank You for your contribution.Your unique id is $uid";
    $headers = "From: ferdousarafathchowdhury@gmail.com";
    if(mail($rcv_email ,$subject,$body,$headers))
    {
      echo "<script> alert('Email is sent successfully');
   
      </script>";

    }
    else
    {
     echo "<script> alert('Not sent');
   
        </script>";

    }


    // if ($con->query($qry) === TRUE) {
    //     echo "Record updated successfully";
    //   } else {
    //     echo "Error updating record: " . $con->error;
    //   }



?>

