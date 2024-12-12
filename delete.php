<?php

require 'koneksi.php';

// Check and sanitize the `nim` parameter
if (isset($_GET['nim'])) {
    $nim = htmlspecialchars($_GET['nim']); // Sanitize input

    // Fetch student details to confirm existence
    $stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE nim = :nim");
    $stmt->execute([':nim' => $nim]);
    $student = $stmt->fetch();

    if (!$student) {
        die("Student not found."); // Handle invalid `nim`
    }

    // Proceed to delete the record
    $deleteStmt = $pdo->prepare("DELETE FROM mahasiswa WHERE nim = :nim");
    $deleteStmt->execute([':nim' => $nim]);

    if ($deleteStmt->rowCount() > 0) {
        echo "<script>alert('Student record deleted successfully.'); window.location.href = 'index.php';</script>";
    } else {
        echo "<script>alert('Failed to delete student record.'); window.history.back();</script>";
    }
} else {
    die("No NIM provided.");
}

?>