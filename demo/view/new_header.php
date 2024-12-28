<?php
if(!isset($title)) {
    $pagetitle = "Yardy Adventures";
    $base_url = "https://".$_SERVER["SERVER_NAME"]."/demo";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Explore the natural wonders of Yardy River Adventures. Join us for eco-culture tours, immersive nature experiences, and thrilling adventures in Jamaica's pristine landscapes. Perfect for nature lovers and eco-adventurers.">
    <title><?php echo $pagetitle?></title>
    <link rel="shortcut icon" href="<?php echo $base_url?>/assets/images/general/favicon.png" type="image/x-icon">

   <!--Opengraph tags -->
    <meta property="og:title" content="Yardy River Adventures">
    <meta property="og:site_name" content="Yardy Adventures">
    <meta property="og:url" content="https://yardyadventures.com">
    <meta property="og:description" content="Explore the natural wonders of Yardy River Adventures. Join us for eco-culture tours, immersive nature experiences, and thrilling adventures in Jamaica's pristine landscapes. Perfect for nature lovers and eco-adventurers.">
    <meta property="og:image" content="https://yardyadventures.com/demo/assets/images/general/default.png">
    <meta property="og:type" content="website">

   <!--Twitter cards-->
   <meta name="twitter:card" content="summary">
   <meta name="twitter:title" content="Yardy River Adventures">
   <meta name="twitter:site" content="@yardyriveradv">
   <meta name="twitter:description" content="Jamaica’s Best
   Eco-Tourist Attraction
   Rustic, tranquil and unscathed
   landscapes set the stage for boundary
   less experiences in the park and the
   surrounding communities of the once
   booming sugar cane b">
   <meta name="twitter:image" content="<?php echo $base_url?>/assets/images/frontend/adventure/Yardy%20Rush.jpg">
   <meta name="twitter:image:alt" content="Yardy Fully Rushed">


    <!-- Bootstrap CSS -->
    <link href="<?php echo $base_url?>/assets/common/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo $base_url?>/assets/common/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/common/css/line-awesome.min.css">

    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/magnific-popup.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/slick.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/odometer.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/animate.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/datepicker.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/lightcase.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/admin/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/main.css">
    
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/custom.css">
    <link rel="stylesheet" href="<?php echo $base_url?>/assets/presets/default/css/color.php?color=6ee723&secondColor=525CEB">
</head>
<body>
     
