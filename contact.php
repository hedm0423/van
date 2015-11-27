<?php
include ("head_contact.php");
?>
	  
<div class="zp" style="margin-top:20px;margin-bottom:0; ">	  
<div class="contact_table">
<?php
$sql="select * from $news_table where news_class='33' order by id desc limit 0,1";
$res=mysqli_query($conn,$sql);
$rows=mysqli_fetch_assoc($res);
if($rows['cont'])echo $rows['cont'];else{
?>
<p>电话：TEL / 33359528 82840620<br />
ADD / 深圳福田区岗厦嘉麟豪庭A座28楼<br />
HTTP / www.fangu.com<br />
QQ / 276405207<br />
E-MAIL / astro@foxmail.com<br />
MSN /</p>
<?php }?>
</div>
</div>

<br />

<div class="contact_img" >
<img src="images/map1.jpg" />
</div>




<div class="contact_img" >
<img src="images/map2.jpg" />
</div>

<div class="contact_img" >
<img src="images/map3.jpg" />
</div>

<?php
include ("foot.php");
?>
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src='" + _bdhmProtocol + "hm.baidu.com/h.js%3Fd483a0bdfa7cd646dc6c3d73f0c438f2' type='text/javascript'%3E%3C/script%3E"));
</script>