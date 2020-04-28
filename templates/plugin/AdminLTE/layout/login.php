<?php

use Cake\Core\Configure;

/** @var \AdminLTE\View\AdminLTEView $this */
/** @var string|null $googleLink */
/** @var string|null $facebookLink */
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= Configure::read('Theme.title'); ?> | <?= $this->fetch('title'); ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Font Awesome - nie działa zbundlowany gulpem -->
    <?= $this->Html->css('AdminLTE./bower_components/font-awesome/css/font-awesome.min'); ?>
    <?= $this->Html->css('main') ?>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    <?= $this->fetch('css'); ?>

</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="<?= $this->Url->build(); ?>">
            <?= Configure::read('Theme.logo.large') ?>
        </a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg"><?= __('Panel logowania') ?></p>

        <?= $this->fetch('content'); ?>

        <?php if (Configure::read('App.enableSocialLogin')): ?>
            <div class="social-auth-links text-center">
                <p>- <?= __('LUB') ?> -</p>
                <a href="<?= $facebookLink ?? '#' ?>" class="btn btn-block btn-social btn-facebook btn-flat">
                    <i class="fa fa-facebook"></i>
                    <?= __('Zaloguj przez Facebook') ?>
                </a>
                <a href="<?= $googleLink ?? '#' ?>" class="btn btn-block btn-social btn-google btn-flat">
                    <i class="fa fa-google-plus"></i>
                    <?= __('Zaloguj przez Google') ?>
                </a>
            </div>
        <?php endif; ?>

        <div class="text-center">
            <?php if (Configure::read('Theme.login.show_remember')): ?>
                <a href="#"><?= __('Zapomniałem hasła') ?></a><br>
            <?php endif; ?>
            <?php if (Configure::read('Theme.login.show_register')): ?>
                <a href="#" class="text-center"><?= __('Zarejestruj się') ?></a>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- jQuery 3 -->
<?= $this->Html->script('AdminLTE./bower_components/jquery/dist/jquery.min'); ?>
<!-- Bootstrap 3.3.7 -->
<?= $this->Html->script('AdminLTE./bower_components/bootstrap/dist/js/bootstrap.min'); ?>
<!-- iCheck -->
<?= $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>

<?= $this->fetch('script'); ?>

<?= $this->fetch('scriptBottom'); ?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' /* optional */
        });
    });
</script>
</body>
</html>
