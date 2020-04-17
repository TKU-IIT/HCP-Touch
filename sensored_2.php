<div class="abcd" style='position:fixed; left:0px; top:0px;background-image: url("CHP-register.bmp");' >
<?phperror_reporting(0);?><head>
	<meta charset="utf-8">

	<title>卡片管理首頁</title>

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

</script><strong><div style="position:fixed; left:50px;top:0px;"><font face="arial" size="6"><p id="f1" style="color:white;""></p></font></div></strong>
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
 
<div style="position:fixed; left:169px; top:151px;">
<INPUT TYPE = "Text" VALUE ="" id="b" class=keyboard name = "cardbalance" style="background-color:#ff8ec7;width:214px;height: 28px" >
<div style="position:fixed; left:439px; top:2px;">
      <input type="submit" value="" style="background-image:url(V.bmp);width:34px;height:35px;">
      </div>
	  <div style="position:fixed; left:397px; top:2px;">
  <input type="reset" value="" style="background-image:url(X.bmp);width:34px;height:35px;"></div>
  <?php 
$ct = $_GET['cardtype'];
$cn= $_GET['cardnumber'];
$cb = $_GET['cardbalance'];
$servername = "localhost";
$username = "root";
$password = "jefflin123";
$dbname1="rfid_arduino";
$dbname2 = "rfid_rpi";
$conn = new mysqli($servername, $username, $password, $dbname1);
$conn1 = new mysqli($servername, $username, $password, $dbname2);
$cardnumber = mysqli_real_escape_string($conn1,$_GET['cardnumber']);
$cardbalance = mysqli_real_escape_string($conn1,$_GET['cardbalance']);
	$cardtype = mysqli_real_escape_string($conn1,$_GET['cardtype']);
     $query =  "INSERT INTO card_info (id, cardnumber, cardbalance) VALUES (0, '$cardnumber', '$cardbalance')";   

echo '<div style="position:fixed; left:169px; top:72px;">
<input TYPE = "Text" VALUE ="'. $cn . '" id="a" class="keyboard" name = "cardnumber" style="background-color:#ff8ec7;width:214px;height: 28px" >
      </div>';
if($cn!=null){
$sq1=mysqli_query($conn1,"INSERT INTO `card_info` (`id`, `cardnumber`, `cardbalance`, `cardtype`, `duration_time`, `voltage`, `current`, `gain`) VALUES (0, '$cardnumber', '$cardbalance', '$cardtype', NULL, NULL, NULL, NULL)");


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
	  <div style="position:fixed; left:8px; top:1px;" >
      <div style="position:fixed; left:248px; top:110px;" >

      	     <form action="ADCHP.php">
      <input type="submit" value="" style="background-image:url(ADCHP.bmp);width:32px;height:32px;">
</form>
      </div>
  <div style="position:fixed; left:168px; top:105px;" class="EL">

      	  <input type="radio"  name="cardtype" value="ELCHP" ></button>

      </div>
	    <div style="position:fixed; left:207px; top:105px;" class="CY">

      	  <input type="radio"  name="cardtype" value="CYCHP" ></button>

      </div>
	  <style>
	  .EL input[type="radio"] {
    float: right;
    -webkit-appearance: none;
    border: none;
    width: 32px;
    height: 32px;
    background: url(ELCHP.bmp) left center no-repeat;    

}
.EL input[type="radio"]:checked {
    background: url(C-EL_.bmp) left center no-repeat;

}
	  .CY input[type="radio"] {
    float: right;
    -webkit-appearance: none;
    border: none;
    width: 32px;
    height: 32px;
    background: url(CYCHP.bmp) left center no-repeat;    

}
.CY input[type="radio"]:checked {
    background: url(C-CY_.bmp) left center no-repeat;

}
	  </style>
	 
     </div>

      
      
