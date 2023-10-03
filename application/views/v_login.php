<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
  <title> Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <!-- Bootstrap 3.3.2 -->
  <link href="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Font Awesome Icons -->
  <link href="<?php echo base_url('assets/font-awesome-4.3.0/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- Ionicons -->
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/ionicons.min.css"  media="screen,projection"/>
  <!-- Theme style -->
  <link href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/AdminLTE.min.css') ?>" rel="stylesheet" type="text/css" />
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link href="<?php echo base_url('assets/AdminLTE-2.3.11/dist/css/skins/_all-skins.min.css') ?>" rel="stylesheet" type="text/css" />
  <link href="<?php echo base_url('assets/admin/css/style.css') ?>" rel="stylesheet" type="text/css" />
  <!-- jQuery 2.1.3 -->
  <script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/jQuery/jquery-2.2.3.min.js'); ?>"></script>
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  

  style="background-image: url(' echo base_url('assets/admin/images/bag_login.jpg') ?>');"
  <![endif]-->
</head>
<body   class="hold-transition login-page">
<div class="login-box">
  <div  class="login-logo">
    <b>LOG IN</b></br>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg text-red">
      
        <?php
      
        if (!is_null($this->session->flashdata('login_failed'))) {
         ?>
               <div id="alert_login" style="display: none;" class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                      
                     username atau password salah!!
                </div> 
               <script type="text/javascript">
                  $("#alert_login").css("display","block");
                    $(window).load(function() { $("#alert_login").fadeOut(4300); })
                  </script>
             <?php
            }
            ?>      
        
    </p>

    <form action="<?php echo base_url()."Login/auth"; ?>" method="post" onsubmit="remmember();">
      <div class="form-group has-feedback">
        <input id="username" type="text" class="form-control" placeholder="Username" name="user">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input id="password" type="password" class="form-control" placeholder="Password" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox">
            
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/bootstrap/js/bootstrap.min.js'); ?>" type="text/javascript"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/plugins/slimScroll/jquery.slimscroll.min.js'); ?>" type="text/javascript"></script>
<!-- FastClick -->
<script src='<?php echo base_url('assets/AdminLTE-2.3.11/plugins/fastclick/fastclick.min.js'); ?>'></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/AdminLTE-2.3.11/dist/js/app.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin/js/ajax.js'); ?>"></script>

<script>
  /*$(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });*/

  var remm_username=getCookie('username');
  var remm_password=getCookie('password');
  $('#username').val(remm_username);
  $('#password').val(remm_password);

  var remmember=function(){
    //alert(value);
    if(document.getElementById('check-remmember').checked){
      setCookie('username', $('#username').val(), 30);
      setCookie('password', $('#password').val(), 30);
    }
    else{
      setCookie('username', '', 30);
      setCookie('password', '', 30);
    }
  }
</script>
</body>
</html>
