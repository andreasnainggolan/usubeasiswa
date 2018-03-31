<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.png">

    <title>Sistem Evaluasi Pembelajaran</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>assets/vendor/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>assets/css/login.css" rel="stylesheet">

    <!-- Fonts from Google Fonts -->
  <link href='http://fonts.googleapis.com/css?family=Lato:300,400,900' rel='stylesheet' type='text/css'>
  <style type="text/css">
  .btn{
    color: #fff;
    background-color: #d35400;
    border-color: #e67e22;
}

.btn:hover{
    color: #d35400;;
    background-color: #fff;
    border-color: #e67e22;
    cursor: pointer;
}
  </style>
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header" style="float: left; width: 100%;">
          <div class="left" style="float: left;width: 10%;">
              <img src="<?php echo base_url();?>assets/img/usu.png" style="width: 100%;">
          </div>
          <div class="right" style="float:left;width: 80%; margin-left: 2%;margin-top: 3%;">
             <a class="navbar-brand" href="#"><b> SISTEM EVALUASI PEMBELAJARAN - UNIVERSITAS SUMATERA UTARA</b></a>
          </div>
        </div>
      </div>
    </div>

  <div id="headerwrap">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
        <?php
        if(isset($error)){
          ?>
        <div class="alert alert-info">
          <strong>Info!</strong> <?php echo $error;?>
        </div>
        <?php
          }?>
          <?php echo form_open('auth/check_register');?>
            <div class="form-group">
              <input type="text" required class="form-control" id="exampleInputEmail1" name="username" placeholder="Enter your username address">
            </div>
            <div class="form-group">
              <input type="password" required class="form-control" id="exampleInputEmail1" name="password" placeholder="Enter your password address">
            </div>
            <button type="submit" class="btn btn-sm" name="register">Register Sekarang!</button>
            <?php echo anchor('auth','Kembali',array('class'=>'btn btn-sm'));?>
            <?php echo form_close();?>
        </div><!-- /col-lg-6 -->
        <div class="col-lg-6">
          <img class="img-responsive" src="<?php echo base_url();?>assets/img/ipad-hand.png" alt="">
        </div><!-- /col-lg-6 -->
        
      </div><!-- /row -->
    </div><!-- /container -->
  </div><!-- /headerwrap -->
  
  
  

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>assets/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>assets/js/bootstrap.min.js"></script>
  </body>
</html>
