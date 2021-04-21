<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    	<title>Payment Details</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <link rel="stylesheet" href="css/datepicker.css">
        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
        <style>
            .cc {
                display: inline-block;
                margin: 5px;
                width: 50px; 
            }
            .marg{
                margin:2% 0px;
            }
            .flight_name{
                font-size:24px; 
            }
            .flight_price{
                font-size:28px; 
                color:green;
            }
            .img-air{
                width: 40px!important;
                padding: 10% 0 !important;
                margin: 0% 0 !important;
            }
        </style>
    </head>

<body>
    <?php
    include('connection.php');
    session_start();
    $db_con = getDB();
    if(isset($_GET['Booking_ID'])){
        $id = $_GET['Booking_ID'];
        $query = "SELECT b.id as 'booking_id',b.cust_id as 'Cust_id', b.no_passenger, (select type from destinations where id = b.from_dest_id) as 'from', (select type from destinations where id = b.to_dest_id) as 'to' , b.on_date, b.till_date FROM bookings b inner JOIN user_details ud on ud.id = b.cust_id where b.id  = :id";
        $stmt = $db_con->prepare($query);
        $stmt->bindValue(':id', $id); 
        $stmt->execute();								
        // $stmt->debugDumpParams(); 
        //get count
        $count = $stmt->rowCount();
        //all values in array $row 
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($count > 0){
            $from = $row[0]['from'];
            $to = $row[0]['to'];
            $on_date = $row[0]['on_date'];
            $till_date  = $row[0]['till_date'];
            $no_passenger = $row[0]['no_passenger'];
            $customer_id = $row[0]['Cust_id'];
        }  
    }
    if(isset($_POST['payment_details'])){ 
        // print_r($_POST);
        if(!isset($_SESSION['sess_name']) || empty($_SESSION['sess_name']))
        { 
            ?> 
                <script>
                    alert('Please login to continue...');
                    window.location.href =  'index.php';
                </script>
            <?php
        }else{
            $bookings_id = $_GET['Booking_ID']; 
            $flight = $_POST['flight']; 
                date_default_timezone_set('Asia/Kolkata');
                $date =  date('d-m-Y h:i:s');
                // $cust_id = $_SESSION['sess_id']; 
                $status = 'A'; 
                $query="UPDATE `bookings` SET  `flight`= :flight  WHERE id= :bookings_id";
                $stmt = $db_con->prepare($query);
                $stmt->bindValue(':flight', $flight);   
                $stmt->bindValue(':bookings_id', $bookings_id); 
                $stmt->execute();		 
                $count = $stmt->rowCount();
                if ($count > 0){  
                    echo " <script>window.location.href = 'Payments.php?Booking_ID=".$bookings_id."';</script>"; 
                }else{
                    ?> 
                        <script>alert('Seems like you are not logged in, try again after login');</script>
                    <?php
                }   
            // } 
        }
    } 
    ?>
    <section class="page-heading" id="top">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="logo">
                        <img src="img/logo.png" alt="Flight Template">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-direction-button">
                        <a href="#"><i class="fa fa-home"></i>Wandered</a>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <section class="contact-us">
        <div class="container"> 
            <div class="col-md-12">
                <br><br><br>
                    <div class="submit-form">
                        <h4>Journey<em> Details</em></h4>
                        <form id="form-submit" action="" method="POST">  
                            <input type="hidden" value="<?= $customer_id; ?>" name="Cust_id">
                                    <div class="row">
                                        <div class="col-md-6 left" style="background-color:#ffe165;">
                                             <div class="card">
                                                <div class="row">
                                                    <div class="col-md-12"> 
                                                        <fieldset>
                                                            <label for="from">From :</label>
                                                            <input type="text" class="form-control " value="<?php echo $from; ?>" readonly>
                                                        </fieldset>
                                                    </div> 
                                                    <div class="col-md-12"> 
                                                        <fieldset>
                                                            <label for="from">To :</label>
                                                            <input type="text" class="form-control " value="<?php echo $till_date; ?>" readonly>
                                                        </fieldset> 
                                                    </div>
                                                </div> 
                                                 <div class="row">
                                                    <div class="col-md-6">
                                                        <fieldset>
                                                            <label for="from">Depaturn On :</label>
                                                            <input type="text" class="form-control " value="<?php echo $on_date; ?>" readonly>
                                                        </fieldset>    
                                                    </div>
                                                        
                                                    <div class="col-md-6"> 
                                                        <fieldset>
                                                            <label for="from">Rertun On :</label>
                                                            <input type="text" class="form-control " value="<?php echo $till_date; ?>" readonly>
                                                        </fieldset>    
                                                    </div>
                                                    
                                                    <div class="col-md-12"> 
                                                        <fieldset>
                                                            <label for="from">No Of Passengers :</label>
                                                            <input type="text" class="form-control " value="<?php echo $no_passenger; ?>" readonly>
                                                        </fieldset> 
                                                    </div> 
                                                    <div class="col-md-12">
                                                        <br>
                                                    </div>
                                                </div>
                                                
                                                
                                                 
                                             </div>
                                        </div>
                                        <div class="col-md-6 right">
                                             <div class="row">
                                                 <div class="col-md-2">
                                                 <input name="flight" type="radio" class="form-control "  value= "Air India" required="">
                                                 </div>
                                                 <div class="col-md-2">
                                                    <img class="img-air"src="img/airIndia.png">
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                       <span class="flight_name "> Air India</span>
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                        <span class="flight_price "> Rs. <?php echo date('s')*99; ?></span>
                                                 </div>
                                             </div> 
                                             <div class="row">
                                                 <div class="col-md-2">
                                                 <input name="flight" type="radio" class="form-control " value= "Air Canada" required="">
                                                 </div>
                                                 <div class="col-md-2">
                                                    <img class="img-air"src="img/airCanada.png">
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                       <span class="flight_name "> Air Canada</span>
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                        <span class="flight_price "> Rs. <?php echo date('s')*199; ?></span>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-2">
                                                 <input name="flight" type="radio" class="form-control " value= "Emirates" required="">
                                                 </div>
                                                 <div class="col-md-2">
                                                    <img class="img-air"src="img/emirates.png">
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                       <span class="flight_name "> Emirates</span>
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                        <span class="flight_price "> Rs. <?php echo date('s')*299; ?></span>
                                                 </div>
                                             </div>
                                             <div class="row">
                                                 <div class="col-md-2">
                                                 <input name="flight" type="radio" class="form-control " value= "Lufthansa" required="">
                                                 </div>
                                                 <div class="col-md-2">
                                                    <img class="img-air"src="img/lufthansa.png">
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                       <span class="flight_name "> Lufthansa</span>
                                                 </div>
                                                 <div class="col-md-4 marg">
                                                        <span class="flight_price "> Rs. <?php echo date('s')*399; ?></span>
                                                 </div>
                                             </div>
                                        </div>  
                                    </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn" name="payment_details">CONFIRM</button>
                                        </fieldset>
                                    </div>
                                    <div class="col-md-4">
                                    </div>
                                </div>
                            </div>
                        </form>
                    <br><br><br>
                    </div>
                </div>
            
            </div>
    </section> 
    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/datepicker.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        // navigation click actions 
        $('.scroll-link').on('click', function(event){
            event.preventDefault();
            var sectionID = $(this).attr("data-id");
            scrollToID('#' + sectionID, 750);
        });
        // scroll to top action
        $('.scroll-top').on('click', function(event) {
            event.preventDefault();
            $('html, body').animate({scrollTop:0}, 'slow');         
        });
        // mobile nav toggle
        $('#nav-toggle').on('click', function (event) {
            event.preventDefault();
            $('#main-nav').toggleClass("open");
        });
    });
    // scroll function
    function scrollToID(id, speed){
        var offSet = 0;
        var targetOffset = $(id).offset().top - offSet;
        var mainNav = $('#main-nav');
        $('html,body').animate({scrollTop:targetOffset}, speed);
        if (mainNav.hasClass("open")) {
            mainNav.css("height", "1px").removeClass("in").addClass("collapse");
            mainNav.removeClass("open");
        }
    }
    if (typeof console === "undefined") {
        console = {
            log: function() { }
        };
    }
    function checkCCNo(id){
        // console.log("ok");
        var cardimg;
        var source = document.getElementById(id);
        switch (source.value.substring(0,1)){
            case "4":   
                cardimg = document.getElementById("visa");
                break;
            case "5":
                cardimg = document.getElementById("mc");
                break;
        }
        if(cardimg) {
            cardimg.style.borderStyle = "solid";
            cardimg.style.borderColor = "red";
            cardimg.style.borderWidth = "2px";            
        }
    }
    </script>
</body>
</html>