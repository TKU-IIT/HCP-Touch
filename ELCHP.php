<div class="abcd" style='position:fixed; left:0px; top:0px;background-image: url(CHP-CH-EL.bmp);' >
      <div style="position:fixed; left:8px; top:1px;">

      	     <form action="index.php">
      <input type="submit" value="" style="background-image:url(home.bmp);width:32px;height:32px;">
</form>
      </div></div>
	  <script>
 setInterval(updateTime, 1000); 

 function updateTime(){
	var date = new Date();
	var date2 = date.getDate();

	var year = date.getFullYear();
	var month = String(date.getMonth()+1);
	var day = date.getDay();
	var hour = date.getHours();
	var minutes = date.getMinutes();
	var secondes = date.getSeconds();
	
	var str = year + "-" +month + "-"+ date2 + " | " + hour + ":" + minutes + ":" + secondes;
	document.getElementById("f1").innerHTML = str;
	
	

} 

</script><strong><div style="position:fixed; left:50px;top:-30px;"><font face="arial" size="6"><p id="f1" style="color:white;""></p></font></div></strong><p id="f2"></p>

	  <style type="text/css">

.abcd
 {
  width: 480px;
  height: 320px;
}

input[type="button"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="submit"]
{

    display:block;
    border: none;
    outline:none;
}
input[type="text"]
{

    display:block;
    border: none;
    outline:none;
}
</style>
 <?php 

$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";
$conn = new mysqli($servername, $username, $password, $dbname1);
$conn1 = new mysqli($servername, $username, $password, $dbname2);


$rowSQL4 = mysqli_query($conn,"SELECT * FROM current ;");
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$row = mysqli_fetch_array( $rowSQL );

$largestNumber = $row['max'];
$rowSQL5 = mysqli_query($conn,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row4= mysqli_fetch_array($rowSQL4);
$row5= mysqli_fetch_array($rowSQL5);
$current = $row4['current'];
$gain = $current*12;
$cn = $row5['cardnumber'];
$rowSQL2 = mysqli_query($conn1,"SELECT * FROM card_info WHERE cardnumber ='" . $cn . "';");
$row2= mysqli_fetch_array($rowSQL2);

$cardbalance = $row2['cardbalance'];

$duration = $row2['duration'];
$voltage = $row4['voltage'];
// Check connection


mysqli_query($conn1,"UPDATE card_info SET voltage=" . $voltage . " WHERE cardnumber ='" . $cn . "';");
mysqli_query($conn1,"UPDATE card_info SET cardbalance=" . floatval($row2['cardbalance']+$gain) . " WHERE cardnumber ='" . $cn . "';");





echo ' <div style="position:fixed; left:203px;top:119px;">'
. $cardbalance . 
'</div>';
echo ' <div style="position:fixed; left:203px;top:149px;">'
. $gain . 
'</div>';
echo ' <div style="position:fixed; left:203px;top:179px;">'
. $current . 
'</div>';
echo ' <div style="position:fixed; left:203px;top:209px;">'
. $voltage . 
'</div>';
echo ' <div style="position:fixed; left:203px;top:239px;">'
. '

<label style="position:fixed; left:203px;top:239px;" id="hours">00</label><label style="position:fixed; left:253px;top:239px;" id="minutes">00</label><label style="position:fixed; left:303px;top:239px;" id="seconds">00</label>
    <script type="text/javascript">
    	var hoursLabel = document.getElementById("hours");
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            hoursLabel.innerHTML =pad(parseInt(totalSeconds/60/60));
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60%60));
        }

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
    </script>
' . 
'</div>';
 ?>



