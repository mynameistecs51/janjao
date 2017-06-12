<!DOCTYPE html>
<style type="text/css">
  html {
        overflow: auto;
       }
</style>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DITP REGISTERATION | Log in</title>
  <link rel="shortcut icon" href="<?php echo base_url()?>assets/images/janjao-logo.ico" />
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/fonts/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/iCheck/square/blue.css">

  <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet"> 
  <link href="<?php echo base_url()?>assets/css/mainstyle.css" rel="stylesheet">

</head>
<body class="hold-transition login-page" style="/*background-color:#337ab7;*/">

<br><br>
<div class="login-box">
  <div class="login-box-body" style="background-color: #2A3F54;height: 120px;">
    <a href="<?php echo base_url()?>dashboard/">
      <img src="<?php echo base_url()?>assets/images/janjao-logo.png" height="45"> 
    </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" style="margin-top: -40px;">
    <!-- <span style="color:#333"><h3>PLEASE LOGIN</h3></span> -->
    <b style="color:#FF0000"><br><?php echo $error ?></b>
    <form name="form_login" action="<?php echo base_url()?>authen/checkLogin/" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="username" name="UserName"   autofocus="autofocus" required autocomplete="off" style="height: 45px;font-size: 20px;">
        <span class="glyphicon lyphicon glyphicon-user form-control-feedback" style="margin-top:5px;"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="password" name="Password" autocomplete="off" required style="height: 45px;font-size: 20px;">
        <span class="glyphicon glyphicon-lock form-control-feedback" style="margin-top:5px;"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        <input type="hidden"   name="rememberme" value="Yes"> 
          <div class="checkbox icheck">
            <label>
             <!--   <input type="checkbox" name="rememberme" value="Yes" checked="checked"> Keep me logged in-->
            </label>
          </div>
        </div> 
        <!-- /.col -->
        
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat"> LOG IN </button>
        </div>
        <!-- /.col -->
      </div>
      <div class="row">
        <div class="col-xs-12" align="right"> <a href="../authen/forgotpassword/"> FOR GOT PASSWORD ? </a>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url()?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url()?>assets/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url()?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
 


    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%'
    });  

  }); 
</script>
</body>
</html>
