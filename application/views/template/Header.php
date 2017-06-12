<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel='icon' href='<?php echo base_url();?>assets/images/janjao-logo.ico' type='image/x-icon'> 
    <meta name="description" content="">
    <meta name="author" content=""> 
    <title>DITP-Registeration | <?php echo $viewName;?></title> 
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/css/bootstrap.css" rel="stylesheet"> 
    <link href="<?php echo base_url()?>assets/css/mainstyle.css" rel="stylesheet">  
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/heroic-features.css" rel="stylesheet"> 

    <!-- jQuery -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
</head> 
<body> 
<!-- Navigation -->
<nav class="border-nev-bottom navbar  navbar-inverse navbar-fixed-top " role="navigation"> 
    <!-- <div class="row col-sm-12"> -->
        <div class="col-md-12">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()?>">
                  <img src="<?php echo base_url()?>assets/images/janjao-logo.png" height="45" title="JANJAO HOTEL" style="float: left;margin-top: -13px;margin-left: -20px; "></img>
                </a> 
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="margin-right:0px; ">
                <ul class="nav navbar-nav navbar-right"> 
                    <?php echo $this->packfunction->setMenu($viewName); ?> 
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    <!-- /.row --> 
    <!-- </div> -->
</nav> 


