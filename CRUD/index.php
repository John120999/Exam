<?php
// Prevent browser from caching the page
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.html");
  exit();
}
?>

<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "album_sales");

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get total albums sold
$result = $mysqli->query("SELECT SUM(sales_2022) AS total_sales FROM albums");

$total_sales = 0;
if ($row = $result->fetch_assoc()) {
  $total_sales = $row['total_sales'] ?? 0;
}
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "album_sales");

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// combined the album sales per artist
$query = "SELECT artist, SUM(sales_2022) AS total_sales FROM albums GROUP BY artist";
$result = $mysqli->query($query);

$sales_summary = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $sales_summary[] = $row['artist'] . ': ' . $row['total_sales'];
  }
}

$combined_sales_text = implode("<br>", $sales_summary); // for HTML output
?>

<?php
$mysqli = new mysqli("localhost", "root", "", "album_sales");

if ($mysqli->connect_error) {
  die("Connection failed: " . $mysqli->connect_error);
}

// Get the top 1 artist with highest combined sales
$query = "SELECT artist, SUM(sales_2022) AS total_sales 
          FROM albums 
          GROUP BY artist 
          ORDER BY total_sales DESC 
          LIMIT 1";

$result = $mysqli->query($query);
$top_artist = "N/A";
$top_sales = 0;

if ($result && $row = $result->fetch_assoc()) {
  $top_artist = $row['artist'];
  $top_sales = $row['total_sales'];
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Music Dashboard</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

  <!-- Font Awesome (Icons) -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

  <!-- Bootstrap (Required by AdminLTE) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

  <link rel="icon" type="image/png" href="images/android-chrome-512x512.png">


</head>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button">
            <i class="fas fa-bars"></i>
          </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="index.php" class="nav-link">Home</a>
        </li>
      </ul>
    </nav>

    <!-- Sidebar -->
    <?php
    $activePage = 'dashboard';
    include('sidebar.php');
    ?>

    <!-- Main Content -->
    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Dashboard</h1>
            </div>
          </div>
        </div>
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">

            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h3><?= $total_sales ?></h3>
                  <p>Total Albums Sold (2022)</p>
                </div>
                <div class="icon">
                  <i class="fas fa-compact-disc"></i>
                </div>
                <a href="albums.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>


            <div class="col-lg-3 col-6">
              <div class="small-box bg-success">
                <div class="inner">
                  <h5>Album Sales per Artist</h5>
                  <p style="font-size: 14px;"><?= $combined_sales_text ?></p>
                </div>
                <div class="icon">
                  <i class="fas fa-microphone"></i>
                </div>
                <a href="albums.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>


            <div class="col-lg-3 col-6">
              <div class="small-box bg-danger">
                <div class="inner">
                  <h5>Top Selling Artist</h5>
                  <p><?= htmlspecialchars($top_artist) ?> <br> <?= number_format($top_sales) ?> albums</p>
                </div>
                <div class="icon">
                  <i class="fas fa-music"></i>
                </div>
                <a href="albums.php" class="small-box-footer">
                  More info <i class="fas fa-arrow-circle-right"></i>
                </a>
              </div>
            </div>

          </div>

        </div>
      </section>
    </div>

    <!-- Footer -->
    <footer class="main-footer">
      <strong>&copy; 2025 Your Company.</strong> All rights reserved.
    </footer>
  </div>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>


  <script>
    function logout() {
      Swal.fire({
        title: "Log Out?",
        text: "Are you sure you want to log out?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, log out"
      }).then((result) => {
        if (result.isConfirmed) {
          window.location.href = "logout.php"; // ✅ Redirect to login page
        }
      });
    }
  </script>


</body>

</html>