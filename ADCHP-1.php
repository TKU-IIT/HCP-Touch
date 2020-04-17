
<script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
<div class="abcd" style='position:fixed; left:0px; top:0px;background-image: url("CHP-register.bmp");' >
<script type="text/javascript">






    var num1 = "1";
    var num2 = "2";
    var num3 = "3";
    var num4 = "4";
    var num5 = "5";
    var num6 = "6";
    var num7 = "7";
    var num8 = "8";
    var num9 = "9";
    var num0 = "0";
    function key1(){document.getElementById(text).value = document.getElementById(text).value + num1;}
    function key2(){document.getElementById(text).value = document.getElementById(text).value + num2;}
    function key3(){document.getElementById(text).value = document.getElementById(text).value + num3;}
    function key4(){document.getElementById(text).value = document.getElementById(text).value + num4;}
    function key5(){document.getElementById(text).value = document.getElementById(text).value + num5;}
    function key6(){document.getElementById(text).value = document.getElementById(text).value + num6;}
    function key7(){document.getElementById(text).value = document.getElementById(text).value + num7;}
    function key8(){document.getElementById(text).value = document.getElementById(text).value + num8;}
    function key9(){document.getElementById(text).value = document.getElementById(text).value + num9;}
    function key0(){document.getElementById(text).value = document.getElementById(text).value + num0;}
       function BackSpace(){
    document.getElementById(text).value = document.getElementById(text).value.substring(0, document.getElementById(text).value.length - 1);

    }
    </script>
    <style type="text/css">
.abcd
 {
  width: 800px;
  height: 480px;
}
.EL input[type="radio"] {
    float: right;
    -webkit-appearance: none;
    border: none;
    width: 29px;
    height: 29px;
    background: url(C-EL.bmp) left center no-repeat;

}
.EL input[type="radio"]:checked {
    background: url(C-EL_.bmp) left center no-repeat;

}
	  .CY input[type="radio"] {
    float: right;
    -webkit-appearance: none;
    border: none;
    width: 29px;
    height: 29px;
    background: url(C-CY.bmp) left center no-repeat;

}
.CY input[type="radio"]:checked {
    background: url(C-CY_.bmp) left center no-repeat;

}
                	  .AD input[type="radio"] {
    float: right;
    -webkit-appearance: none;
    border: none;
    width: 29px;
    height: 29px;
    background: url(C-AD.bmp) left center no-repeat;

}
.AD input[type="radio"]:checked {
    background: url(C-AD_.bmp) left center no-repeat;

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
        input[type="reset"]
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


    <form name="form" action="" method="get">


         <div style="position:fixed; left:239px; top:370px;">
        <INPUT TYPE = "text" VALUE ="" onclick="text = 'cardbalance';" id="cardbalance" class=keyboard name = "cardbalance" style="height:36px;width:340px;" />
    </div> <div style="position:fixed; left:719px; top:171px;">
        <input type="submit" value="" style="background-image:url(V.bmp);width:68px;height:70px;">
       </div>
        <div style="position:fixed; left:235px; top:240px;" class="EL">

      	  <input type="radio"  name="cardtype" value="ELCHP" >

      </div>
	    <div style="position:fixed; left:270px; top:240px;" class="CY">

      	  <input type="radio"  name="cardtype" value="CYCHP" >

      </div>


          <div style="position:fixed; left:719px; top:93px;">
        <input type="reset" value=""onclick="document.getElementById('cardbalance').value = '';"style="background-image:url(X.bmp);width:68px;height:70px;">
        </div>
            <div style="position:fixed; left:310px; top:240px;" class="AD">
                <input type="radio"  name="cardtype" value="ADCHP" >
          </div>

        </form>

<?php
error_reporting(0);
$servernameA = "localhost";
$usernameA = "root";
$passwordA = "jefflin123";
$dbname1A="rfid_arduino";


// Create connection
$connA = new mysqli($servernameA, $usernameA, $passwordA, $dbname1A);
$rowSQLA = mysqli_query($connA, "SELECT MAX( id ) AS max FROM `card`;" );
$rowA = mysqli_fetch_array( $rowSQLA );

$largestNumberA = $rowA['max'];
//max
$rowSQL1A = mysqli_query($connA,"SELECT * FROM card WHERE id=" . $largestNumberA . ";");
$row1A = mysqli_fetch_array( $rowSQL1A );
$cn = $row1A['cardnumber'];
echo "<font color='white' face='arial'size='6'><div id='cardnumber' name = " . "cardnumber" . " style='position:fixed; left:239px; top:196px;' >" . $cn . "</div></font>";
$ct = $_GET['cardtype'];
$cb = $_GET['cardbalance'];
$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname = "rfid_rpi";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO card_info (id, cardnumber, cardtype, cardbalance) VALUES (0, '" . $cn . "', '" . $ct . "', '" . $cb . "')";

if ($conn->query($sql) === TRUE) {

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();




?>

    <div style="position:fixed; left:719px; top:13px;" >
    <input type="button" id = "T1" onClick="window.location.reload()" style="background-image:url(C.bmp);height:68px;width:70px">

    </div>
    <div style="position:fixed; left:237px; top:426px;">
    <input type="button" id = "T1" onclick="key1()" style="background-image:url(1,1-N1.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:271px; top:426px;">
    <input type="button" id = "T2" onclick="key2()" style="background-image:url(1,2-N2.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:305px; top:426px;">
    <input type="button" id = "T3" onclick="key3()" style="background-image:url(1,3-N3.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:339px; top:426px;">
    <input type="button" id = "T4" onclick="key4()" style="background-image:url(1,4-N4.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:373px; top:426px;">
    <input type="button" id = "T5" onclick="key5()" style="background-image:url(1,5-N5.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:406px; top:426px;">
    <input type="button" id = "T6" onclick="key6()" style="background-image:url(1,6-N6.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:440px; top:426px;">
    <input type="button" id = "T7" onclick="key7()" style="background-image:url(1,7-N7.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:474px; top:426px;">
    <input type="button" id = "T8" onclick="key8()" style="background-image:url(1,8-N8.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:508px; top:426px;">
    <input type="button" id = "T9" onclick="key9()" style="background-image:url(1,9-N9.bmp);height:32px;width:32px">
    </div>
    <div style="position:fixed; left:542px; top:426px;">
    <input type="button" id = "T0" onclick="key0()" style="background-image:url(1,10-N0.bmp);height:32px;width:32px">
    </div>
        <div style="position:fixed; left:761px; top:423px;">
    <input type="button" id = "Tk" onclick="BackSpace()" style="background-image:url(CHP-K-backspace.bmp);height:32px;width:32px">
    </div>
    <form action="index.php">
      <div style="position:fixed; left:9px; top:11px;">
      <input type="submit"value='' style="background-image:url(home.bmp);width:68px;height:70px;">
      </div>
      </form>
