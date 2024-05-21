<?php
include 'db.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['take_item_id'])) {
    $item_id = $_POST['take_item_id'];
    $sql = "UPDATE items SET status='taken' WHERE id='$item_id'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Item taken successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$sql = "SELECT items.*, users.username FROM items JOIN users ON items.user_id = users.id WHERE status='available'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Items</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Logo</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="dashboard.php">Anasayfa</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="view_items.php">Ürünleri Görüntüle</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="add_item.php">Ürün Ekle</a>
        </li>
      </ul>
      <form class="d-flex">
        <button class="btn btn-outline-danger" type="submit">Çıkış</button>
      </form>
    </div>
  </div>
</nav>
        <h2>Available Items</h2>
        <?php
        if ($result->num_rows > 0) {
            echo '<table class="table">';
            echo '<thead><tr><th>Item Name</th><th>Description<th>Posted By</th><th>Action</th></tr></thead><tbody>';
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['item_name'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['username'] . "</td>";
                echo '<td><form method="POST"><input type="hidden" name="take_item_id" value="' . $row['id'] . '"><button type="submit" class="btn btn-primary">Take Item</button></form></td>';
                echo "</tr>";
            }
            echo '</tbody></table>';
        } else {
            echo '<p>No items available.</p>';
        }
        ?>
        <a href="dashboard.php" class="btn btn-secondary">Back to Dashboard</a>
    </div>
</body>
</html>

<?php
$conn->close();
?>
