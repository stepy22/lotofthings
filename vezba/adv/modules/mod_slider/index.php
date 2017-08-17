<link rel="stylesheet" href="resources/js/nivo-slider/nivo-slider.css" type="text/css" />
<link rel="stylesheet" href="resources/js/nivo-slider/themes/default/default.css" type="text/css" />
<script type="text/javascript" src="resources/js/nivo-slider/jquery.nivo.slider.js"></script>
<div class="slider-wrapper theme-default">
<div class="ribbon"></div>
<div id="slider" class="nivoSlider">
<?php 
  if(file_exists("cache/slider_images")){
	echo file_get_contents("cache/slider_images");
  } else {
  ob_start();
  $dh = opendir("resources/images/slider");
  while(($file=readdir($dh))!==false){
		if($file=="."||$file==".."){
			continue;
		}
		echo "<img src='resources/images/slider/{$file}' />";
  }
  $slides = ob_get_contents();
  ob_end_clean();
  file_put_contents("cache/slider_images",$slides);
  echo $slides;
  }
?>
</div>
</div>
<script type="text/javascript" >
$("#slider").nivoSlider();
</script>