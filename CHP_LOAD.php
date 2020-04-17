<?php

$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";

// Create connection
$conn = new mysqli($servername, $username, $password, "rfid_arduino");
$conn2 = new mysqli($servername, $username, $password, "rfid_arduino");
$conn1 = new mysqli($servername, $username, $password, "rfid_rpi");
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$rowSQL8 = mysqli_query($conn2, "SELECT MAX( id ) AS max FROM `current`;" );
$row = mysqli_fetch_array( $rowSQL );
$row8 = mysqli_fetch_array($rowSQL8);
$largestNumber = $row['max'];
$largestNumber2 = $row8['max'];
//max
$rowSQL1 = mysqli_query($conn,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row1 = mysqli_fetch_array( $rowSQL1 );
$cn = $row1['cardnumber'];
//cardnumber
$rowSQL2 = mysqli_query($conn1,"SELECT * FROM card_info WHERE cardnumber=". '"' . $cn . '"' . ";");
$row2= mysqli_fetch_array($rowSQL2);
$rowSQL3 = mysqli_query($conn,"SELECT * FROM current WHERE id=" . $largestNumber2 . ";");
$row3= mysqli_fetch_array($rowSQL3);
$dt = $row2['duration_time'];
$ct = $row2['cardtype'];
$cb = $row2['cardbalance'];
$rd = $row2['REGISTERED_DATE'];
$current = $row3['current'];
$gain = $row2['gain'];
$vol = 5;
session_start();
$time = $_SESSION['time'];
$_SESSION = array();
session_destroy();
$gain = $gain+ $current*5/3600;
$cb = $gain + $cb;
session_start();
 $_SESSION['cardtype'] = $ct;
 $_SESSION['cardbalance'] = $cb;
 $_SESSION['REGISTERED_DATE'] = $rd;
 $_SESSION['cardnumber'] = $cn;
$_SESSION['vol'] = $vol;
$_SESSION['gain'] = $gain;
$_SESSION['current'] = $current;
$_SESSION['duration_time']= $dt;
if($ct=="CYCHP"){
echo '<div id="b" style="position:fixed; left:220px; top:15px; width:403px; height:79px; background-image: url(\'CY.bmp\');" />';
}
elseif($ct=="ELCHP"){
echo '<div id="b" style="position:fixed; left:220px; top:15px; width:403px; height:79px; background-image: url(\'EL.bmp\');" />';


}
echo "<div id='a' style='position:fixed; left:320px; top:411px;' ><font color='white' face='arial'size='6'>";
echo $cn;
echo "</font></div>";
echo "<div id='a' style='position:fixed; left:320px; top:111px;' ><font color='white' face='arial'size='6'>";
echo $cb;
echo "</font></div>";
echo "<div id='a' style='position:fixed; left:320px; top:368px;' ><font color='white' face='arial'size='6'>";
echo $rd;
echo "</font></div>";
  echo "<div id='a' style='position:fixed; left:320px; top:197px;' ><font color='white' face='arial'size='6'>";
echo $current;

echo "</font></div>";
  echo "<div id='a' style='position:fixed; left:320px; top:240px;' ><font color='white' face='arial'size='6'>";
echo $vol;
echo "</font></div>";


?>



   <script>

            totalSeconds++;
       	var hoursLabel = document.getElementById("hours");
           var minutesLabel = document.getElementById("minutes");
           var secondsLabel = document.getElementById("seconds");
           var energyMAH = document.getElementById("energyMAH");
           var current = parseFloat("<?php echo $current; ?>");
           var ob = parseInt("<?php echo $cb; ?>");

   document.getElementById("demo").innerHTML = "<?php $cb = $gain + $cb?>";
               hoursLabel.innerHTML =pad(parseInt(totalSeconds/60/60));
               secondsLabel.innerHTML = pad(totalSeconds%60);
               minutesLabel.innerHTML = pad(parseInt(totalSeconds/60%60));
       function formatFloat(num, pos)
   {
     var size = Math.pow(10, pos);
     return Math.round(num * size) / size;
   }
           energyMAH.innerHTML = formatFloat(pad(current*totalSeconds/3600),2);

           function pad(val)
           {


               var valString = val + "";
               if(valString.length < 2)
               {
                   return "0" + valString;
               }
               else
               {
                   return valString;
               }


           }
           $(document).ready(function(){
           setInterval(function(){
           $("#screen2").load("CHP_UPLOAD.php")
         }, 1000);
           });

       </script>
<div id="screen2" /><div id="screen3" />
<font color='white' face='arial'size='6'><label style="position:fixed; left:340px;top:282px;" id="hours">00</label><label style="position:fixed; left:419px;top:282px;" id="minutes">00</label><label style="position:fixed; left:499px;top:282px;" id="seconds">00</label></font>
    <font color='white' face='arial'size='6'><label style="position:fixed; left:320px;top:325px;" id="energyMAH"></label></font>
     <font color='white' face='arial'size='6'><label style="position:fixed; left:320px;top:154px;" id="gain"><?php echo $gain; ?></label></font>

     <p id="demo"></p>
