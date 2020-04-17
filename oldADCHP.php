<div class="abcd" style='position:fixed; left:0px; top:0px;background-image: url("CHP-register.bmp");' >
<?phperror_reporting(0);?><head>
	<meta charset="utf-8">

	<title>卡片管理首頁(Admin)</title>

<!-- jQuery (required) & jQuery UI + theme (optional) -->
	<link href="docs/css/jquery-ui.min.css" rel="stylesheet">
	<!-- still using jQuery v2.2.4 because Bootstrap doesn't support v3+ -->
	<script src="docs/js/jquery-latest.min.js"></script>
	<script src="docs/js/jquery-ui.min.js"></script>
	<!-- <script src="docs/js/jquery-migrate-3.0.0.min.js"></script> -->

	<!-- keyboard widget css & script (required) -->
	<link href="css/keyboard.css" rel="stylesheet">
	<script src="js/jquery.keyboard.js"></script>

	<!-- keyboard extensions (optional) -->
	<script src="js/jquery.mousewheel.js"></script>
	<script src="js/jquery.keyboard.extension-typing.js"></script>
	<script src="js/jquery.keyboard.extension-autocomplete.js"></script>
	<script src="js/jquery.keyboard.extension-caret.js"></script>

	<!-- demo only -->
	<link rel="stylesheet" href="docs/css/bootstrap.min.css">
	<link rel="stylesheet" href="docs/css/font-awesome.min.css">

	<link href="docs/css/prettify.css" rel="stylesheet">
	<script src="docs/js/bootstrap.min.js"></script>
	<script src="docs/js/demo.js"></script>
	<script src="docs/js/jquery.tipsy.min.js"></script>
	<script src="docs/js/prettify.js"></script> <!-- syntax highlighting -->



</head>
<script>
    var text;
    function key1(){document.getElementById(text).value = document.getElementById(text).value + "1";}
    function key2(){document.getElementById(text).value = document.getElementById(text).value + "2";}
    function key3(){document.getElementById(text).value = document.getElementById(text).value + "3";}
    function key4(){document.getElementById(text).value = document.getElementById(text).value + "4";}
    function key5(){document.getElementById(text).value = document.getElementById(text).value + "5";}
    function key6(){document.getElementById(text).value = document.getElementById(text).value + "6";}
    function key7(){document.getElementById(text).value = document.getElementById(text).value + "7";}
    function key8(){document.getElementById(text).value = document.getElementById(text).value + "8";}
    function key9(){document.getElementById(text).value = document.getElementById(text).value + "9";}
    function key0(){document.getElementById(text).value = document.getElementById(text).value + "0";}
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

