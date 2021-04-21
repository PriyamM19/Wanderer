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
        </style>
    </head>

<body>
    <?php
    include('connection.php');
    session_start();
    $db_con = getDB();
    if(isset($_GET['Booking_ID'])){
        $id = $_GET['Booking_ID'];
        $query = "SELECT * FROM `bookings` WHERE id = :id";
        $stmt = $db_con->prepare($query);
        $stmt->bindValue(':id', $id); 
        $stmt->execute();								
        //$stmt->debugDumpParams(); 
        //get count
        $count = $stmt->rowCount();
        //all values in array $row 
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($count > 0){
            $customer_id = $row[0]['cust_id'];
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
            $passengers_count = $_POST['passengers'];
            // $id = $_POST['passengers'];
            $cvv_code = $_POST['cvv_code'];
            $Cust_id = $_POST['Cust_id'];
            $card_number = $_POST['card_number'];
            $name_card = $_POST['name_card'];
            $expiry_date = $_POST['expiry_date'];
            // for($p= 0 ;$p<$passengers_count;$p++){
                date_default_timezone_set('Asia/Kolkata');
                $date =  date('d-m-Y h:i:s');
                // $cust_id = $_SESSION['sess_id']; 
                $status = 'A'; 
                    $query="INSERT INTO `payment_details`(`booking_id`, `customer_id`, `card_number`, `card_name`, `card_expiry`, `cvv`, `status`) VALUES
                    (:bookings_id, :customer_id, :card_number , :card_name, :card_expiry, :cvv, :status)";
                $stmt = $db_con->prepare($query);
                $stmt->bindValue(':bookings_id', $bookings_id); 
                $stmt->bindValue(':customer_id', $Cust_id??''); 
                $stmt->bindValue(':card_number', $card_number??'');
                $stmt->bindValue(':card_name', $name_card??''); 
                $stmt->bindValue(':card_expiry', $expiry_date??'');  
                $stmt->bindValue(':cvv', $cvv_code??'');  
                $stmt->bindValue(':status', $status);   
                $stmt->execute();					
                // $stmt->debugDumpParams(); 
                // $id =  $db_con->lastInsertId;
                // $id = $db_con->lastInsertId();
                $count = $stmt->rowCount();
                if ($count > 0){  
                    echo " <script>window.location.href = 'BoardingPass.php?Booking_ID=".$bookings_id."';</script>"; 
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
                        <h4>Enter Payment<em> Details</em></h4>
                        <form id="form-submit" action="" method="POST">  
                            <input type="hidden" value="<?= $customer_id; ?>" name="Cust_id">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <fieldset>
                                                <label for="departure">Name on Card</label>
                                                <input name="name_card" type="text" class="form-control " placeholder="Enter Name on Card" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-12">
                                            <fieldset>
                                                <label for="return">Card Number:</label> 
                                                <input name="card_number" type="text" class="form-control "   placeholder="Enter Card Number" required=""> 
                                                <!-- <img style="width: 50px;" class="cc" src="https://i.ya-webdesign.com/images/american-express-card-logo-png-5.png">
                                                <img style="width: 50px;" class="cc" id="visa" src="https://i.ya-webdesign.com/images/visa-logo-png-2.png">
                                                <img style="width: 50px;" class="cc" id="mc"  src="https://brand.mastercard.com/content/dam/mccom/brandcenter/thumbnails/mastercard_vrt_pos_92px_2x.png"> -->
                                              
                                            </fieldset>
                                        </div> 
                                        <div class="col-md-9">
                                            <fieldset>
                                                <label for="return">Expiry Date</label> 
                                                <input name="expiry_date" type="text" class=" form-control date"  placeholder="Select Date of Expiry" required="" >
                                             
                                            </fieldset>
                                        </div> 
                                        <div class="col-md-3">
                                            <fieldset>
                                                <label for="return">CVV Code</label>
                                                <input name="cvv_code" type="password" class="form-control tel" placeholder="Enter CVV code" maxlength = "3" required="" > 
                                            </fieldset>
                                        </div>
                                    </div> 
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn" name="payment_details">COMPLETE</button>
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