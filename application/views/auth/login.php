<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CONTROLE DE EMPRESTIMOS</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap.min.css');?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/font-awesome.min.css');?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Datetimepicker -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/bootstrap-datetimepicker.min.css');?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/AdminLTE.min.css');?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo site_url('resources/css/_all-skins.min.css');?>">
    </head>
    
    <body class="hold-transition login-page" style="background: url(<?php echo site_url('resources/img/fundo_login.jpg');?>); background-size: cover;">
<div class="login-box">
  <div class="login-logo">
    <img src="<?php echo site_url('resources/img/siga-logo-white.png');?>" alt="Siga" style="width: 200px;">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body"  style="border: none !important; background: none !important; color:#FFFFFF !important;">

    <form action="login" method="post">

      <?php if ($this->session->message != '') { ?>
      <div class="callout callout-danger">
         <?php echo $this->session->message; ?>
      </div>
      <?php } ?>

      <div class="form-group has-feedback">
		<label for="identity" class="control-label">Usuário</label>
        <input type="email" class="form-control" placeholder="E-mail" name="identity" id="identity" required  
               value="<?php echo ($this->session->identity!='' ? $this->session->identity : ''); ?>">
      </div>

      <div class="form-group has-feedback">
		<label for="password" class="control-label">Senha</label>
        <input type="password" class="form-control" placeholder="Senha" name="password" id="password" required>
        <span class="fa fa-bike form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4 pull-right">
          <button type="submit" class="btn btn-success btn-block pull-right">Entrar</button>
        </div>
        <!--
        <div class="col-xs-6 pull-left">
           <a href="forgot_password">Esqueci minha senha</a>
        </div>
        -->
        <!-- /.col -->
      </div>
    </form>

    <!--a href="register.html" class="text-center">Register a new membership</a-->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<!-- <script src="../../bower_components/jquery/dist/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script> -->
<!-- iCheck -->
<!-- <script src="../../plugins/iCheck/icheck.min.js"></script> -->
<script>
  // $(function () {
  //   $('input').iCheck({
  //     checkboxClass: 'icheckbox_square-blue',
  //     radioClass: 'iradio_square-blue',
  //     increaseArea: '20%' // optional
  //   });
  // });
</script>


</body>
</html>