</script><strong><div style="position:fixed; left:50px;top:280px;"><font face="arial" size="6"><p id="f1" style="color:white;""></p></font></div></strong>
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
.keyboard {
    background-color : #ff8ec7;
    color: #a349a4;
    border-color:#a349a4;
    border-style: solid;
}
/* override bootstrap active state */
button.btn-default {
color: #a349a4;
	background-color: #ff8ec7;
	-webkit-box-shadow: none;
	box-shadow: none;
}
.ui-keyboard {
background:#ff8ec7;
font-size: 12px;	
border: 1px solid #a349a4;	
padding: 2px;
text-align: left;}
button.btn-default:hover {
color: #a349a4;
	background-color: #ff8ec7;
}
.ui-keyboard-toggle span {
	width: .2em;
	height: .2em;
	display: inline-block;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: contain;

	
}
/* override Bootstrap excessive button padding */
button.ui-keyboard-button.btn {
color: #a349a4;
background-color: #ff8ec7;
	padding: 1px 6px;
}
button.
/* Bootswatch Darkly input is too bright */
button.ui-keyboard-input.light, button.ui-keyboard-preview.light { color: #a349a4; background: #ff8ec7; }
button.ui-keyboard-input.dark, button.ui-keyboard-preview.dark { color: #a349a4; background: #ff8ec7; }
</style>
<form name="form" action="" method="get">
 <div style="position:fixed; left:240px; top:195px;">
<input TYPE = "Text" VALUE ="" id="a" onclick='text = "cardnumber";' class="keyboard" name = "cardnumber" style="background-color:#ff8ec7;width:336px;height: 38px" >
      </div>
<div style="position:fixed; left:240px; top:370px;">
<INPUT TYPE = "Text" VALUE ="" id="b" class=keyboard onclick='text = "cardbalance";' name = "cardbalance" style="background-color:#ff8ec7;width:336px;height: 38px" >
<div style="position:fixed; left:439px; top:2px;">
      <input type="submit" value="" style="background-image:url(V.bmp);width:34px;height:35px;">
      </div>
  <?php 
$ct = $_GET['cardtype'];
$cn= $_GET['cardnumber'];
$cb = $_GET['cardbalance'];
$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";
$conn = new mysqli($servername, $username, $password, $dbname2);
$conn1 = new mysqli($servername, $username, $password, $dbname2);
$cardnumber = mysqli_real_escape_string($conn1,$_GET['cardnumber']);
$cardbalance = mysqli_real_escape_string($conn1,$_GET['cardbalance']);
	$cardtype = mysqli_real_escape_string($conn1,$_GET['cardtype']);
     $query =  "INSERT INTO card_info (id, cardnumber, cardbalance) VALUES (0, '$cardnumber', '$cardbalance')";   

if($cn!=null){
$q1=mysqli_query($conn1,"INSERT INTO card_info (id, cardnumber, cardbalance, cardtype) VALUES (0, '$cardnumber', '$cardbalance','$cardtype')");
}
 
 ?>
</form>


<script>

$('#a')
	.keyboard({
		layout: 'international',
		css: {
			// input & preview
			// "label-default" for a darker background
			// "light" for white text
			input: 'form-control input-sm light',
			// keyboard container
			container: 'center-block well',
			// default state
			buttonDefault: 'btn btn-default',
			// hovered button
			buttonHover: 'btn-primary',
			// Action keys (e.g. Accept, Cancel, Tab, etc);
			// this replaces "actionClass" option
			buttonAction: 'active',
			// used when disabling the decimal button {dec}
			// when a decimal exists in the input area
			buttonDisabled: 'disabled'
		}
	})
	.addTyping();

// Script - typing extension
// simulate typing into the keyboard, use:
// \t or {t} = tab, \b or {b} = backspace, \r or \n or {e} = enter
// added {l} = caret left, {r} = caret right & {d} = delete
$('#b')
	.keyboard({
		layout: 'international',
		css: {
			// input & preview
			// "label-default" for a darker background
			// "light" for white text
			input: 'form-control input-sm light',
			// keyboard container
			container: 'center-block well',
			// default state
			buttonDefault: 'btn btn-default',
			// hovered button
			buttonHover: 'btn-primary',
			// Action keys (e.g. Accept, Cancel, Tab, etc);
			// this replaces "actionClass" option
			buttonAction: 'active',
			// used when disabling the decimal button {dec}
			// when a decimal exists in the input area
			buttonDisabled: 'disabled'
		}
	})
	.addTyping();

// Script - typing extension
// simulate typing into the keyboard, use:
// \t or {t} = tab, \b or {b} = backspace, \r or \n or {e} = enter
// added {l} = caret left, {r} = caret right & {d} = delete
</script>

<div style="position:fixed; left:8px; top:1px;" >

      	     <form action="index.php">
      <input type="submit" value="" style="background-image:url(home.bmp);width:32px;height:32px;">
</form>
      </div>

      <div style="position:fixed; left:320px; top:2px;" >

      	     <form action="sensored_2.php">
      <input type="submit" value="" style="background-image:url(S-setcard.bmp);width:111px;height:35px;">
</form>
      </div>
  
     </div>
