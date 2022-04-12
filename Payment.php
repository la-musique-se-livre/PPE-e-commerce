<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>payment credit card form - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
	
    <link rel="stylesheet" href="css/style.css<?php echo "?".rand();?>">

	<link rel="stylesheet" href="css/panier.css<?php echo "?".rand();?>">

    
    <!--payment-->
	<link rel="stylesheet" href="../PPE/fonts/style.css">
    <link rel="stylesheet" href="../PPE/css/bottstrap.min.css">
    <link rel="stylesheet" href="/PPE/login/login.css">

  
    <link rel="stylesheet" href="../PPE/css/navbar/style.css">

    <!--payment-->
</head>
<?php
if(!isset($_SESSION)) {
  session_start();
} 
?>
<?php

include('php/db.php');
require_once('php/header_connexion.php');




$sql = "SELECT * FROM commande LEFT JOIN article ON commande.idArticle = article.id  WHERE commande.idUser = :idUser";

$commande = $bdd->prepare($sql);
$commande->bindParam(':idUser', $_SESSION['idUsers']);
$commande->execute();
$produits = $commande->fetchall();
$total = 0;
?>

<?php if (!empty($msg)) echo "<div class='alert-success text-center'>" . $msg . "</div><br/>"; ?>

<?php $count = 0;
foreach ($produits as $produits) : $total +=   $produits['exemplaire'] * $produits['prix']; $count += $produits['exemplaire']; ?>


<?php endforeach; ?>



<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
<div class="wrapper wrapper-content animated fadeInRight">
    
    <div class="row coo">

        <div class="col-lg-12">

            <div class="ibox">
                <div class="ibox-title">
                    Payment method
                </div>
                <div class="ibox-content">

                    <div class="panel-group payments-method" id="accordion">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <i class="fa fa-cc-paypal text-success"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">PayPal</a>
                                </h5>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-10">
                                            <h2>Total</h2>
                                            
                                            <strong>Prix:</strong>: <span class="text-navy"><?php echo $total . ' €' ?></span>

                                           
                                            <br>
                                            <br>
                                            
                                            
                                            <a class="btn btn-success">
                                                <i class="fa fa-cc-paypal">
                                                   PayPal
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                     </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="pull-right">
                                    <i class="fa fa-cc-amex text-success"></i>
                                    <i class="fa fa-cc-mastercard text-warning"></i>
                                    <i class="fa fa-cc-discover text-danger"></i>
                                </div>
                                <h5 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">Credit Card</a>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse in">
                                <div class="panel-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <h2>Total</h2>
                                            
                                            <strong>Prix:</strong>: <span class="text-navy"><?php echo $total . ' €' ?></span>

                                            
                                           
                                        </div>

                                        
                                        <div class="col-md-8">

                                            <form role="form" id="payment-form">
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="Number" placeholder="Numéro de carte " required="">
                                                                <span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
                                                            </div>

                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-7 col-md-7">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <input type="text" class="form-control" name="Expiry" placeholder="MM / YY" required="">
                                                        </div>
                                                    </div>
                                                    <div class="col-xs-5 col-md-5 pull-right">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <input type="text" class="form-control" name="CVC" placeholder="CVC" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <div class="form-group">
                                                            <label></label>
                                                            <input type="text" class="form-control" name="nameCard" placeholder="nom et prénom">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="btn btn-primary" type="submit">Effectuer le paiement !</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<style type="text/css">



/* WRAPPERS */
#wrapper {
  width: 100%;
  overflow-x: hidden;
}
.wrapper {
  padding: 0 20px;
}
.wrapper-content {
    padding: 102px 10px 40px;
}
#page-wrapper {
  padding: 0 15px;
  min-height: 568px;
  position: relative !important;
}
@media (min-width: 768px) {
  #page-wrapper {
    position: inherit;
    margin: 0 0 0 240px;
    min-height: 2002px;
  }
}

/* Payments */
.payment-card {
  background: #ffffff;
  padding: 20px;
  margin-bottom: 25px;
  border: 1px solid #e7eaec;
}
.payment-icon-big {
  font-size: 60px;
  color: #d1dade;
}
.payments-method.panel-group .panel + .panel {
  margin-top: -1px;
}
.payments-method .panel-heading {
  padding: 15px;
}
.payments-method .panel {
  border-radius: 0;
}
.payments-method .panel-heading h5 {
  margin-bottom: 5px;
}
.payments-method .panel-heading i {
  font-size: 26px;
}

.payment-icon-big {
    font-size: 60px !important;
    color: #d1dade;
}

.form-control,
.single-line {
  background-color: #FFFFFF;
  background-image: none;
  border: 1px solid #e5e6e7;
  border-radius: 1px;
  color: inherit;
  display: block;
  padding: 6px 12px;
  transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;
  width: 100%;
  font-size: 14px;
}
.text-navy {
    color: #1ab394;
}
.text-success {
    color: #1c84c6;
}
.text-warning {
    color: #f8ac59;
}
.ibox {
  clear: both;
  margin-bottom: 25px;
  margin-top: 0;
  padding: 0;
}
.ibox.collapsed .ibox-content {
  display: none;
}
.ibox.collapsed .fa.fa-chevron-up:before {
  content: "\f078";
}
.ibox.collapsed .fa.fa-chevron-down:before {
  content: "\f077";
}
.ibox:after,
.ibox:before {
  display: table;
}
.ibox-title {
  -moz-border-bottom-colors: none;
  -moz-border-left-colors: none;
  -moz-border-right-colors: none;
  -moz-border-top-colors: none;
  background-color: #ffffff;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 3px 0 0;
  color: inherit;
  margin-bottom: 0;
  padding: 14px 15px 7px;
  min-height: 48px;
}
.ibox-content {
  background-color: #ffffff;
  color: inherit;
  padding: 15px 20px 20px 20px;
  border-color: #e7eaec;
  border-image: none;
  border-style: solid solid none;
  border-width: 1px 0;
}
.ibox-footer {
  color: inherit;
  border-top: 1px solid #e7eaec;
  font-size: 90%;
  background: #ffffff;
  padding: 10px 15px;
}
.text-danger {
    color: #ed5565;
}

.m-tt{
    margin-left: 9px;
    position: relative;
    top: 32%;
}
</style>


</body>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>


 <!-- script payment -->
 <script src="../PPE/js/navbar/bootstrap.min.js"></script>
<script src="../PPE/js/navbar/jquery-3.3.1.min.js"></script>
<script src="../PPE/js/navbar/jquery.sticky.js"></script>




<script src="../PPE/js/navbar/main.js"></script>
<script src="../PPE/js/navbar/owl.carousel.min.js"></script>
<script src="../PPE/js/navbar/popper.min.js"></script>

<!-- script payment -->

</html>