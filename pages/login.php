<?php 
require __DIR__ . '/components/header.php'; 
?>

<?php
// Start the session
session_start();

// Check if the user is already logged in, then redirect to home page
if (isset($_SESSION['username'])) {
    header('Location: /');
    exit;
}

// Set the error message to be empty
$errorMessage = '';

// Check if the login form has been submitted
if (isset($_POST['login_btn'])) {
    // Get the username and password from the form
    $username = $_POST['name'];
    $password = $_POST['password'];

    // Validate the username and password
    if (strlen($username) < 1 || strlen($password) < 8 || !ctype_alpha(substr($username, 0, 1))) {
        $errorMessage = 'Invalid username or password.';
    } else {
        // Connect to the database
        $conn = mysqli_connect('localhost', 'root', '', 'CV');

        // Check if the connection was successful
        if (!$conn) {
            die('Failed to connect to database');
        }

        // Sanitize the username and password to prevent SQL injection
        $username = mysqli_real_escape_string($conn, $username);
        $password = mysqli_real_escape_string($conn, $password);

        // Query the database to authenticate the user
        $query = "SELECT * FROM users WHERE name='$username' AND password='$password'";
        $result = mysqli_query($conn, $query);

        // Check if the query was successful and if the user exists
        if (mysqli_num_rows($result) == 1) {
            // The user is authenticated, so set the session variables and redirect to home page
            $_SESSION['username'] = $username;
            header('Location: /');
            exit;
        } else {
            $errorMessage = 'Invalid username or password.';
        }
    }
}
?>

<section>
    <div class="login">
        <div class="container">
            <h1>WELCOME BACK</h1>
            <div class="login_form">
                <form method="post">
                    <label for="name">Username</label><br>
                    <input type="text" id="name" name="name" placeholder="Type your username" required><br>
                    <label for="password">Password</label><br>
                    <input type="password" id="password" name="password" placeholder="Type your password" required><br><br>
                    <?php if ($errorMessage !== '') : ?>
                        <p style="color:red;"><?php echo $errorMessage; ?></p>
                    <?php endif; ?> 
                    <button type="submit" name="login_btn">SIGN IN</button>
                </form> 
            </div>
            <h4>Don't have an account? <a href="#">Sign up</a></h4>
        </div>
        <div class="image">
            <img src="../images/CV.jpg" alt="">
        </div>
    </div>
</section>


</body>
</html>
