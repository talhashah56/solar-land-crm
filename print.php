<?php
include("db.php");

$result = mysqli_query($conn,
"SELECT * FROM clients");
?>

<!DOCTYPE html>
<html>
<head>
<title>Print Report</title>

<style>
table{
    width:100%;
    border-collapse:collapse;
}

th,td{
    border:1px solid black;
    padding:8px;
}
</style>

</head>
<body onload="window.print()">

<h2 align="center">
SOLAR LAND CLIENT REPORT
</h2>

<table>

<tr>
<th>SR</th>
<th>Client</th>
<th>Contact</th>
<th>Payment</th>
<th>Status</th>
<th>Last Call</th>
<th>Call Status</th>
<th>Next Follow-Up</th>
</tr>

<?php
$sr=1;

while($row=mysqli_fetch_assoc($result))
{
?>
<tr>
<td><?php echo $sr++; ?></td>
<td><?php echo $row['client_name']; ?></td>
<td><?php echo $row['contact_no']; ?></td>
<td><?php echo $row['total_payment']; ?></td>
<td><?php echo $row['status']; ?></td>
<td><?php echo $row['last_call_date']; ?></td>
<td><?php echo $row['call_status']; ?></td>
<td><?php echo $row['next_followup_date']; ?></td>
</tr>
<?php } ?>

</table>

</body>
</html>