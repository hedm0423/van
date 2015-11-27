<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>jQuery UI Slider</title>
    <link rel="stylesheet" type="text/css" href="js/jqueryui/css/smoothness/jquery-ui-1.7.2.custom.css">
    <link rel="stylesheet" type="text/css" href="js/slider.css">
<style>
img{ width:150px; height:150px;}
body{ background:#e7e7e7}
</style>	
  </head>
  <body style="margin:0; padding:0;">
    <div id="sliderContent" class="ui-corner-all">	
      <h2>Pro</h2>		
      <div class="viewer ui-corner-all">
        <div class="content-conveyor ui-helper-clearfix">

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/omega.jpg" alt="Omega Nebula">
            
          </div>

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/rosette.jpg" alt="Rosette Nebula">
            
          </div>
          
          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/ring.jpg" alt="Ring Nebula">
            
          </div>

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/tarantula.jpg" alt="Tarantula Nebula">
            
          </div>

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/triangulum.jpg" alt="Triangulum Nebula">
            
          </div>

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/eagle.jpg" alt="Eagle Nebula">
            
          </div>

          <div class="item">
            <h2>&nbsp;</h2>
            <img src="js/images/crab.jpg" alt="Crab Nebula">
            
          </div>
          
        </div>
      </div>
      <div id="slider"></div>
    </div>
    <script type="text/javascript" src="js/jqueryui/js/jquery-1.3.2.min.js"></script>
    <script type="text/javascript" src="js/jqueryui/js/jquery-ui-1.7.2.custom.min.js"></script>
    <script type="text/javascript">
      $(function() {
        
		//vars
		var conveyor = $(".content-conveyor", $("#sliderContent")),
		item = $(".item", $("#sliderContent"));
		
		//set length of conveyor
		conveyor.css("width", item.length * parseInt(item.css("width")));
				
        //config
        var sliderOpts = {
		  max: (item.length * parseInt(item.css("width"))) - parseInt($(".viewer", $("#sliderContent")).css("width")),
          slide: function(e, ui) { 
            conveyor.css("left", "-" + ui.value + "px");
          }
        };

        //create slider
        $("#slider").slider(sliderOpts);
      });
    </script>
  </body>
</html>