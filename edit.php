<?php
include("db.php");

// 1. Check ID exists
if(!isset($_GET['id']) || empty($_GET['id'])){
    die("Invalid Request: ID missing");
}

$id = intval($_GET['id']); // security fix

// 2. Fetch data safely
$result = mysqli_query($conn,
"SELECT * FROM clients WHERE id=$id");

if(mysqli_num_rows($result) == 0){
    die("No record found for this ID");
}

$row = mysqli_fetch_assoc($result);

// 3. Update logic
if(isset($_POST['update'])){

    $client_name = $_POST['client_name'];
    $contact_no = $_POST['contact_no'];
    $total_payment = $_POST['total_payment'];
    $status = $_POST['status'];
    $last_call_date = $_POST['last_call_date'];
    $call_status = $_POST['call_status'];
    $next_followup_date = $_POST['next_followup_date'];
    $notes = $_POST['notes'];

    mysqli_query($conn,"
        UPDATE clients SET
        client_name='$client_name',
        contact_no='$contact_no',
        total_payment='$total_payment',
        status='$status',
        last_call_date='$last_call_date',
        call_status='$call_status',
        next_followup_date='$next_followup_date',
        notes='$notes'
        WHERE id=$id
    ");

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Client</title>
    <link rel="stylesheet" href="edit.css">
</head>

<body>

<div class="container">

<div class="card">

<h2>Update Client Record</h2>

<form method="POST">

<input type="text" name="client_name"
value="<?php echo $row['client_name']; ?>">

<input type="text" name="contact_no"
value="<?php echo $row['contact_no']; ?>">

<input type="number" step="0.01" name="total_payment"
value="<?php echo $row['total_payment']; ?>">

<input type="text" name="status"
value="<?php echo $row['status']; ?>">

<input type="date" name="last_call_date"
value="<?php echo $row['last_call_date']; ?>">

<input type="text" name="call_status"
value="<?php echo $row['call_status']; ?>">

<input type="date" name="next_followup_date"
value="<?php echo $row['next_followup_date']; ?>">

<textarea name="notes"><?php echo $row['notes']; ?></textarea>

<button type="submit" name="update">
Update Record
</button>

</form>

</div>

</div>

</body>
</html>