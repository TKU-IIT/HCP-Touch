<?php
$con=mysqli_connect("localhost","root","jefflin123","choihong");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM CardInfo");
$result2 = mysqli_query($con,"SELECT * FROM CardInfo");

echo "<table border='1'>
<tr>
<th>id</th>
<th>CardNumber</th>
<th>CardBalance</th>
<th>CardType</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo "<tr>";
echo "<td>" . $row['id'] . "</td>";
echo "<td>" . $row['CardNumber'] . "</td>";
echo "<td>" . $row['CardBalance'] . "</td>";
echo "<td>" . $row['CardType'] . "</td>";
echo "</tr>";
}
echo "</table>";
$fp=fopen('id.txt','w');
$fp1=fopen('CardNumber.txt','w');
$fp2=fopen('CardBalance.txt','w');
$fp3=fopen('CardType.txt','w');

while($row2 = mysqli_fetch_array($result2))
{
fwrite($fp,"id=");
fwrite($fp,$row2['id']);
fwrite($fp,"\n");
fwrite($fp1,"CardNumber=");
fwrite($fp1,$row2['CardNumber']);
fwrite($fp1,"\n");
fwrite($fp2,"CardBalance=");
fwrite($fp2,$row2['CardBalance']);
fwrite($fp2,"\n");
fwrite($fp3,"CardType=");
fwrite($fp3,$row2['CardType']);
fwrite($fp3,"\n");
}

fclose($fp);
fclose($fp1);
fclose($fp2);
fclose($fp3);
mysqli_close($con);
?>
