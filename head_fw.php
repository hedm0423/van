<?php include ("head1.php");
if($id){
$sql="select * from $news_table where id='$id' ";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_array($res);
$jb_title2=$rows['title'];
}
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($jb_title2){echo $jb_title2."-";}
$last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
if ($last_nav=="quote.php" || substr($last_nav,0,9)=="quote.php")$jb_title1 =  '最新活动';
if ($last_nav=="scenic.php" || substr($last_nav,0,10)=="scenic.php")$jb_title1 =  '景点介绍';
if ($last_nav=="price.php" || substr($last_nav,0,9)=="price.php")$jb_title1 =  '价格体系';
echo $jb_title1;
?>-<?php if ($jb_title)echo $jb_title;else echo "梵谷视觉";?></title>
<meta http-equiv='keywords' content="<?php echo $jb_gjz;?>" />
<meta http-equiv="description" content="<?php echo $jb_ms;?>" />
<link href="css/css.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="js/flash.js"></script>

</head>

<body>
<?php include ("qq.php")?>
<?php include ("left.php");?>

<div id="right">  
  <div id="main">
    <div class="top">
	  <div class="banner_services"></div>
	  <div id="nav">
<?php
 $last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
 //echo $last_nav;
?>
	    <ul>
		  <!--<li><a href="promotion.php">最新活动<br><span class="about_2">PROMOTION</span></a></li>-->
		  <li><a href="price.php" <?php if ($last_nav=="price.php")echo "class='current'";?>>价格体系<br><span class="about_2">PRICE</a></span></li>
		  <li><a href="scenic.php" <?php if ($last_nav=="scenic.php")echo "class='current'";?>>景点介绍<br><span class="about_2">SCENIC</a></span></li>
		  <li><a href="quote.php" <?php if ($last_nav=="quote.php")echo "class='current'";?>>最新活动<br><span class="about_2">PROMOTION</span></a></li>
		</ul>
	  </div>
	  <div id="now_position">
	  <a href="index.php">首页</a> &gt; <a href="quote.php">服务报价</a> &gt; 
<?php
if ($last_nav=="quote.php" || substr($last_nav,0,9)=="quote.php")echo '<a href="quote.php">最新活动</a>';
if ($last_nav=="scenic.php" || substr($last_nav,0,10)=="scenic.php")echo '<a href="scenic.php">景点介绍</a>';
if ($last_nav=="price.php" || substr($last_nav,0,9)=="price.php")echo '<a href="price.php">价格体系</a>';
?>	  
	  </div>
    </div>
		
	<div id="cont">

	  