<?php
include 'admin/confiq.php'; // Adjust the path as per your file structure

session_start();

// Initialize the login attempt counter if not set
if (!isset($_SESSION['login_attempts'])) {
    $_SESSION['login_attempts'] = 0;
}

// Initialize the timestamp of the first failed attempt if not set
if (!isset($_SESSION['first_attempt_time'])) {
    $_SESSION['first_attempt_time'] = time();
}

// Check if form should be disabled due to too many failed attempts
$lockout_duration = 15 * 60; // 15 minutes lockout duration
if ($_SESSION['login_attempts'] >= 5 && (time() - $_SESSION['first_attempt_time']) < $lockout_duration) {
    $remaining_time = ($lockout_duration - (time() - $_SESSION['first_attempt_time'])) / 60;
    $error = "Too many failed login attempts. Please try again in " . ceil($remaining_time) . " minutes.";
    $form_disabled = true;
} else {
    // Reset attempt counter and timestamp after lockout duration
    if (time() - $_SESSION['first_attempt_time'] >= $lockout_duration) {
        $_SESSION['login_attempts'] = 0;
        $_SESSION['first_attempt_time'] = time();
    }
    $form_disabled = false;
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !$form_disabled) {
    // Escape user input to prevent SQL injection
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Query to fetch user with the email
    $sql = "SELECT id, role, password FROM admins WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, validate password
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            // Reset login attempts on successful login
            $_SESSION['login_attempts'] = 0;
            $_SESSION['first_attempt_time'] = time(); // Reset the timer

            // Start session and set user role
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['role'] = $row['role'];

            // Redirect based on role
            if ($row['role'] == 'Super Admin') {
                header("Location: admin/index.php");
            } elseif ($row['role'] == 'Admin') {
                header("Location: admin/index.php");
            } elseif ($row['role'] == 'Editor') {
                header("Location: admin/index.php");
            }
            exit();
        } else {
            // Incorrect password, increment login attempts
            $_SESSION['login_attempts']++;
            $error = "Incorrect email or password.";
        }
    } else {
        // Email not found, increment login attempts
        $_SESSION['login_attempts']++;
        $error = "Incorrect email or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sign In &#8211; Felicity Insurance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="freelancermark.com">
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/fav-icons/fav.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="./assets/fonts/font-faimly/stylesheet.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/owl.carousel.css">
    <link rel="stylesheet" href="./assets/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/css/lightbox.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/main.css" rel="stylesheet">
</head>

<body>

<section class="section_user_info">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT7bo-YFamCW98w5J4Dj273CWiORw6oue5aQg&s" class="img-fluid" alt="">
            </div>
            <div class="col-md-6">
                <div class="main_form">
                    <a href="" class="user_quick_link">
                        <img class="img-fluid" height="50px" src="https://t4.ftcdn.net/jpg/04/75/00/99/360_F_475009987_zwsk4c77x3cTpcI3W1C1LU4pOSyPKaqi.jpg" alt="">
                    </a>
                    <h2 class="text-center">Sign In</h2>
                    <p class="text-center">Lorem ipsum dolor sit amet.</p>
                    <?php if (isset($error)) { ?>
                        <div class="alert alert-danger text-center">
                            <?php echo $error; ?>
                        </div>
                    <?php } ?>

                    <form action="" method="post" <?php echo $form_disabled ? 'disabled' : ''; ?>>
                        <div class="form_list">
                            <div class="form_fields">
                                <div class="row">
                                    <div class="col-md-12">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Email" required>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password*" required>
                                    </div>
                                </div>
                               
                                <div class="mt-3">
                                    <input type="submit" value="Submit" class="btn btn_brand" <?php echo $form_disabled ? 'disabled' : ''; ?>>
                                </div>
                            </div>
                           
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- JavaScript -->
<script src="./assets/js/jquery-3.3.1.min.js"></script>
<script src="./assets/js/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.10.0/js/lightbox.min.js"></script>
<script src="./assets/js/bootstrap.bundle.min.js"></script>
<script src="./assets/js/main.js"></script>

</body>
</html>
