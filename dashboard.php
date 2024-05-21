<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <img src="logo.png" width="30" height="30" alt="Logo">
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
        
    </div>

    
</body>
</html>
