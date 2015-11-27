<?php include ("head1.php");
$sql="select * from $news_table where id='$id' ";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php  
if($jb_title2){echo $jb_title2."-";}
$last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
if ($pro_class)$jb_title1 =  name($nav_table,$pro_class);
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
	  <div class="banner_show"></div>
	  <div id="nav">
<?php
 $last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
?>
	  
	    <ul>
		  <li><a href="show.php?pro_class=17"<?php if ($pro_class=="17")echo "class='current'";?>>婚纱<br><span class="about_2">WEDDING</span></a></li>
		  <li class="about_1"><a href="show.php?pro_class=18"<?php if ($pro_class=="18")echo "class='current'";?>>时尚<br><span class="about_2">FASHION</span></a></li>
		  <li><a href="show.php?pro_class=19"<?php if ($pro_class=="19")echo "class='current'";?>>广告<br><span class="about_2">AD</span></a></li>
		  
		</ul>
	  </div>
	  <div id="now_position" style="width:95%;">
	  <div style="float:left;"><?php if ($id){}else echo "点击缩略图查看详细信息";?></div>
	  <div>
	  <a href="index.php">首页</a>&gt; <a href="show.php">作品展示</a> &gt; 
<?php
if ($pro_class=="17")echo '<a href="show.php?pro_class=17">婚纱</a>';
elseif ($pro_class=="18")echo '<a href="show.php?pro_class=18">时尚</a>';
elseif ($pro_class=="19")echo '<a href="show.php?pro_class=19">广告</a>';
else{echo "全部";}
?>	  
		
	  </div>
	  </div>
    </div>
		
	<div id="cont" >

	  