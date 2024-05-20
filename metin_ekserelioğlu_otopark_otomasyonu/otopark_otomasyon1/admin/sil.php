<?php include_once 'baglan.php' ?>
<?php 
include("header.php");


if ($_GET) 
{


if ($db->query("DELETE FROM arac_kayit WHERE arac_id =".(int)$_GET['id'])) 
{
    header("location:parkedenarac.php"); 
}
}
?>
<?php 
include("header.php");


if ($_GET) 
{


if ($db->query("DELETE FROM abonelik WHERE abone_id =".(int)$_GET['id'])) 
{
    header("location:aboneler.php"); 
}
}
?>