<!DOCTYPE html>
<html>
<head>
	<title>Chapter247  shop </title>
	<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/style.css">
	<link rel="stylesheet" type="text/css" href="<?=ASSETS?>css/datepicker.css">
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
	<script type="text/javascript" src="<?=ASSETS?>js/jquery.js"></script>
	<script type="text/javascript" src="<?=ASSETS?>js/bootstrap-datepicker.js"></script>
</head>
<body>
<?php if($this->session->userdata('user_id')){ ?>
<a href="<?=base_url()?>admin/logout" class="btn btn-primary pull-right">Logout</a>
<a href="<?=base_url()?>admin/dashboard" class="btn btn-primary ">Dashboard</a>
<?php }else{ ?>
		<a href="<?=base_url()?>admin" class="btn btn-primary pull-right">Login</a>
	<?php }?>
<a href="<?=base_url()?>" class="btn btn-primary ">Shop</a>
<a href="<?=base_url()?>cart/view_cart" class="btn btn-primary ">cart</a>
<p></p>



