

<div class="abcd" style='position:fixed; left:0px; top:0px;background-image: url("CHP-home.bmp");' >
    <?php


$servername = "localhost";
$username = "root";
$password = "jefflin123";

$dbname = "rfid_arduino";

// Create connection

$conn = new mysqli($servername, $username, $password, $dbname);



function getRedirectUrl ($url) {
    stream_context_set_default(array(
        'http' => array(
            'method' => 'HEAD'
        )
    ));
    $headers = get_headers($url, 1);
    if ($headers !== false && isset($headers['Location'])) {
        return $headers['Location'];
    }
    return false;
}
$rowSQL = mysqli_query($conn, "SELECT MAX( id ) AS max FROM `card`;" );
$row = mysqli_fetch_array( $rowSQL );

$largestNumber = $row['max'];
$rowSQL1 = mysqli_query($conn,"SELECT * FROM card WHERE id=" . $largestNumber . ";");
$row1 = mysqli_fetch_array( $rowSQL1 );
$sv = $row1['SENSORED_VALUE'];
$a=0;
$b=1;
if($sv==$b){
	

	//echo '<body background="CHP-EL.bmp">';

echo '<script>window.location.replace("http://localhost/sensored_1.php");</script>';
	//echo "false";
}

?>
<style type="text/css">

.abcd
 {
  width: 800px;
  height: 480px;
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
	
	var str = hour + ":" + minutes ;
	document.getElementById("f1").innerHTML = str;
	
	

}

</script><div id="screen"/><strong><div style="position:fixed; left:708px;top:0px;"><font face="arial" size="6"><p id="f1" style="color:white;""></p></font></div></strong>

<form action="sprache.php">
<div style="position:fixed; left:12px; top:60px;">
      <input type="submit" value=''style="background-image:url(sprache.bmp);width:42px;height:40px;">
      </div></form> 
<form action="wifi.php">
      <div style="position:fixed; left:12px; top:4px;">
      <input type="submit"value='' style="background-image:url(WLAN.bmp);width:65px;height:53px;">
      </div>
      </form>
<p?
ini_set('display_errors', 1);
error_reporting(E_ALL ^ E_NOTICE);
?></div>
      



