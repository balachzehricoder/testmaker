<?php
include 'header.php';
include 'sidebar.php';
include 'footer.php';
include './includes/config.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and validate inputs
    $school_name = htmlspecialchars(trim($_POST['val-username'])); // School name
    $phone = htmlspecialchars(trim($_POST['val-email'])); // Phone number
    $password = trim($_POST['val-password']); // Password
    $confirm_password = trim($_POST['val-confirm-password']); // Confirm password

    // Validate the passwords
    if ($password !== $confirm_password) {
        die("Passwords do not match!");
    }

    // Handle file upload
    $logo = '';
    if (isset($_FILES['val-image']) && $_FILES['val-image']['error'] == 0) {
        // Validate the file type (only allow image files)
        $allowed_extensions = ['jpg', 'jpeg', 'png', 'gif'];
        $file_extension = strtolower(pathinfo($_FILES['val-image']['name'], PATHINFO_EXTENSION));

        if (in_array($file_extension, $allowed_extensions)) {
            // Check file size (5MB max)
            if ($_FILES['val-image']['size'] <= 5 * 1024 * 1024) {
                $upload_dir = "uploads/"; // Directory to save uploaded files
                $filename = uniqid() . '.' . $file_extension;  // Generate a unique file name
                $file_path = $upload_dir . $filename;  // Full path to store the file

                // Create the uploads directory if it doesn't exist
                if (!is_dir($upload_dir)) {
                    mkdir($upload_dir, 0777, true);
                }

                // Move the uploaded file to the 'uploads' directory
                if (move_uploaded_file($_FILES['val-image']['tmp_name'], $file_path)) {
                    $logo = $filename;  // Store the filename in the database
                } else {
                    die("Error uploading the image file.");
                }
            } else {
                die("File size should not exceed 5MB.");
            }
        } else {
            die("Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.");
        }
    }

    // Insert into database
    $stmt = $conn->prepare("INSERT INTO schools (school_name, phone, logo, password) VALUES (?, ?, ?, ?)");
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt->bind_param("ssss", $school_name, $phone, $logo, $hashed_password);

    if ($stmt->execute()) {
        echo "School added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Add New School</h5>
        </div>
        <div class="modal-body">
            <div class="basic-form">
                <form action="#" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-username">School name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a school name..">
                        </div>
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-email">Phone no <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" id="val-email" name="val-email" placeholder="Your phone number..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-12">
                            <label class="col-form-label" for="val-image">School logo <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" id="val-image" name="val-image" placeholder="Upload the school logo.." accept="image/*">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-password" name="val-password" placeholder="Choose a safe one..">
                        </div>
                        <div class="col-lg-6">
                            <label class="col-form-label" for="val-confirm-password">Confirm Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="val-confirm-password" name="val-confirm-password" placeholder="Confirm your password..">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-6">
                            <label class="css-control css-control-primary css-checkbox" for="val-terms">
                                <input type="checkbox" class="css-control-input mr-3" id="val-terms" name="val-terms" value="1">
                                Terms &amp; Conditions
                            </label>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-lg-8 ml-auto">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
