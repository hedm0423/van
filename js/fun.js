// JavaScript Document

/*改变frame地址*/
function frame_change(link_1){
  top.frame1.location.href=link_1;
}




/*改变单元格背景色*/
function fmenu(id){
 id.style.backgroundColor='#BDD5F7'
}
function outmenu(id){
 id.style.backgroundColor='#F8F8F8'
}



/*当前页面刷新到其他页面*/
function refresh_now(url){
  window.location.href=url;
}


/*层显示与隐藏*/
function show_div(name1,name2){
  document.getElementById(name1).style.display='none';
  document.getElementById(name2).style.display='block';
}

function show_div1(name1,name2,name3){
  document.getElementById(name1).style.display='block';
  document.getElementById(name2).style.display='none';
  document.getElementById(name3).style.display='none';
}


function show_class(name1,name2){
  document.getElementById(name1).className='title_2';
  document.getElementById(name2).className='title_3';
}

function show_class1(name1,name2,name3){
  document.getElementById(name1).className='title_2';
  document.getElementById(name2).className='title_3';
  document.getElementById(name3).className='title_3';
}


/*返回上一页*/
function back_up(){
  history.go(-1);
}


function dele(url,cs){
  url1=url+"?bs=dele&did="+cs;
  if (window.confirm('你确定要删除吗？')){
    args=true;
	refresh_now(url1);
  }
  else {args=false;};
}

















