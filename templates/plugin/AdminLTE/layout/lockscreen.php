<?php use Cake\Core\Configure; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo Configure::read('Theme.title'); ?> | <?php echo $this->fetch('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= $this->Html->css('main') ?>
    <!-- Font Awesome - nie działa zbundlowany gulpem -->
    <?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <?= $this->Html->css('AdminLTE.skins/skin-' . Configure::read('Theme.skin') . '.min'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?php echo $this->fetch('css'); ?>

</head>
<body class="hold-transition lockscreen">
<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
    <div class="lockscreen-logo">
        <a href="<?php echo $this->Url->build(); ?>"><?php echo Configure::read('Theme.logo.large') ?></a>
    </div>
    <!-- User name -->
    <div class="lockscreen-name">John Doe</div>

    <!-- START LOCK SCREEN ITEM -->
    <div class="lockscreen-item">
        <!-- lockscreen image -->
        <div class="lockscreen-image">
            <?php echo $this->Html->image('user1-128x128.jpg', ['alt' => __('Zdjęcie profilowe')]); ?>
        </div>
        <!-- /.lockscreen-image -->

        <?php echo $this->fetch('content'); ?>

    </div>
    <!-- /.lockscreen-item -->
    <div class="help-block text-center">
        <?= __('Wpisz hasło, żeby wrócić do panelu') ?>
    </div>
    <div class="text-center">
        <a href="<?php echo $this->Url->build('pages/examples/login'); ?>"><?= __('Lub zaloguj się jako inny użytkownik') ?></a>
    </div>
    <div class="lockscreen-footer text-center">
        Copyright &copy; 2020 <b><a href="https://adminlte.io" class="text-black">X-One</a></b><br>
        <?= __('Wszystkie prawa zastrzeżone') ?>
    </div>
</div>
<!-- /.center -->

<!-- jQuery 3 -->
<?php echo $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?php echo $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
</body>
</html>
