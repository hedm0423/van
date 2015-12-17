<?php
  error_reporting(0); 
  session_start(); 
  $username=$_SESSION['username'];
  $login_time=$_SESSION['time'];
  include('../conf/conn.php');
  if (strlen($username)=='0')
    require "checkadmin.php";
  else{}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>后台管理</title>
<LINK href="css/css.css" type=text/css rel=stylesheet>
<SCRIPT src="js/index.js" type=text/javascript></SCRIPT>
<SCRIPT src="../js/fun.js" type=text/javascript></SCRIPT>
<script language="JavaScript">
<!--
var MenuStatus=1;
function HideMenu()
{
        if (MenuStatus==0)
        {
                document.all["leftFrame"].style.display="";
                document.all["BtnHideImg"].src="./images/opens.gif";
                document.all["BtnHide"].style.cursor="w-resize";
                MenuStatus=1;
        }else{
                document.all["leftFrame"].style.display="none";
                document.all["BtnHideImg"].src="./images/closes.gif";
                document.all["BtnHide"].style.cursor="e-resize";
                MenuStatus=0;
        }
}
function HideMenu1(){
  document.all["BtnHide"].style.cursor="w-resize";
}
-->
</script>
</head>

<body onload="settime()" ondragstart="window.event.returnValue=false;" oncontextmenu="window.event.returnValue=false;" onselectstart="event.returnValue=false;" onunload="cleartime()">
<div >
<table width="100%" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="50%" height="63" align="left">
		<div id="top">
          <div style="text-align:left;">
            <div class="logo"></div>
            <div style="float:left;width:208px;height:45px; margin-top:21px; margin-left:117px; color:#FFFFFF;"> <br />
                欢迎管理登陆：<?php echo $username?><br />
				登陆时间：<?php echo $login_time?>
            </div>
            <div style="float:right;width:233px; height:52px; padding-top:14px; margin-right:29px; color:#FFFFFF; text-align:center;">
              <div style="width:233px; text-align:center;">
                <ul style=" list-style:none; width:224px; text-align:center ">
                  <li style="float:left; background:url(images/ico_home.gif)  no-repeat; width:80px; height:18px; display:block;  padding-top:3px;">
                    <div style="margin-left:10px"><a href="#" class="mycolor1" onclick="window.open('../index.php','','');">网站预览</a></div>
                  </li>
                  <li style="float:left;background:url(images/ico_key.gif) no-repeat; width:57px; height:18px;display:block;padding-top:3px;">
                    <div style="margin-left:5px"><a href="#" class="mycolor1" onclick="frame_change('pasw.php')">密码</a></div>
                  </li>
                </ul>
              </div>
              <div style="width:219px;"><p id="xwgtime">Time</p></div>
            </div>
          </div>
        </div></td>
        </tr>
    </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td align="center" valign="top" bgcolor="#4B4B4B">
		  <div style="margin:0">
		    <iframe id="leftFrame" width=95 style="Z-INDEX: 0; VISIBILITY: inherit; WIDTH: 100px; HEIGHT: 490px;margin:0; padding:0;" name="leftFrame" src="Left.php" frameborder=0   scrolling=no valign=top></iframe>
          </div>
          </td>
		  <td width=10 height="100%" style="WIDTH: 10pt height:100%" id="BtnHide" onClick="HideMenu()" background="./images/04.gif">
		    <img src="./images/opens.gif" id="BtnHideImg"  height="26"></td>
          <td width="99%" height="490" valign="top" bgcolor="#FFFFFF" class="table_1">
		  <iframe width="100%" height="490" frameborder="0" scrolling="auto" name="frame1" id="frame" src="nav.php" ></iframe></td>
        </tr>
      </table>
      <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
		  <td width="42%" height="23" align="right" style=" background:#52AEDE;color:#464646">&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td width="58%" align="left" background="images/bottom_bg1.jpg" style="background:#52AEDE;color:#ffffff">
		    <table border="0" cellspacing="0" cellpadding="0">
              <tr><td><!--技术支持：xxxxx--></td></tr></table></td>
        </tr>
      </table></td>
  </tr>
</table>
</div>
</body>
</html>