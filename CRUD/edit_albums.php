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
$mysqli = new mysqli("localhost", "root", "", "album_sales");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if (!isset($_GET['id'])) {
    die("Artist ID not specified.");
}

$id = (int) $_GET['id'];
$success = "";
$error = "";

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $album = $_POST['album'];
    $sales_2022 = $_POST['sales_2022'];
    $date_released = $_POST['date_released'];
    

    $stmt = $mysqli->prepare("UPDATE albums SET  album=?, sales_2022=?, date_released=? WHERE id=?");
    $stmt->bind_param("sisi", $album, $sales_2022, $date_released, $id);

    if ($stmt->execute()) {
        $success = "Album updated successfully!";
    } else {
        $error = "Update failed.";
    }
}

// Fetch artist info
$stmt = $mysqli->prepare("SELECT * FROM albums WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$artist = $result->fetch_assoc();

if (!$artist) {
    die("Album not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Artist</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card mt-4">
                    <div class="card-header">
                        <h3 class="card-title">Edit Album</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($success): ?>
                            <div class="alert alert-success"><?= $success ?></div>
                        <?php elseif ($error): ?>
                            <div class="alert alert-danger"><?= $error ?></div>
                        <?php endif; ?>

                        <form method="POST">
                            <div class="form-group">
                                <label>Album</label>
                                <input type="text" name="album" class="form-control" value="<?= htmlspecialchars($artist['album']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Sales 2022</label>
                                <input type="number" name="sales_2022" class="form-control" value="<?= htmlspecialchars($artist['sales_2022']) ?>" required>
                            </div>

                            <div class="form-group">
                                <label>Date Released</label>
                                <input type="date" name="date_released" class="form-control" value="<?= htmlspecialchars($artist['date_released']) ?>" required>
                            </div>


                            <button type="submit" class="btn btn-success">💾 Save Changes</button>
                            <a href="albums.php" class="btn btn-secondary">← Back to List</a>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>

