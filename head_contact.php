<?php include ("head1.php");?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>
<?php
 $last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
 if ($last_nav=="contact.php")$jb_title1= "找到我们";
 if ($last_nav=="guestbook.php")$jb_title1= "在线留言";
 if($jb_title1)echo $jb_title1."-";
?>
联系我们-<?php if ($jb_title)echo $jb_title;else echo "梵谷视觉";?></title>
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
	  <div class="banner_contact"></div>
	  <div id="nav">

	  
	    <ul>
		  <li><a href="contact.php" <?php if ($last_nav=="contact.php")echo "class='current'";?>> 找到我们<br><span class="about_2">MAP</span></a></li>
		  <li class="about_1"><a href="guestbook.php" <?php if ($last_nav=="guestbook.php")echo "class='current'";?>>在线留言<br><span class="about_2">ONLINE ATTENTIVE</span></a></li>
		  
		</ul>
	  </div>
	  <div id="now_position"><a href="index.php">首页</a> &gt; <a href="contact.php">联系我们</a> &gt; 
<?php
if ($last_nav=="contact.php")echo '<a href="contact.php">找到我们</a>';
if ($last_nav=="guestbook.php")echo '<a href="guestbook.php">在线留言</a>';
?>	  
	  </div>
    </div>
		
	<div id="cont">
	  
	  