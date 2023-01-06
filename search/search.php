<style>


/* form {
  text-align: center;
} */

/* td {text-align:center; } */
</style>
<?php include("oci.php");
?>

<form name="" action="search.php" method="post" >
<table>
<tr><td align="center">
</td></tr>
<tr><td align="center">


<input style="width: 50%;" type="text" name="choose" value="">

</td></tr>
<tr><td align="center"><input type=submit name=submit value=search><!---compound searching->


<?php
if(isset($_POST['submit'])) {


$search=$_POST['choose'];
// $query = 'select * from stdata where stgender like "%'.$search.'%"';
$query = 'select * from book where title like "%'.$search.'%"';//like 
$records = oci_parse($con, $query);
echo "<center>";
echo "صفحةبحث بيانات الطلاب";

echo "</center>";
echo "<table width=600 border=1 align='center'>";
echo "<tr>";
echo "<td>الاسم</td>";
echo "<td>الرقم</td>";
echo "<td>ذكر/ انثى</td>";
echo "</tr>";
// while ($row = mysqli_fetch_array($records)) {
echo "<tr>";
echo "<td align=center>" . $row['stname'] . "</td>";
echo "<td align=center>" . $row['stid'] . "</td>";
echo "<td align=center>" . $row['stgender'] . "</td>";
echo "</tr>";

    }//while
echo "</table>";
// }//if submit
?>

