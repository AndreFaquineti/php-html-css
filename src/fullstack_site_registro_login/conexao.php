<?php
$uri = "mysql://avnadmin:AVNS_Eh3MstTzS3bRKma2cM9@mysql-portifolio-php-html-css.i.aivencloud.com:27320/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];;
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert='D:/absolute/path/to/ssl/certs/ca.pem'";

try {
    $db = new PDO($conn, $fields["user"], $fields["pass"]);

    $stmt = $db->query("SELECT VERSION()");
    print($stmt->fetch()[0]);
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
/*
    $servername="mysql";
    $username="root";
    $password="secret";
    $dbname="dbSisUsuarios";

    try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully";
    } catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    }
*/
?>
