// JavaScript Document

function showHint1(str){
  if (str.length==0){ 
    document.getElementById("sx1").value="";
    return;
  }
  xmlHttp=GetXmlHttpObject()
  if (xmlHttp==null){
    alert ("您的浏览器不支持AJAX！");
    return;
  }
  var url="sx.php";
  url=url+"?q="+str;
  xmlHttp.onreadystatechange=stateChanged;
  xmlHttp.open("GET",url,true);
  xmlHttp.send(null);
  alert(str);
}

function stateChanged() { 
  alert(str);
  if (xmlHttp.readyState==4){ 
    document.getElementById("sx1").value=xmlHttp.responseText;
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

