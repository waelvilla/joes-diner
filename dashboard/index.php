<?php
include 'db.php';
include 'header.php';
$active=isset($_GET['active']) ? $_GET['active'] : '';
$sidebar_categories=[
"Dashboard" =>"home",
"Orders" => "file",
"Products" => "shopping-cart",
"Categories" => "archive",
"Customers" => "users",
"Reports" => "bar-chart-2",
"Integrations" => "layers"
];

?>


<?php 
include 'dash-nav.php';
include 'sidebar.php';
if($active){
$active=strtolower($active);
include "pages/$active.php";	
}

?>


<?php
 include 'footer.php'; 
 ?>
