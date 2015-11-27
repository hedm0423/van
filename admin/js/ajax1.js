// JavaScript Document
/*
var xmlHttp;
function ajaxFunction(){
  try{
   // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
  }
  catch (e){
  // Internet Explorer
    try{
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e){
      try{
         xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
      }
      catch (e){
         alert("您的浏览器不支持AJAX！");
         return false;
      }
    }
  }
  xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState==4) {document.myForm.time.value=xmlHttp.responseText; } }
  xmlHttp.open("GET","time.asp",true);
  xmlHttp.send(null);
}
*/
function showHint1(str){
  if (str.length==0){ 
    document.getElementById("c_id1").value="";
    return;
  }
  xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null){
    alert ("您的浏览器不支持AJAX！");
    return;
  }
  var url="c_se.php";
  url=url+"?q="+str;
  xmlHttp.onreadystatechange=stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
}

function stateChanged() { 

  if (xmlHttp.readyState==4){ 
    document.getElementById("c_id1").innerHTML=xmlHttp.responseText;
  }
}

function GetXmlHttpObject(){
  var xmlHttp=null;
  try{
    // Firefox, Opera 8.0+, Safari
    xmlHttp=new XMLHttpRequest();
  }
  catch (e) {
    // Internet Explorer
    try{
      xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
    }
    catch (e){
      xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
    }
  }
  return xmlHttp;
}

