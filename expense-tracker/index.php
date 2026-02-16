<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Add Expense</h2>

<form method="post">
    Amount (₹):
    <input type="number" name="amount" required><br><br>

    Category:
    <select name="category">
        <option>Food</option>
        <option>Travel</option>
        <option>Rent</option>
        <option>Shopping</option>
        <option>Other</option>
    </select><br><br>

    Payment Mode:
    <select name="payment_mode">
        <option value="Cash">Cash</option>
        <option value="Online">Online Transfer</option>
    </select><br><br>

    Date:
    <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"><br><br>

    Note:
    <input type="text" name="note"><br><br>

    <button name="save">Save Expense</button>
</form>

<br>
<a href="list.php">View Expenses</a> |
<a href="report.php">Monthly Report</a>

<?php
if (isset($_POST['save'])) {
    $amount = $_POST['amount'];
    $category = $_POST['category'];
    $payment_mode = $_POST['payment_mode'];
    $date = $_POST['date'];
    $note = $_POST['note'];

    mysqli_query($conn,
    "INSERT INTO expenses (amount, category, payment_mode, expense_date, note)
     VALUES ('$amount','$category','$payment_mode','$date','$note')");

    echo "<p>Expense Added ✅</p>";
}
?>

</body>
</html>
