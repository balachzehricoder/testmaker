<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
    include 'confiq.php'; // Ensure database connection is included

    // Collect data from the form
    $title = $_POST['post-title'];
    $description = $_POST['post-description'];
    $author = $_POST['post-author'];
    $category = $_POST['post-category']; // Assuming category_id is being passed
    $tags = isset($_POST['tags']) ? implode(',', $_POST['tags']) : '';
    // $sub_title = $_POST['sub_title'];

    // File upload handling
    $thumbnail = $_FILES['post-thumbnail']['name'];
    $target_dir = "uploads/"; // Ensure this directory exists and has proper permissions
    $target_file = $target_dir . basename($thumbnail);
    $uploadOk = 1;

    // No file type restriction - allowing all file types

    // Check if file size is within limit (e.g., 5MB)
    if ($_FILES['post-thumbnail']['size'] > 5000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Check if everything is okay for file upload
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Rename the file to avoid overwriting (using timestamp for uniqueness)
        $new_filename = time() . "_" . basename($thumbnail); // Add a timestamp to avoid overwriting
        $target_file = $target_dir . $new_filename; // The new path for the file

        if (move_uploaded_file($_FILES['post-thumbnail']['tmp_name'], $target_file)) {
            // Save the path `uploads/picture_name` in the database
            $file_path = $target_dir . $new_filename;



            $sub_title = isset($_POST['sub_title']) ? $_POST['sub_title'] : ''; // Handle missing sub_title

            // Prepare and execute SQL insert statement
            $sql = "INSERT INTO posts (title, description, author, category_id, thumbnail, tags, sub_title) VALUES (?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssss", $title, $description, $author, $category, $file_path, $tags, $sub_title);

            if ($stmt->execute()) {
                // Redirect after successful insertion
                header("Location: post.php?success=1");
                exit(); // Ensure no further code is executed
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Error uploading file.";
        }
    }

    // Close the database connection
    $conn->close();
}
?>
