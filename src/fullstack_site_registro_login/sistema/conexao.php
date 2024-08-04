<?php
$uri = "mysql://avnadmin:AVNS_Eh3MstTzS3bRKma2cM9@mysql-portifolio-php-html-css.i.aivencloud.com:27320/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// build the DSN including SSL settings
$db = "mysql:";
$db .= "host=" . $fields["host"];
$db .= ";port=" . $fields["port"];;
$db .= ";dbname=defaultdb";

try {
    $conn = new PDO($db, $fields["user"], $fields["pass"]);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . '<br>';
}
?>
