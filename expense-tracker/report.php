<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Monthly Report</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>Monthly Expense Report</h2>

<?php
$month = date('m');
$year = date('Y');

$total = mysqli_fetch_array(
    mysqli_query($conn,
    "SELECT SUM(amount) FROM expenses
     WHERE MONTH(expense_date)='$month'
     AND YEAR(expense_date)='$year'")
)[0];

echo "<h3>Total Expense: ₹$total</h3>";
?>

<h3>Category Wise</h3>
<table border="1" cellpadding="10">
<tr>
    <th>Category</th>
    <th>Total</th>
</tr>

<?php
$cat = mysqli_query($conn,
"SELECT category, SUM(amount) as total
 FROM expenses
 WHERE MONTH(expense_date)='$month'
 AND YEAR(expense_date)='$year'
 GROUP BY category");

while ($row = mysqli_fetch_assoc($cat)) {
?>
<tr>
    <td><?php echo $row['category']; ?></td>
    <td>₹<?php echo $row['total']; ?></td>
</tr>
<?php } ?>
</table>

<br>

<h3>Payment Mode Analysis</h3>
<table border="1" cellpadding="10">
<tr>
    <th>Mode</th>
    <th>Total</th>
</tr>

<?php
$mode = mysqli_query($conn,
"SELECT payment_mode, SUM(amount) as total
 FROM expenses
 WHERE MONTH(expense_date)='$month'
 AND YEAR(expense_date)='$year'
 GROUP BY payment_mode");

while ($row = mysqli_fetch_assoc($mode)) {
?>
<tr>
    <td><?php echo $row['payment_mode']; ?></td>
    <td>₹<?php echo $row['total']; ?></td>
</tr>
<?php } ?>
</table>

<br>
<a href="index.php">Back</a>

</body>
</html>
