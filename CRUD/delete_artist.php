<?php
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];
    $mysqli = new mysqli("localhost", "root", "", "album_sales");

    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $stmt = $mysqli->prepare("DELETE FROM artists WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: artists.php?deleted=1");
    } else {
        echo "Failed to delete artist.";
    }
}
?>
