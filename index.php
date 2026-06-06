<?php
include("db.php");

if(isset($_POST['save'])){

    $client_name = $_POST['client_name'];
    $contact_no = $_POST['contact_no'];
    $total_payment = $_POST['total_payment'];
    $status = $_POST['status'];
    $last_call_date = $_POST['last_call_date'];
    $call_status = $_POST['call_status'];
    $next_followup_date = $_POST['next_followup_date'];
    $notes = $_POST['notes'];

    mysqli_query($conn,"
    INSERT INTO clients
    (
        client_name,
        contact_no,
        total_payment,
        status,
        last_call_date,
        call_status,
        next_followup_date,
        notes
    )
    VALUES
    (
        '$client_name',
        '$contact_no',
        '$total_payment',
        '$status',
        '$last_call_date',
        '$call_status',
        '$next_followup_date',
        '$notes'
    )
    ");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Solar Land CRM</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">

<h2>SOLAR LAND - Client Follow-Up System</h2>

<form method="POST">

<input type="text" name="client_name" placeholder="Client Name" required>

<input type="text" name="contact_no" placeholder="Contact No">

<input type="number" step="0.01"
name="total_payment"
placeholder="Total Payment">

<select name="status">
    <option>Pending</option>
    <option>Completed</option>
    <option>Cancelled</option>
</select>

<label>Last Call Date</label>
<input type="date" name="last_call_date">

<select name="call_status">
    <option>No Answer</option>
    <option>Interested</option>
    <option>Follow-Up Needed</option>
    <option>Converted</option>
</select>

<label>Next Follow-Up</label>
<input type="date" name="next_followup_date">

<textarea name="notes"
placeholder="Notes"></textarea>

<button name="save">
Save Client
</button>

</form>

<hr>

<table>

<tr>
<th>SR</th>
<th>Client Name</th>
<th>Contact</th>
<th>Payment</th>
<th>Status</th>
<th>Last Call</th>
<th>Call Status</th>
<th>Next Follow-Up</th>
<th>Notes</th>
<th>Actions</th>
</tr>

<?php

$result = mysqli_query($conn,
"SELECT * FROM clients ORDER BY id DESC");

$sr = 1;

while($row = mysqli_fetch_assoc($result))
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

<td><?php echo $row['notes']; ?></td>
<td>
    <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
    <a href="delete.php?id=<?php echo $row['id']; ?>"
       onclick="return confirm('Delete this record?')">
       Delete
    </a>
</td>

</tr>

<?php } ?>
<a href="print.php" target="_blank">
    <button>Print Full Report</button>
</a>
</table>

</div>

</body>
</html>