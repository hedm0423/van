// JavaScript Document
var upH = 13;//向上的箭头的高度
var upW = 9; //向上的箭头的宽度
var downH = 13;//向下的箭头的高度
var downW = 9;//向下的箭头的宽度
var dragH = 170; //滚动条的高度
var dragW = 11; //滚动条的宽度
var scrollH =400; //滚动体的高度
var speed =9; //滚动的速度
var dom = document.getElementById ? true:false;
var nn4 = document.layers ? true:false;
var ie4 = document.all ? true:false;
var mouseY;
var mouseX;
var clickUp = false;
var clickDown = false;
var clickDrag = false;
var clickAbove = false;
var clickBelow = false;
var timer = setTimeout("",500);
var upL;
var upT;
var downL;
var downT;
var dragL;
var dragT;
var rulerL;
var rulerT;
var contentT;
var contentH;
var contentClipH;
var scrollLength;
var startY;
function down(e){
if((document.layers && e.which!=1) || (document.all && event.button!=1)) return true;
getMouse(e);
startY = (mouseY - dragT);
if(mouseX >= upL && (mouseX <= (upL + upW)) && mouseY >= upT && (mouseY <= (upT + upH))){
clickUp = true;
return scrollUp();
}
else if(mouseX >= downL && (mouseX <= (downL + downW)) && mouseY >= downT && (mouseY <= (downT + downH))){
clickDown = true;
return scrollDown();
}
else if(mouseX >= dragL && (mouseX <= (dragL + dragW)) && mouseY >= dragT && (mouseY <= (dragT + dragH))){
clickDrag = true;
return false;
}
else if(mouseX >= dragL && (mouseX <= (dragL + dragW)) && mouseY >= rulerT && (mouseY <= (rulerT + scrollH))){
if(mouseY < dragT){
clickAbove = true;
clickUp = true;
return scrollUp();
}
else{
clickBelow = true;
clickDown = true;
return scrollDown();
}
}
else{
return true;
}
}
function move(e){
if(clickDrag && contentH > contentClipH){
getMouse(e);
dragT = (mouseY - startY);
if(dragT < (rulerT))
dragT = rulerT;
if(dragT > (rulerT + scrollH - dragH))
dragT = (rulerT + scrollH - dragH);
contentT = ((dragT - rulerT)*(1/scrollLength));
contentT = eval('-' + contentT);
moveTo();
if(ie4)
return false;
}
}
function up(){
clearTimeout(timer);
clickUp = false;
clickDown = false;
clickDrag = false;
clickAbove = false;
clickBelow = false;
return true;
}
function getT(){
if(ie4)
contentT = document.all.scrollerContent.style.pixelTop;
else if(nn4)
contentT = document.scrollerContentClip.document.scrollerContent.top;
else if(dom)
contentT = parseInt(document.getElementById("scrollerContent").style.top);
}
function getMouse(e){
if(ie4){
mouseY = event.clientY + document.body.scrollTop;
mouseX = event.clientX + document.body.scrollLeft;
}
else if(nn4 || dom){
mouseY = e.pageY;
mouseX = e.pageX;
}
}
function moveTo(){
if(ie4){
document.all.scrollerContent.style.top = contentT;
document.all.ruler.style.top = dragT;
document.all.drag.style.top = dragT;
}
else if(nn4){
document.scrollerContentClip.document.scrollerContent.top = contentT;
document.ruler.top = dragT;
document.drag.top = dragT;
}
else if(dom){
document.getElementById("scrollerContent").style.top = contentT + "px";
document.getElementById("drag").style.top = dragT + "px";
document.getElementById("ruler").style.top = dragT + "px";
}
}
function scrollUp(){
getT();
if(clickAbove){
if(dragT <= (mouseY-(dragH/2)))
return up();
}
if(clickUp){
if(contentT < 0){
dragT = dragT - (speed*scrollLength);
if(dragT < (rulerT))
dragT = rulerT;
contentT = contentT + speed;
if(contentT > 0)
contentT = 0;
moveTo();
timer = setTimeout("scrollUp()",25);
}
}
return false;
}
function scrollDown(){
getT();
if(clickBelow){
if(dragT >= (mouseY-(dragH/2)))
return up();
}
if(clickDown){
if(contentT > -(contentH - contentClipH)){
dragT = dragT + (speed*scrollLength);
if(dragT > (rulerT + scrollH - dragH))
dragT = (rulerT + scrollH - dragH);
contentT = contentT - speed;
if(contentT < -(contentH - contentClipH))
contentT = -(contentH - contentClipH);
moveTo();
timer = setTimeout("scrollDown()",25);
}
}
return false;
}
function reloadPage(){
location.reload();
}
function eventLoader(){
if(ie4){
upL = document.all.up.style.pixelLeft;
upT = document.all.up.style.pixelTop;
downL = document.all.down.style.pixelLeft;
downT = document.all.down.style.pixelTop;
dragL = document.all.drag.style.pixelLeft;
dragT = document.all.drag.style.pixelTop;
rulerT = document.all.ruler.style.pixelTop;
contentH = parseInt(document.all.scrollerContent.scrollHeight);
contentClipH = parseInt(document.all.scrollerContentClip.style.height);
}
else if(nn4){
upL = document.up.left;
upT = document.up.top;
downL = document.down.left;
downT = document.down.top;
dragL = document.drag.left;
dragT = document.drag.top;
rulerT = document.ruler.top;
contentH = document.scrollerContentClip.document.scrollerContent.clip.bottom;
contentClipH = document.scrollerContentClip.clip.bottom;
}
else if(dom){
upL = parseInt(document.getElementById("up").style.left);
upT = parseInt(document.getElementById("up").style.top);
downL = parseInt(document.getElementById("down").style.left);
downT = parseInt(document.getElementById("down").style.top);
dragL = parseInt(document.getElementById("drag").style.left);
dragT = parseInt(document.getElementById("drag").style.top);
rulerT = parseInt(document.getElementById("ruler").style.top);
contentH = parseInt(document.getElementById("scrollerContent").offsetHeight);
contentClipH = parseInt(document.getElementById("scrollerContentClip").offsetHeight);
document.getElementById("scrollerContent").style.top = 0 + "px";
}
scrollLength = ((scrollH-dragH)/(contentH-contentClipH));
if(nn4){
document.captureEvents(Event.MOUSEDOWN | Event.MOUSEMOVE | Event.MOUSEUP);
window.onresize = reloadPage;
}
document.onmousedown = down;
document.onmousemove = move;
document.onmouseup = up;
}