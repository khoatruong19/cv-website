<?php
require __DIR__ . '/components/header.php';

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'cv_web';
$port = 4306;

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname, $port);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn -> query('use cv_web');
$conn -> query('drop table if exists cvs');
// Create users table
$tableName = 'users';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  username VARCHAR(30) NOT NULL,
  password VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create cvs table
$tableName = 'cvs';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(30) NOT NULL,
  last_name VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  address VARCHAR(100) NOT NULL,
  avatar longblob not null,
  job_title VARCHAR(50) NOT NULL,
  level VARCHAR(50) NOT NULL,
  skills TEXT NOT NULL,
  bio TEXT NOT NULL,
  id_user INT(6) NOT NULL,
  cv_id VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create experiences table
$tableName = 'experiences';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  job_title VARCHAR(50) NOT NULL,
  company VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  company_location VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  cv_id VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create certificates table
$tableName = 'certificates';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  certificate_name VARCHAR(50) NOT NULL,
  issue_organization VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  credential_url VARCHAR(200) NOT NULL,
  description TEXT NOT NULL,
  cv_id VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table $tableName: " . $conn->error;
}

// Create education table
$tableName = 'education';
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  department VARCHAR(50) NOT NULL,
  faculty VARCHAR(50) NOT NULL,
  start_date DATE NOT NULL,
  end_date DATE NOT NULL,
  location VARCHAR(100) NOT NULL,
  description TEXT NOT NULL,
  cv_id VARCHAR(30) NOT NULL
)";
if ($conn->query($sql) === FALSE) {
    echo "Error creating table $tableName: " . $conn->error;
}

$conn->close();

?>

<body>

<div class="">
<div
style="
display:flex;
justify-content:center;
padding-top:10em;">
  <button
  onclick="createTables()"
  style=
  "border:solid 1px #383838;
  border-radius:10px;
  height:2.5em;
  width:10em;"
  >Create tables</button>
</div>
</div>

<script src="../js/home.js"></script>
<script>
function createTables() {
  confirm("Are you sure you want to create tables?");
}
</script>

<?php require __DIR__ . '/components/footer.php'; ?>
