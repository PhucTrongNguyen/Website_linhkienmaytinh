<?php 
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    //Create connection
    try {
        $conn = new PDO("mysql:host=$servername;dbname=sinhvien", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    echo 'Connected successfully';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- <?php 
    foreach ($item as $key) {
        echo '$key[hoten]'.'<br>';
    }
    ?> -->
</body>
</html>