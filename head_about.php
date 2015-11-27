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
<title>
<?php  
	if($jb_title2)
	{echo $jb_title2."-";}
	$last_nav=substr(strrchr($_SERVER["REQUEST_URI"], "/"), 1);
	if ($last_nav=="about.php")$jb_title1 =  '品牌介绍';
	if ($last_nav=="team.php")$jb_title1 =  '团队介绍';
	if ($last_nav=="space.php")$jb_title1 =  '环境空间';
	if ($last_nav=="news.php" || substr($last_nav,0,8)=="news.php")$jb_title1 =  '最新动态';
	if ($last_nav=="recruitivbnt.php" || substr($last_nav,0,16)=="recruitivbnt.php")$jb_title1 =  '招贤纳才';
	echo $jb_title1;
?>-<?php if ($jb_title)echo $jb_title;else echo "梵谷视觉";?></title>
<meta http-equiv='keywords' content="<?php echo $jb_gjz;?>" />
<meta http-equiv="description" content="<?php echo $jb_ms;?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="css/css.css" type=text/css rel=stylesheet>
<link href="css/master.css" type=text/css rel=stylesheet>
<script type="text/javascript" src="js/flash.js"></script>


</head>

<body>
<?php include ("qq.php")?>
<?php include ("left.php");?>

<div id="right">  
  <div id="main">
    <div class="top">
	  <div class="banner_about"></div>
	  <div id="nav">
	    <ul>
		  <li><a href="about.php" <?php if ($last_nav=="about.php")echo "class='current'";?>>品牌介绍<br><span class="about_2">INTRODUCTION</span></a></li>
		  <li class="about_1"><a href="team.php" <?php if ($last_nav=="team.php")echo "class='current'";?>>团队介绍<br><span class="about_2">STAFF INTRODUCE</span></a></li>
		  <li><a href="space.php" <?php if ($last_nav=="space.php")echo "class='current'";?>>环境空间<br><span class="about_2">TOP SAFE</span></a></li>
		  <li class="about_1"><a href="news.php" <?php if ($last_nav=="news.php" || substr($last_nav,0,8)=="news.php")echo "class='current'";?>>最新动态<br><span class="about_2">RECENT NEWS</span></a></li>
		  <li><a href="recruitivbnt.php" <?php if ($last_nav=="recruitivbnt.php" || substr($last_nav,0,16)=="recruitivbnt.php")echo "class='current'";?>>招贤纳才<br><span class="about_2">RECRUITIVBNT</span></a></li>
		  
		</ul>
	  </div>
	  <div id="now_position">
	  <a href="index.php">首页</a> &gt; <a href="about.php">关于我们</a> &gt; 
<?php
if ($last_nav=="about.php")echo '<a href="about.php">品牌介绍</a>';
if ($last_nav=="team.php")echo '<a href="team.php">团队介绍</a>';
if ($last_nav=="space.php")echo '<a href="space.php">环境空间</a>';
if ($last_nav=="news.php" || substr($last_nav,0,8)=="news.php")echo '<a href="news.php">最新动态</a>';
if ($last_nav=="recruitivbnt.php" || substr($last_nav,0,16)=="recruitivbnt.php")echo '<a href="recruitivbnt.php">招贤纳才</a>';
?>	  
	  
	  
	  </div>
    </div>
		
	<div id="cont">
	  
	  