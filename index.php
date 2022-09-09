

<?php 
session_start();
if (!isset($_SESSION['staff_id'])) {
  header('Location: login.php');
}

?>

<link rel="stylesheet" href="style.css">
<link rel="stylesheet" href="fa-icon/css/font-awesome.min.css">
<link rel="stylesheet" href="additional-effects.css">
<link rel="stylesheet" href="fa-icon/css/font-awesome.min.css">
<img src="images/gkgcm-crest.png" alt="" width="5%" style="margin-left: 46pc;">
<h1 style="text-align:center; color: whitesmoke;"><b style="color: skyblue;">GHANA</b> KOREA GERMANY <b style="color: skyblue;">COMPUTER</b> SCHOOL</h1>

<h5 style="text-align:center; color: whitesmoke; text-transform: uppercase; font-size: 25px;"><?php if (isset($_SESSION['staff_name'])) {
  echo $_SESSION['staff_name'];
} ?></h5><br><h6 style="text-align:center; color: lightskyblue; text-transform: uppercase; margin-top: -60px; text-shadow: 1px 1px whitesmoke; font-size: 20px;"><?php if (isset($_SESSION['privilege'])) {
  echo $_SESSION['privilege'];
} ?></h6>
<!-- POP UP MENU -->

<div class="top-bar" style="">
<li><a href="instruction.php" title="user manual"> <i class="fa fa-home"></i> </a></li>
<li><a href="page-configuration.php" title="configuration"> <i class="fa fa-cog"></i> </a></li>
</div>
<br><br>
<br><br>
<?php
  if ($_SESSION['privilege']=='Director' OR $_SESSION['privilege']=='Administrator') {
?>
<nav class="menu">
  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
  <label class="menu-open-button" for="menu-open"> <span class="lines line-1"></span> <span class="lines line-2"></span> <span class="lines line-3"></span></label>
  <a href="logout.php" class="menu-item item-1"  title="logout"> <i style="margin-top: 30%;" class="fa fa-power-off"></i></a>
  <a href="http://127.0.0.1/gkgcm-school-system" class="menu-item item-2"  title="school management"> <i class="fa fa-suitcase" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-report" class="menu-item item-3"  title="staff report"> <i class="fa fa-book" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-inventory" class="menu-item item-4"  title="school inventory"> <i class="fa fa-list-alt" style="margin-top: 30%;"></i> </a>
  <a href="register.php" class="menu-item item-5"  title="staff options"> <i class="fa fa-users" style="margin-top: 30%;"></i> </a>
  <a href="http://192.168.1.3" class="menu-item item-6"  title="old management system"> <i class="fa fa-archive" style="margin-top: 30%;"></i> </a>
</nav>
<?php  }elseif ($_SESSION['privilege']=='Accounts Clerk' OR $_SESSION['privilege']=='Accounts Manager') {
?>
<nav class="menu">
  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
  <label class="menu-open-button" for="menu-open"> <span class="lines line-1"></span> <span class="lines line-2"></span> <span class="lines line-3"></span></label>
  <a href="logout.php" class="menu-item item-1"  title="logout"> <i style="margin-top: 30%;" class="fa fa-power-off"></i></a>
  <a href="http://127.0.0.1/gkgcm-school-system" class="menu-item item-2"  title="school management"> <i class="fa fa-suitcase" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-report" class="menu-item item-3"  title="staff report"> <i class="fa fa-book" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-inventory" class="menu-item item-4"  title="school inventory"> <i class="fa fa-list-alt" style="margin-top: 30%;"></i> </a>
  <!-- <a href="register.php" class="menu-item item-5"  title="staff options"> <i class="fa fa-users" style="margin-top: 30%;"></i> </a> -->
  <a href="http://192.168.1.3" class="menu-item item-6"  title="old management system"> <i class="fa fa-archive" style="margin-top: 30%;"></i> </a>
</nav>
<?php }else{
?>
  <nav class="menu">
  <input type="checkbox" href="#" class="menu-open" name="menu-open" id="menu-open" />
  <label class="menu-open-button" for="menu-open"> <span class="lines line-1"></span> <span class="lines line-2"></span> <span class="lines line-3"></span></label>
  <a href="logout.php" class="menu-item item-2"  title="logout"> <i class="fa fa-power-off" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-school-system" class="menu-item item-1"  title="management"> <i style="margin-top: 30%;" class="fa fa-suitcase"></i></a>
  <a href="http://127.0.0.1/gkgcm-report" class="menu-item item-3" title="staff report"> <i class="fa fa-book" style="margin-top: 30%;"></i> </a>
  <a href="http://127.0.0.1/gkgcm-inventory" class="menu-item item-4"  title="school inventory"> <i class="fa fa-list-alt" style="margin-top: 30%;"></i> </a>
  
  <!-- <a href="settings" class="menu-item item-6"  title="My Settings"> <i class="fa fa-cog" style="margin-top: 30%;"></i> </a> -->
</nav>

<?php } ?>
<style>
.fa { font-size: 120%; }
</style>