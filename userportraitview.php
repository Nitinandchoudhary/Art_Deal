
<!DOCTYPE HTML>
<html>
	<head>
		<title>Art Deal.com</title>
		<link rel="icon" href="images/artdeallogo.png" type="image/png">
		<link href="css/style.css" rel='stylesheet' type='text/css' />

		
<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<!----webfonts---->
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
		<!----//webfonts---->
		<!----start-alert-scroller---->
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript" src="js/jquery.easy-ticker.js"></script>
		<script type="text/javascript">
		$(document).ready(function(){
			$('#demo').hide();
			$('.vticker').easyTicker();
		});
		</script>
		<!----start-alert-scroller---->
		<!-- start menu -->
	
		<!-- //End menu -->
		<!---slider---->

		<!---move-top-top---->
		<script type="text/javascript" src="js/move-top.js"></script>
		<script type="text/javascript" src="js/easing.js"></script>
		<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1200);
				});
			});
		</script>
		<!---//move-top-top---->
		<style >
	#newartist{
	width: 160px;
	height: 200px;
	border: 5px solid white;
	border-radius: 100px;
	}
	
#s123 {
	background-color: white;
	border-radius: 3px;
   border: 2px solid grey;
   height: 30px;
   width: 100px;
   cursor: pointer;
}



.card {
  box-shadow: 0 4px 4px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 1px rgba(0, 0, 0, 0.19)
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

/*gallery styles */

.row > .column {
  padding: 0 8px;
}

.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Create four equal columns that floats next to eachother */
.column {
  float: left;
  width: 23%;
}


img.hover-shadow {
  transition: 0.3s
}
a.hover-shadow {
  transition: 0.3s
}
.hover-shadow:hover {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 10px rgba(0, 0, 0, 0.19)
}

</style>

	</head>
	<body>
	
		<!-- The header starts here-->
			<!---start-header---->
	<?php include('artistheader.php'); ?>
		<!-- the header ends here-->
<div class="clear:both"></div>
<?php
include('dbcon.php');
$varpwtuid=$_GET['pwtuid'];
$varpwtid=$_GET['pwtid'];
$query=mysql_query("select * from user where user_id='$varpwtuid'");
if ($ur=mysql_fetch_array($query)) {
	$ufname=$ur['first_name'];
	$ulname=$ur['last_name'];
	$uemail=$ur['emailid'];
	$uaddr=$ur['address'];
	$ucity=$ur['city'];
	$uprofile=$ur['profile_img'];
	$query1=mysql_query("select * from pwt where id='$varpwtid'");
	if ($pwtr=mysql_fetch_array($query1)) {
		$vartype=$pwtr['type'];
		$varimg=$pwtr['user_img'];
		$varprice=$pwtr['price'];
	}
}
?>
<div class="wrap" style="width:90%">
	<div class="twogrid" style="width: 50%;float: left;height: 100%">
		<img src="userportraitimgs/<?php echo $varimg ?>">
	</div>
	<div class="twogrid" style="width: 50%;float: left">
		<form method="post">
		<?php  
if ($uprofile=='') {

  echo '<div align="center">
<img src="iiii.png" style="width: 125px;height: 150px;
border: 5px solid white;border-radius: 100px">
<p style="color:grey;font-size:22px">'.$ufname.' '.$ulname.'</p></div>
</div>';
}
else
{
  echo '<div align="center">
<img src="userprofiles/'.$uprofile.'" style="width: 125px;height: 150px;
border: 5px solid white;border-radius: 100px">
<p style="color:grey;font-size:22px">'.$ufname.' '.$ulname.'</p></div>
</div>';
}
?>
<br>
<br>
<br>
<p style="color:grey;font-size:18px;margin-top: 12%;" align="center">Portrait Type: <?php echo $vartype; ?></p>
<p style="color:grey;font-size:18px;" align="center">Price you charge: <?php echo $varprice; ?></p>
<p style="color:grey;font-size:18px;" align="center">Client Address: <?php echo $uaddr; ?></p>
<p style="color:grey;font-size:18px;" align="center">Client City: <?php echo $ucity; ?></p>
<br>
<input type="submit" id="s123" name="paccept" id="acc" value="Accept" style="float: right;margin-right: 40px" >
<input type="submit" id="s123" name="preject" style="float: right;margin-right: 40px" value="Reject">
</form>
<form method="get">
<?php
include('dbcon.php');
$i_d=$_GET['pwtid'];
$oq=mysql_query("select * from pwt where id='$i_d' and status='finalaccept'");
$rr = mysql_fetch_array($oq);
if ($rr) {
	?>
	<a href="userportraitimgs/<?php echo $varimg ?>"  style="float:right;color: black;margin-right: 40px" download><i class="fa fa-picture-o" aria-hidden="true"> Download</i></a>
	<?php
}
?></form>
	</div>
</div>
<br>
<br>
<br clear="both">
<?php
if (isset($_POST['paccept'])) 
{
include('dbcon.php');
$varpwtuid=$_GET['pwtuid'];
$artid=$_SESSION['login_artist'];
$i_d=$_GET['pwtid'];
$qqqqq11=mysql_query("update pwt set status='finalaccept' where id='$i_d'") or die(mysql_error());
$q=mysql_query("INSERT INTO `orders`(`user_id`,`artist_id`,`pwtid`, `paintings_id`, `ordered_date`, `status`,`rating`,`comment`)
VALUES('$varpwtuid','$artid','$i_d','',now(),'APaccepted','','')") or die(mysql_error());
?>
<script type="text/javascript">
	alert('The portrait request is accepted. Please deliver the painting to the client address. And download the image');
	window.location='userportraitview.php?pwtuid=<?php echo $varpwtuid; ?>&&pwtid=<?php echo $varpwtid ?>';
</script><?php


}
?>
<?php
if (isset($_POST['preject'])) 
{
include('dbcon.php');
$i_d=$_GET['pwtid'];
$q=mysql_query("update pwt set status='APreject' where id='$i_d'") or die(mysql_error());
}

?>
<!---start-footer---->

		<!---//End-footer---->
				</body>
				</html>

