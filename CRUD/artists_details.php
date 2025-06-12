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
if (!isset($_GET['id'])) {
    die("Artist ID not specified.");
}
$mysqli = new mysqli("localhost", "root", "", "album_sales");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

$id = (int) $_GET['id'];
$stmt = $mysqli->prepare("SELECT * FROM albums WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$artist = $result->fetch_assoc();

if (!$artist) {
    die("Artist not found.");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Artist Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<script>
function confirmEdit(id) {
    Swal.fire({
        title: 'Proceed to Edit?',
        text: "Do you want to update this artist's information?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, go to edit'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = `edit_artist.php?id=${id}`;
        }
    });
}
</script>


<script>
function confirmDelete(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "This will permanently delete the artist!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirect to the PHP delete file
            window.location.href = `delete_artist.php?id=${id}`;
        }
    });
}
</script>


<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">Artist Details</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item"><strong>Artist Name:</strong> <?= htmlspecialchars($artist['artist']) ?></li>
                            <li class="list-group-item"><strong>Album:</strong> <?= htmlspecialchars($artist['album']) ?></li>
                            <li class="list-group-item"><strong>Sales 2022:</strong> <?= htmlspecialchars($artist['sales_2022']) ?></li>
                            <li class="list-group-item"><strong>Date Released:</strong> <?= htmlspecialchars($artist['date_released']) ?></li>
                            <li class="list-group-item"><strong>Last Updated:</strong> <?= htmlspecialchars($artist['last_update']) ?></li>
                        </ul>
                        <a href="artists.php" class="btn btn-primary mt-3">← Back to Artist List</a>
                        <button class="btn btn-warning mt-3" onclick="confirmEdit(<?= $artist['id'] ?>)">✏️ Update</button>
                        <button class="btn btn-danger mt-3" onclick="confirmDelete(<?= $artist['id'] ?>)">🗑️ Delete</button>

                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>