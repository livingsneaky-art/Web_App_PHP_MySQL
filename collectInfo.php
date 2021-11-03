<?php
    
    
        $conn = new mysqli('localhost', 'root','');
        $select = $conn->select_db('catering_booking');
        if(!$select)
        {
            $conn->query("CREATE DATABASE catering_booking");

            $conn->select_db('catering_booking');
            $conn->query("CREATE TABLE  customers_detail_table(
                customer_id int(10) AUTO_INCREMENT,                
                firstname varchar(100),
                middlename varchar(100),
                lastname varchar(100),
                contactNumber varchar(100),
                Daddress varchar(100),
                package varchar(100),
                email varchar(50),
                user_type ENUM('Admin', 'Customer'),
                PRIMARY KEY(customer_id)
            )");
           

            /*

            $conn->query("CREATE TABLE events_table(
                event_id int(10) AUTO_INCREMENT,
                name varchar(50),
                image varchar(50),
                PRIMARY KEY(event_id)
                )");

             $conn->query("CREATE TABLE package_supplies(
                supply_id int(10) AUTO_INCREMENT,
                packagetype varchar(50),
                quantity varchar(50),
                cost varchar(50),
                delivery_date varchar(50),
                PRIMARY KEY(supply_id)
            )");

            $conn->query("CREATE TABLE bookings_table(
                booking_id int(10) AUTO_INCREMENT,
                customer_id INTEGER,
                event_id INTEGER,
                FOREIGN KEY(customer_id) REFERENCES customers_detail_table(customer_id),
                FOREIGN KEY(event_id) REFERENCES events_table(event_id),
                PRIMARY KEY(booking_id)               
            )");        




             $conn->query("INSERT INTO `customers_detail_table`(`user_id`, `username`, `password`, `name`, `email`, `user_type`)
             VALUES ('1', 'livingsneaky', 'livingsneaky', 'ryan', 'ryan@gmail.com', 'Admin')");
             */
        }  
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Princess+Sofia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="css.css">
    <title>Book Order</title>
    <style>
        
    </style>
</head>
<body>
       
    <center>
    
    <form class="border border-success " action='' method='POST'>
    <section id="s1_headerBookOrder" style="padding-top: 200px;">
            <aside class="container">
           
            <h3 class="text-white">Book Order</h3> <br>
                <div class="container py-5 myGrid" >
                    <div calss="card mx-2" >
                    <div class="card-body mySubGrid">
                        <label class="text-white">First Name </label><input type='text' name='firstname'/><br>
                        <label style="padding-top: 10px;" class="text-white">Contact Number </label><input type='text' name='contactNumber'/><br>
                    </div>     
                    </div>

                    <div calss="card mx-2" >
                    <div class="card-body mySubGrid">    
                        <label style="padding-top: 10px;" class="text-white">Middle Name </label><input type='text' name='middlename'/><br>         
                        <label class="text-white">Email </label><input type='text' name='email'/><br>
                    </div>
                    </div>

                    <div calss="card mx-2" >
                    <div class="card-body mySubGrid">         
                        <label class="text-white">Last Name </label><input type='text' name='lastname'/><br>      
                        <label style="padding-top: 10px;" class="text-white">Addresss </label><input type='text' name='Daddress'/><br>
                        <label style="padding-top: 10px;" class="text-white">Package Type </label><input type='text' name='package'/><br>
                    </div>
                    </div>     
                </div>    

                    <div style="padding-left: 5px;" >
                      <input  type='submit' name='register' value='Register' /><br><br>            
                    </div>   
                    
          
            </aside>
    </section>
    </form>

<?php 
     if(isset($_POST['register']))
     {

        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $lastname = $_POST['lastname'];
        $contactNumber = $_POST['contactNumber'];
        $Daddress = $_POST['Daddress'];
        $package = $_POST['package'];
        $email = $_POST['email'];
        $defaultType = 2;
        
   
        $prepare = $conn->prepare("INSERT INTO customers_detail_table (customer_id, firstname, middlename, lastname, contactNumber, Daddress, package, email, user_type) VALUES('',?,?,?,?,?,?,?,?)");
        $prepare->bind_param('sssssssi', $firstname,$middlename,$lastname,$contactNumber,$Daddress,$package,$email,$defaultType);
        $prepare->execute();
     } 
    
?>
 <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    
</body>
</html>