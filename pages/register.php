<?php
require __DIR__ . '/components/header.php';
?>


<?php
    // Define database connection constants
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', 'root');
    define('DB_NAME', 'cv_web');

    // Connect to the database
    $conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    // Check if the form is submitted
    if (isset($_POST['login_btn'])) {
        // Get the form data
        $first_name = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last_name = mysqli_real_escape_string($conn, $_POST['lastname']);
        $username = mysqli_real_escape_string($conn, $_POST['name']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

        // Validate inputs

        if ($password != $confirm_password) {
            $error_msg = 'Passwords do not match';
        } else {
            // Insert user data into the database
            $query = "INSERT INTO users (first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$password')";
            $result = mysqli_query($conn, $query);
            // Get the id based on the username from the users table
            $queryid = "SELECT id FROM users WHERE username='$username'";
            $resultid = mysqli_query($conn, $queryid);
            $row = mysqli_fetch_assoc($resultid);
            $id = $row['id'];

            // Add user's avatar to the cvs table
            $avatar_url = 'https://upload.wikimedia.org/wikipedia/commons/thumb/2/2c/Default_pfp.svg/1200px-Default_pfp.svg.png';
            $avatar_blob = file_get_contents($avatar_url);

            $query1 = "INSERT INTO cvs (id_user, first_name, last_name, avatar) VALUES ('$id', '$first_name', '$last_name', '$avatar_blob')";
            $result1 = mysqli_query($conn, $query1);

            // Check if the insert was successful
            if ($result and $result1) {
                $success_msg = 'Registration successful';
            } else {
                $error_msg = 'Registration failed';
            }
        }
    }
?>
<section>
    <div class="register">
        <div class="container">
            <h1>REGISTER</h1>
            <?php if (isset($error_msg)): ?>
                <div class="error"><?php echo $error_msg; ?></div>
            <?php endif; ?>
            <?php if (isset($success_msg)): ?>
                <div class="success"><?php echo $success_msg; ?></div>
            <?php endif; ?>
            <div class="login_form">
                <form method="post">
                    <label for="name">First name</label><br>
                    <input type="text" id="name" name="firstname" placeholder="Type your full name" pattern="^[a-zA-ZàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹĐđ\s]+$" title="Firstname must start with a letter and be at least 8 characters long" required><br>
                    <label for="name">Last name</label><br>
                    <input type="text" id="name" name="lastname" placeholder="Type your full name" pattern="^[a-zA-ZàáạảãâầấậẩẫăằắặẳẵèéẹẻẽêềếệểễìíịỉĩòóọỏõôồốộổỗơờớợởỡùúụủũưừứựửữỳýỵỷỹĐđ\s]+$" title="Lastname must start with a letter and be at least 8 characters long" required><br>
                    <label for="name">Username</label><br>
                    <input type="text" id="name" name="name" placeholder="Type your username" pattern="^[a-zA-Z][a-zA-Z0-9]{7,}$" title="Username must start with a letter and be at least 8 characters long" required><br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Type your password" minlength="8" required><br>
                    <label for="password">Confirm Password</label><br>
                    <input type="password" id="confirm_password" name="confirm_password" placeholder="Type your password" minlength="8" required><br></br>
                    <button type="submit" name="login_btn">SIGN UP</button>
                </form>
            </div>
            <h4>Already have an account<a href="/login"> Sign in</a></h4>
        </div>
        <div class="image">
            <img src="../images/CV.jpg" alt="">
        </div>
    </div>
</section>




</body>
</html>
