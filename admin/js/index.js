// JavaScript Document
function show_div(name1,name2,name3){
  document.getElementById(name2).style.display='none';
  document.getElementById(name3).style.display='none';
  document.getElementById(name1).style.display='block';
}
function settime()
{
var myyear,mymonth,myweek,myday,mytime,mymin,myhour,mysec;
var mydate=new Date();
myyear=mydate.getFullYear();
mymonth=mydate.getMonth()+1;
myday=mydate.getDate();
myhour=mydate.getHours();
mymin=mydate.getMinutes();
mysec=mydate.getSeconds();
mytime="今天是:"+myyear+"年"+mymonth+"月"+myday+"日"+myhour+":"+mymin+":"+mysec;
document.getElementById('xwgtime').innerHTML=mytime;
setTimeout('settime()',1000);
}

function cleartime()
{
clearTimeout()
}