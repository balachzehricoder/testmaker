<?php
include 'includes/config.php';
include 'header.php';
include 'sidebar.php';

// Include the backend logic for updating school details
var_dump($_GET);

// Simple debug to see if the school_id is passed via GET
if (isset($_GET['school_id'])) {
    echo "school_id: " . $_GET['school_id'];
} else {
    echo "school_id parameter is missing.";
}

// Check if school_id is set in the URL and is a valid integer
if (isset($_GET['school_id']) && !empty($_GET['school_id'])) {
    $school_id = intval($_GET['school_id']);

    // Retrieve the existing school data
    $query = "SELECT * FROM schools WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $school_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if the school exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $school_name = $row['school_name'];
        $phone = $row['phone'];
        $logo = $row['logo'];
        $status = $row['status'];

        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Sanitize and validate inputs
            $new_school_name = htmlspecialchars(trim($_POST['val-username']));
            $new_phone = htmlspecialchars(trim($_POST['val-email']));
            $new_status = isset($_POST['val-terms']) ? 1 : 0;  // If status checkbox is checked, set 1 else 0
            $new_logo = $logo;  // Keep the old logo by default if no new logo is uploaded

            // Handle logo file upload
            if (isset($_FILES['val-image']) && $_FILES['val-image']['error'] == 0) {
                $upload_dir = "../uploads/";  // Directory to save uploaded files, relative to the backend file
                $file_extension = pathinfo($_FILES['val-image']['name'], PATHINFO_EXTENSION);
                $filename = uniqid() . '.' . $file_extension;
                $file_path = $upload_dir . $filename;

                // Move uploaded file to 'uploads' folder
                if (move_uploaded_file($_FILES['val-image']['tmp_name'], $file_path)) {
                    // Delete the old logo file if it exists
                    if ($logo && file_exists($logo)) {
                        unlink($logo);
                    }

                    $new_logo = $file_path;  // Update logo path
                } else {
                    echo "Error uploading the image file.";
                }
            }

            // Update school record in the database
            $update_query = "UPDATE schools SET school_name = ?, phone = ?, logo = ?, status = ? WHERE id = ?";
            $stmt = $conn->prepare($update_query);
            $stmt->bind_param("sssii", $new_school_name, $new_phone, $new_logo, $new_status, $school_id);

            if ($stmt->execute()) {
                echo "School details updated successfully!";
                header("Location: post.php");  // Redirect to the post page after successful update
                exit;  // Ensure no further code is executed
            } else {
                echo "Error updating record: " . $stmt->error;
            }
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
?>

<!-- Edit School Form (UI Modal) -->
<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit School Details</h5>
        </div>
        <div class="modal-body">
            <div class="basic-form">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-username">School Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="val-username" name="val-username" value="<?php echo $school_name; ?>" placeholder="Enter school name..">
                        </div>
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-email">Phone No <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="val-email" name="val-email" value="<?php echo $phone; ?>" placeholder="Your phone number..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label class="col-form-label" for="val-image">School Logo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="val-image" name="val-image" placeholder="Upload school logo.." accept="image/*">
                            <?php if ($logo): ?>
                                <p>Current logo: <img src="uploads/<?php echo $logo; ?>" width="100"></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe password..">
                        </div>
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Confirm your password..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                <input type="checkbox" class="css-control-input mr-3" id="val-terms" name="val-terms" value="1" <?php echo ($status == 1) ? 'checked' : ''; ?>>
                                Active Status
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-8 ml-auto">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>
