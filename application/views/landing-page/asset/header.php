<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scaleble=no" name="viewport">
    <?php foreach ($website as $web) : ?>
        <title><?= $judul;?> | <?= $web['head']; ?></title>
        <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/img/website/') . $web['logo'];?>">
    <?php endforeach; ?>
    
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="<?= base_url('assets/') ?>css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/') ?>/css/main.css?v=2.0">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js " integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj " crossorigin="anonymous "></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <style>
        /*untuk menghilangkan navbar google bawaan */
        #goog-gt-tt{
            display: none !important;
        }
        .goog-te-banner-frame{
            display: none !important;
        }
        .goog-te-menu-value:hover{
            text-decoration: none !important; 
        }
        #google_translate_element2 {
            display:none!important;
        }
    </style>
</head>
<body>
