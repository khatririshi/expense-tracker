<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<h2>All Expenses</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Date</th>
    <th>Category</th>
    <th>Payment</th>
    <th>Amount</th>
    <th>Note</th>
    <th>Action</th>
</tr>

<?php
$result = mysqli_query($conn, "SELECT * FROM expenses ORDER BY expense_date DESC");
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
    <td><?php echo $row['expense_date']; ?></td>
    <td><?php echo $row['category']; ?></td>
    <td><?php echo $row['payment_mode']; ?></td>
    <td>₹<?php echo $row['amount']; ?></td>
    <td><?php echo $row['note']; ?></td>
    <td>
        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

<br>
<a href="index.php">Add New Expense</a>

</body>
</html>
