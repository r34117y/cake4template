<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Configure::read('Theme.title'); ?> | <?= $this->fetch('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome - nie działa zbundlowany gulpem -->
    <?php echo $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
    <?= $this->Html->css('main') ?>
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

    <?= $this->fetch('css'); ?>

</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-<?= Configure::read('Theme.skin'); ?> layout-top-nav">
<div class="wrapper">

    <header class="main-header">
        <?= $this->element('nav-top', ['layout' => 'top']); ?>
    </header>
    <!-- Full Width Column -->
    <div class="content-wrapper">
        <div class="container">

            <?= $this->Flash->render(); ?>
            <?= $this->Flash->render('auth'); ?>
            <?= $this->fetch('content'); ?>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-wrapper -->

    <?= $this->element('footer', ['layout' => 'top']); ?>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<?= $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?= $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- SlimScroll -->
<?= $this->Html->script('AdminLTE./bower_components/jquery-slimscroll/jquery.slimscroll.min'); ?>
<!-- FastClick -->
<?= $this->Html->script('AdminLTE./bower_components/fastclick/lib/fastclick'); ?>
<!-- AdminLTE App -->
<?= $this->Html->script('AdminLTE.adminlte.min'); ?>

<?= $this->fetch('script'); ?>

<?= $this->fetch('scriptBottom'); ?>

</body>
</html>
