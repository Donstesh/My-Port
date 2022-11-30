<?php include_once('config/database.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php
$a=1;
$stmt = $conn->prepare(
     "SELECT * FROM site_settings");
$stmt->execute();
$site_settings = $stmt->fetchAll();
foreach($site_settings as $row) 
{  	    
?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="storage/logo/<?php echo $row['site_logo']; ?>" />
    <title><?php echo $row['site_name']; ?> | <?php echo $row['site_description']; ?></title>
    <?php } ?>
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="assets/fonts/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>