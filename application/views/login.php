<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>


<div style="background-image: url('<?php echo base_url(); ?>assets/dist/img/background1.jpg');" id="bg" style="height:100%; width: 100%;">
-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
background-size: cover;
<body class="hold-transition login-page">

<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">

  <div class="login-logo">


    <div class="login-logo" style="margin-bottom: 10px;">

        <img src="<?php echo base_url(); ?>assets/dist/img/launchpad-logo.png" style="height: auto;width: 250px;">      
      </div>
  <!-- 
    <a href="https://ibb.co/fQxNB4c"><img src="https://i.ibb.co/wYzQ3Mv/launchpad-logo.png" alt="launchpad-logo" border="0" width="300" height="80"></a>  
  -->
  </div>
    <p class="login-box-msg">Employee Management System</p>
    <?php echo form_open('Home/login'); ?>
      <div class="form-group has-feedback">
        <input type="text" name="txtusername" class="form-control" placeholder="Username/Staff Email">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txtpassword" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <?php echo $this->session->flashdata('login_error'); ?>
 

<style>
#bg {
  position: fixed; 
  top: 0; 
  left: 0; 
  
  /* Preserve aspet ratio */
  min-width: 100%;
  min-height: 100%;
}
.butoons1 
{
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 1px 1px;
  cursor: pointer;
  width:50%;
  margin-left:25%;
  margin-right:25%;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.8);
  background: rgb(145, 92, 182);
  padding: 15px 40px;
  border-radius: 4px;
  font-weight: normal;
  text-transform: uppercase;
  transition: all 0.2s ease-in-out;


.glow-butoons1:hover
  color: rgba(255, 255, 255, 1);
  box-shadow: 0 5px 15px rgba(145, 92, 182, .4);
}
.login-box:hover{
  color: rgba(255, 255, 255, 1);
  box-shadow: 0 5px 15px rgba(145, 92, 182, .4);
}
.login-box-body
{
 border-radius: 4px;
 background-color: #454545;
}
.login-box-msg
{
  color: rgba(255, 255, 255, 0.8);
}
}

</style>

<!--
.butoons1 {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 1px 1px;
  cursor: pointer;
  width:50%;
  margin-left:25%;
  margin-right:25%;
  text-decoration: none;
  color: rgba(255, 255, 255, 0.8);
  background: rgb(145, 92, 182);
  padding: 15px 40px;
  border-radius: 4px;
  font-weight: normal;
  text-transform: uppercase;
  transition: all 0.2s ease-in-out;
   {

.glow-butoons1:hover {
  color: rgba(255, 255, 255, 1);
  box-shadow: 0 5px 15px rgba(145, 92, 182, .4);
}

-->
  
  <button type="submit" class="butoons1"><i class="fa fa-sign-in" aria-hidden="true"> Sign In</button></i>
 
        <!-- /.col -->
        
     
      </div>
   </div>
</div>

    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->


<!-- jQuery 3 -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>assets/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
<script type="text/javascript"> src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/TweenLite.min.js"></script>
<script type="text/javascript"> src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/EasePack.min.js"></script>
<script type="text/javascript"> src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/499416/demo.js"></script>
</body>
</html>

