<html>
<head>   
<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<style>
    body {
  background: #c5d8e6;
  font-family: helvetica, arial;
  text-transform: uppercase;
  box-sizing: border-box;
}

h1 {
  color: #ccc;
  font-weight: 200;
  font-size: 2.1em;
  margin: 0px;
}

h2 {
  color: #ccc;
  opacity: .5;
  font-weight: 100;
  font-size: .9em;
  margin: 0px;
}

h3 {
  color: #ccc;
  opacity: .8;
  font-weight: 100;
  font-size: .9em;
  margin: 0px;
}

.cards_wrapper {
  text-align: center;
  padding-top: 20px;
}

.card {
  width: 320px;
  border-radius: 20px;
  background: #4d1532;
  display: inline-block;
  margin: 10px;
  box-shadow: 0 3px 10px rgba(0, 0, 0, 0.4);
}
.card img {
  width: 100%;
}
.card .inner {
  position: absolute;
  width: 320px;
  height: 100%;
  z-index: 1;
  opacity: 0.1;
  background-image: url(https://puu.sh/rE78K/33424202f7.svg);
  background-size: 130px;
  background-repeat: repeat-y;
  background-position: 0px 0px;
  background-repeat: repeat-x;
  animation: animatedBackground 40s linear infinite;
}
@keyframes animatedBackground {
  from {
    background-position: 100% -10px;
  }
  to {
    background-position: 0% -10px;
  }
}
.card_logo {
  background: #ffffff;
  border-radius: 20px 20px 0 0;
}
.card_logo img.qatar {
  margin: -50px;
  text-align: center;
  width: 70%;
}
.card_logo img.tigerair {
  margin-top: 10px;
  text-align: center;
  width: 25%;
}
.card_logo img.airasia {
  margin: -10px;
  text-align: center;
  width: 35%;
}
.card_heading h2 {
  padding-top: 20px;
  text-align: center;
}
.card_thumbnail {
  min-height: 150px;
  margin-top: 10px;
}
.card_thumbnail img {
  width: 100%;
  height: auto;
}
.card_trip {
  text-align: center;
  width: 85%;
  margin: 30px auto;
  display: flex;
  height: 72px;
}
.card_trip div {
  display: inline-block;
  height: 100%;
  vertical-align: middle;
}
.card_trip div h1 {
  margin: 0px;
}
.card_trip div h2 {
  margin: 0px;
  letter-spacing: 2px;
}
.card_trip div.trip_from {
  text-align: left;
  width: 35%;
}
.card_trip div.trip_from h2 {
  padding-left: 2px;
}
.card_trip div.trip_icon {
  width: 30%;
}
.card_trip div.trip_icon img {
  padding-top: 20px;
  opacity: 1;
  width: 25px;
}
.card_trip div.trip_to {
  text-align: right;
  width: 35%;
}
.card_trip div.trip_to h2 {
  padding-right: 3px;
}
.card_departure {
  margin: -20px auto 32px;
}
.card_departure div {
  color: #ccc;
}
.card_divider {
  position: relative;
  width: 100%;
}
.card_divider .divider_left {
  left: -15px;
}
.card_divider .divider_hole {
  position: absolute;
  top: -12px;
  padding: 0px;
  height: 25px;
  width: 25px;
  border-radius: 100%;
  background: #c5d8e6;
}
.card_divider .divider {
  width: 85%;
  margin: auto;
  height: 2px;
  background: linear-gradient(to right, #c5d8e6 50%, transparent 50%);
  background-size: 10px 8px, 100% 2px;
  opacity: .2;
}
.card_divider .divider_right {
  right: -15px;
}
.card_flight_details h2 {
  font-size: .7em;
}
.card_flight_details .card_seating {
  width: 85%;
  margin: 30px auto;
  display: flex;
}
.card_flight_details .card_seating div {
  display: inline-block;
  width: 50%;
}
.card_flight_details .card_seating div.seating_passenger {
  text-align: left;
}
.card_flight_details .card_seating div.seating_passenger_dos {
  text-align: left;
  padding-left: 32px;
}
.card_flight_details .card_seating div.seating_seat {
  text-align: right;
}
.card_flight_details .card_details {
  width: 85%;
  margin: 30px auto;
  display: flex;
}
.card_flight_details .card_details div {
  display: inline-block;
  width: 33%;
}
.card_flight_details .card_details div.details_flight {
  text-align: left;
}
.card_flight_details .card_details div.details_date {
  text-align: center;
}
.card_flight_details .card_details div.details_time {
  text-align: right;
}
.card_flight_details .card_details_continued {
  width: 85%;
  margin: 30px auto;
  display: flex;
  padding-bottom: 30px;
}
.card_flight_details .card_details_continued div {
  display: inline-block;
  width: 33%;
}
.card_flight_details .card_details_continued div.details_flight {
  text-align: left;
}
.card_flight_details .card_details_continued div.details_date {
  text-align: center;
}
.card_flight_details .card_details_continued div.details_time {
  text-align: right;
}
.card .card_seating {
  width: 85%;
  margin: 30px auto;
  display: flex;
}
.card .card_seating div {
  display: inline-block;
  width: 50%;
}
.card .card_seating div.seating_passenger {
  text-align: left;
}
.card .card_seating div.seating_passenger_dos {
  text-align: left;
  padding-left: 32px;
}
.card .card_seating div.seating_seat {
  text-align: right;
}
.card .card_details {
  width: 85%;
  margin: 30px auto;
  display: flex;
}
.card .card_details div {
  display: inline-block;
  width: 33%;
}
.card .card_details div.details_flight {
  text-align: left;
}
.card .card_details div.details_date {
  text-align: center;
}
.card .card_details div.details_time {
  text-align: right;
}
.card .card_details_continued {
  width: 85%;
  margin: 30px auto;
  display: flex;
  padding-bottom: 30px;
}
.card .card_details_continued div {
  display: inline-block;
  width: 33%;
}
.card .card_details_continued div.details_flight {
  text-align: left;
}
.card .card_details_continued div.details_date {
  text-align: center;
}
.card .card_details_continued div.details_time {
  text-align: right;
}

.ta-theme {
  background: #b26a07;
}
.ta-theme .card_logo {
  border-top: 5px solid #F69E25;
}

.aa-theme {
  background: #961a14;
}
.aa-theme .card_logo {
  border-top: 5px solid #DA251D;
}

.qr-theme {
  background: #FFE165;
}
.qr-theme .card_logo {
  border-top: 5px solid #FFE165;
}

</style>
</head>
<body>
<?php
    include('connection.php');
    // session_start();
    $db_con = getDB();
    if(isset($_GET['Booking_ID'])){
        $id = $_GET['Booking_ID'];
        $query = "SELECT (select type from destinations where id = b.from_dest_id) as 'from', b.flight, (select type from destinations where id = b.to_dest_id) as 'to' , jd.passenger_name, jd.gender, jd.food_prefrence, jd.seat_prefrence, b.on_date, b.till_date FROM bookings b inner join journey_details jd on jd.bookings_id = b.id inner JOIN payment_details pd on pd.booking_id = b.id inner join user_details ud on ud.id = customer_id WHERE b.id = :id";
        $stmt = $db_con->prepare($query);
        $stmt->bindValue(':id', $id); 
        $stmt->execute();								
        // $stmt->debugDumpParams(); 
        //get count
        $count = $stmt->rowCount();
        //all values in array $row 
        $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // print_r($row);
        // if($count > 0){
        //     $passenger_count = $row[0]['no_passenger'];
        // }else{
        //     $passenger_count = 0;
        // } 
    }
?>
<div class="cards_wrapper" id="boarding_pass">
  <div class="card ta-theme" >
          <div class="card_heading">
            <div class="card_logo">
                <img src="img/globelogo.png" class="tigerair"> <h1>WANDERED<h1>
            </div>
            <img src="img/pen.jpg"/>
            <div class="card_divider">
              <div class="divider_left divider_hole">
              </div>
              <div class="divider">
              </div>
              <div class="divider_right divider_hole">
              </div>
            </div>
            <h2>Boarding Pass <br></h2><h1><?php echo strtoupper($row[0]['flight']); ?></h1>
              
          </div>
          <div class="card_trip">
              <div class="trip_from">
                  <h1><?php echo strtoupper(substr($row[0]['from'], 0, 3)); ?></h1>
                  <h2><?php echo strtoupper($row[0]['from']); ?></h2>
              </div>
              <div class="trip_icon">
                  <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/553328/From.png" />
              </div>
              <div class="trip_to">
                  <h1><?php echo strtoupper(substr($row[0]['to'], 0, 3)); ?></h1>
                  <h2><?php echo strtoupper($row[0]['to']); ?></h2>
              </div>
          </div>
          <div class="card_divider">
              <div class="divider_left divider_hole">
              </div>
              <div class="divider">
              </div>
              <div class="divider_right divider_hole">
              </div>
          </div>
          <?php 
          // echo $count ;
          // echo $row[]['passenger_name'];
          // print_r($row)
          for($p=0;$p<$count;$p++){
            // echo $p;
            ?>
            <div class="card_seating">
              <div class="seating_passenger">
                  <h2>Passenger</h2>
                  <h3><?php echo $row[$p]['passenger_name']; ?></h3>
              </div>
              <div class="seating_passenger_dos">
                  <h2><?php echo $row[$p]['gender']; ?></h2>
                  <h2><?php echo $row[$p]['food_prefrence']; ?></h2>
              </div>
              <div class="seating_seat"> 
                <h2><?= $row[$p]['seat_prefrence']; ?></h2>
              </div>
            </div> 
            <?php
          }
          ?>
        
          <div class="card_details">
              <div class="details_flight">
                  <h2>FROM</h2>
                  <h3><?= strtoupper($row[0]['from'])?></h3>
              </div>
              <div class="details_date">
                  <h2>Depart</h2>
                  <h3><?= $row[0]['on_date']?></h3>
              </div>
              <div class="details_time">
                  <h2>RETURN</h2>
                  <h3><?= $row[0]['till_date']?></h3>
              </div>
          </div>
  </div>
</div>
        <div class="col-md-12 text-center">
         <a href="index.php"> <button type="button" class="btn btn-primary" value="PRINT BORADING PASS">HOME</button>  </a>
        </div>
  </body>
   
 <script>  
  function printDiv(divName) {
             var printContents = document.getElementById(divName).innerHTML;
             var originalContents = document.body.innerHTML;
        
             document.body.innerHTML = printContents;
        
             window.print();
        
             document.body.innerHTML = originalContents;
        }
 // ----- On render -----
$(function() {
  var currentTime = moment().unix(); // Timestamp - Sun, 21 Apr 2013 13:00:00 GMT
  var eventTime = moment('22-04-2017 20:30:00', 'DD-MM-YYYY HH:mm:ss').unix() + 100000; // Timestamp - Sun, 21 Apr 2013 12:30:00 GMT
  var diffTime = (eventTime - currentTime);
  var duration = moment.duration(diffTime * 1000, 'milliseconds');
  var interval = 1000;

  setInterval(function() {
    duration = moment.duration(duration - interval, 'milliseconds');
    var text = '';
    if (duration.days() > 0) {
      var text = text + duration.days() + 'd ';
    } else if (duration.days() == 1) {
      var text = text + '1d';
    }
    text = text + duration.hours() + ":" + duration.minutes() + ":" + duration.seconds();
    $('.countdown').text(text);
  }, interval);

  var myx;
  var myy;
  var oldx;
  var oldy;
  //check for mobile and accerlerometer support
  if (window.DeviceOrientationEvent) {
    //wireup the event
    window.addEventListener('deviceorientation', function(e) {
      
      //grab the accelerometer values
      myx = Math.floor(e.gamma / 3); //exaggerate the effect
      myy = Math.floor(e.beta / 3);
      /*if (oldtarget.x != thetarget.x || oldtarget.y != thetarget.y) {*/
      if (myx != parseInt($('#oldX').text()) || myy != parseInt($('#oldY').text())) {
        sparkle();
      }
        $('#oldX').text(myx)
        $('#oldY').text(myy)
      /*}*/
    }, false);
  }
  sparkle();

  function sparkle() {
    $.each($('.sparkler>.square'), function(i, square) {
      $(square).css('background-color', getColor());
    })
  }
  function generateSparkles() {
    var container = $('.sparkler');
    var i = 0;
    for (i = 0; i < 64; i = i + 1) {
      var spark = $('<div class="square"></div>');
      spark.css('background-color', getColor());
      container.append(spark)
    }
  }
  function getColor() {
    var red = Math.floor(Math.random()*(255-200+1)+200)
    var green = Math.floor(Math.random()*(225-175+1)+175);
    var blue = Math.floor(Math.random()*(55-0+1)+0);
    return 'rgb('+ red + ',' + green +',' + blue + ')';
  }
  generateSparkles();
}); 
  </script>