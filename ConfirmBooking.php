<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<!--

Template 2093 Flight

http://www.tooplate.com/view/2093-flight

-->
    	<title>Confirm Booking</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="apple-touch-icon.png">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/fontAwesome.css">
        <link rel="stylesheet" href="css/hero-slider.css">
        <link rel="stylesheet" href="css/owl-carousel.css">
        <link rel="stylesheet" href="css/tooplate-style.css">

        <link href="https://fonts.googleapis.com/css?family=Spectral:200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">

        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
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
            $passenger_count = $row[0]['no_passenger'];
        }else{
            $passenger_count = 0;
        }
        
    }
    if(isset($_POST['journey_details'])){ 
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
            $id = $_POST['passengers'];
            $passenger_name = $_POST['passenger_name'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $seating = $_POST['seating'];
            $food_type = $_POST['food_type'];
            for($p= 0 ;$p<$passengers_count;$p++){
                date_default_timezone_set('Asia/Kolkata');
                $date =  date('d-m-Y h:i:s');
                // $cust_id = $_SESSION['sess_id']; 
                $status = 'A'; 
                $query="INSERT INTO `journey_details`(`bookings_id`, `passenger_name`, `gender`, `age`,`seat_prefrence`, `food_prefrence`, `status`) VALUES
                 (:bookings_id,:passenger_name, :gender ,:age ,:seat_prefrence,:food_prefrence,:status)";
                $stmt = $db_con->prepare($query);
                $stmt->bindValue(':bookings_id', $bookings_id); 
                $stmt->bindValue(':passenger_name', $passenger_name[$p]??''); 
                $stmt->bindValue(':gender', $gender[$p]??'');
                $stmt->bindValue(':age', $age[$p]??'');
                $stmt->bindValue(':seat_prefrence', $seating[$p]??''); 
                $stmt->bindValue(':food_prefrence', $food_type[$p]??'');  
                $stmt->bindValue(':status', $status);   
                $stmt->execute();					
                // $stmt->debugDumpParams();  
                // $id = $db_con->lastInsertId();
                $count = $stmt->rowCount();
                if ($count > 0){  
                    echo " <script>window.location.href = 'Flights.php?Booking_ID=".$bookings_id."';</script>"; 
                }else{
                    ?> 
                        <script>alert('Seems like you are not logged in, try again after login');</script>
                    <?php
                }   
            } 
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
                        <h4>Enter Jouney<em> Details</em></h4>
                        <form id="form-submit" action="" method="POST">
                            <input type="hidden" name="passengers" value="<?= $passenger_count; ?>">
                                <?php
                                for($i=0;$i<$passenger_count;$i++){
                                    // echo $i;
                                ?>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <fieldset>
                                                <label for="departure">Passenger Name:</label>
                                                <input name="passenger_name[]" type="text" class="form-control " id="deparure" placeholder="Enter Name" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="departure">Age</label>
                                                <input name="age[]" type="text" class="form-control " id="deparure" placeholder="Enter Name" required="">
                                            </fieldset>
                                        </div>
                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="return">Gender:</label> 
                                                <select name='gender[]'>
                                                    <option value="">Select Gender</option> 
                                                    <option value="MALE">MALE</option>
                                                    <option value="FEMALE">FEMALE</option>
                                                    <option value="OTHER">OTHER</option> 
                                                </select>
                                            </fieldset>
                                        </div>
                                        
                                        <div class="col-md-3">
                                            <fieldset>
                                                <label for="return">Seat Prefrence:</label> 
                                                <select name='seating[]'>
                                                    <option value="">Select Seating Type</option> 
                                                    <option value="First Class">First Class</option>
                                                    <option value="Business Class">Business Class</option>
                                                    <option value="Economy Class">Economy Class</option>  
                                                </select>
                                            </fieldset>
                                        </div> 
                                        <div class="col-md-2">
                                            <fieldset>
                                                <label for="return">Food Type</label>
                                                <select name='food_type[]'>
                                                    <option value="">Select type of food</option>
                                                    <option value="VEG">VEG</option>
                                                    <option value="NON-VEG">NON-VEG</option>
                                                    <option value="ANY">ANY</option> 
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-4">
                                    </div>
                                    <div class="col-md-4">
                                        <fieldset>
                                            <button type="submit" id="form-submit" class="btn" name="journey_details">CONTINUE</button>
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



     

    <!-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="primary-button">
                        <a href="#" class="scroll-top">Back To Top</a>
                    </div>
                </div>
                <div class="col-md-12">
                    <ul class="social-icons">
                        <li><a href="https://www.facebook.com/tooplate"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-12">
                    <p>Copyright &copy; 2018 Flight Tour and Travel Company
                
                | Design: <a href="http://www.tooplate.com/view/2093-flight" target="_parent"><em>Flight</em></a></p>
                </div>
            </div>
        </div>
    </footer> -->


    


    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')</script>

    <script src="js/vendor/bootstrap.min.js"></script>

    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

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
    </script>
</body>
</html>