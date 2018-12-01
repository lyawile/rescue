<?php use Cake\Core\Configure; ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo Configure::read('Theme.title'); ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <?php echo $this->Html->css('AdminLTE./bootstrap/css/bootstrap.min'); ?>
  <!-- Font Awesome -->
    <?php echo $this->Html->css('font-awesome.min'); ?>
  <!-- Ionicons -->
    <?php echo $this->Html->css('ionicons.min.css'); ?>
  <!-- Theme style -->
  <?php echo $this->Html->css('AdminLTE.AdminLTE.min'); ?>
  <!-- iCheck -->
  <?php echo $this->Html->css('AdminLTE./plugins/iCheck/square/blue'); ?>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <?php echo $this->Html->script('html5shiv.min'); ?>
  <?php echo $this->Html->script('respond.min'); ?>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <?php echo Configure::read('Theme.logo.large'); ?>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p> <?php echo $this->Flash->render(); ?> </p>
    <p> <?php echo $this->Flash->render('auth'); ?> </p>

<?php echo $this->fetch('content'); ?>

    <?php
    if (Configure::read('Theme.login.show_social')) {
        ?>
        <div class="social-auth-links text-center">
          <p>- <?php echo __('OR') ?> -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> <?php echo __('Sign in using Facebook') ?></a>
          <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> <?php echo __('Sign in using Google+') ?></a>
        </div>
        <?php
    }
    ?>

    <?php
    if (Configure::read('Theme.login.show_remember')) {
        ?>
        <a href="#"><?php echo __('I forgot my password') ?></a><br>
        <?php
    }
    if (Configure::read('Theme.login.show_register')) {
        ?>
        <a href="#" class="text-center"><?php echo __('Register a new membership') ?></a>
        <?php
    }
    ?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<?php echo $this->Html->script('AdminLTE./plugins/jQuery/jquery-2.2.3.min'); ?>
<!-- Bootstrap 3.3.6 -->
<?php echo $this->Html->script('AdminLTE./bootstrap/js/bootstrap.min'); ?>
<!-- iCheck -->
<?php echo $this->Html->script('AdminLTE./plugins/iCheck/icheck.min'); ?>
<!--Mdobaji umezingua, yaani include ya scripts inapoint huku, narus js naona haziamki kumbe umebadilisha, rudisha default-->
<?php echo $this->Html->script('bills'); ?>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
