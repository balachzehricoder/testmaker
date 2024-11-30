<?php
include 'includes/config.php';

// Check if school_id is set in the URL and is a valid integer
if (isset($_GET['school_id']) && !empty($_GET['school_id'])) {
    $school_id = intval($_GET['school_id']);

    // Retrieve the existing logo for deletion
    $query = "SELECT logo FROM schools WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $school_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $logo_path = $row['logo'];

        // Delete the school from the database
        $query = "DELETE FROM schools WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $school_id);

        if ($stmt->execute()) {
            // Delete the logo file from the server if it exists
            if ($logo_path && file_exists($logo_path)) {
                unlink($logo_path);
            }

            // Redirect to the schools list page
            header("Location: post.php");
            exit();
        } else {
            echo "Error deleting record: " . $stmt->error;
        }
    } else {
        echo "School not found.";
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>
