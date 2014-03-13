<script type="text/javascript" src="js/swfobject.js"></script>
<!--<video width="320" height="240" controls="controls">
  <source src="video_completo.mp4" type="video/mp4">
  <source src="video_completo.ogv" type="video/ogg">
  <source src="video_completo.webm" type="video/webm">
Your browser does not support the video tag.
</video> -->
<?php
function getWidthHeight($txt){
	$llave = strpos ($txt, '}');
	$txt = substr($txt, 0, $llave );
	$h = strpos ($txt, 'h=');
	$w = strpos ($txt, 'w=');
	$separator = strpos ($txt, '&h=');
	$ew = $separator - $w - 2;
	$width = substr($txt, $w + 2, $ew);
	$height = substr($txt, $h + 2, strlen($txt));
	$a = array();
	$a[0] = $width;
	$a[1] = $height;
	return $a;
} 

function getTagVideo($c, $find, $find2)
{
	$res = strpos ($c, $find);
	$res2 = strpos ($c, $find2);
	if($res !== FALSE){
		$ini = $res + strlen($find);
		$end = $res2 - $ini;
		
		$txt = substr($c, $res, $res2 - $res + strlen($find2) );
		$temp =  substr($c, $ini, $end );
		$llave = strpos ($temp, '}');
		$ini = $ini + $llave + 1;
		$end = $res2 - $ini;
		$a = getWidthHeight($temp);
		
		$id_video = substr($c, $ini, $end );
		$video = Video::model()->findByAttributes(array('name_real'=>$id_video));
		if($video)
		{
			if(isset($video->mp4))
			{
				//echo $video->mp4."<br />";
			}
			if(isset($video->ogg))
			{
				//echo $video->ogg."<br />";
			}
			if(isset($video->webm))
			{
				//echo $video->webm."<br />";
			}
			if(isset($video->flv))
			{
				//echo $video->flv."<br />";
			}
			
		}
		$replace = "<video src='{$id_video}' width='{$a[0]}' height='{$a[1]}' ></video>";
		$replace = htmlspecialchars($replace, ENT_QUOTES);
		$patrones = array();
		$patrones[0] = '/'.$txt.'/';
		$sustituciones = array();
		$sustituciones[0] = $replace;
		return preg_replace($patrones, $sustituciones, $c);
	}else{
		return false;
	}
	
}

function getTagAudio($c, $find, $find2)
{
	$res = strpos ($c, $find);
	$res2 = strpos ($c, $find2);
	if($res !== FALSE){
		$ini = $res + strlen($find);
		$end = $res2 - $ini;
		$id_audio = substr($c, $ini, $end );
		$txt = $find.$id_audio.$find2;
		$audio = Audio::model()->findByAttributes(array('name_real'=>$id_audio));
		if($audio)
		{
			if(isset($audio->mp3))
			{
				//echo $audio->mp3."<br />";
			}
			if(isset($audio->ogg))
			{
				//echo $audio->ogg."<br />";
			}
			if(isset($audio->wav))
			{
				//echo $audio->wav."<br />";
			}
		}
		$replace = "<audio src='{$id_audio}' ></audio>";
		$replace = htmlspecialchars($replace, ENT_QUOTES);
		$patrones = array();
		$patrones[0] = '/'.$txt.'/';
		$sustituciones = array();
		$sustituciones[0] = $replace;
		return preg_replace($patrones, $sustituciones, $c);
	}else{
		return false;
	}
	
}

function getTagPDF($c, $find, $find2)
{
	$res = strpos ($c, $find);
	$res2 = strpos ($c, $find2);
	if($res !== FALSE){
		$ini = $res + strlen($find);
		$end = $res2 - $ini;
		$id_pdf = substr($c, $ini, $end );
		$txt = $find.$id_pdf.$find2;
		$pdf = PDF::model()->findByAttributes(array('name_real'=>$id_pdf));
		$replace = "";
		if($pdf)
		{
			$replace = "<pdf src='{$pdf->pdf}' ></pdf>";
		}
		$replace = htmlspecialchars($replace, ENT_QUOTES);
		$patrones = array();
		$patrones[0] = '/'.$txt.'/';
		$sustituciones = array();
		$sustituciones[0] = $replace;
		return preg_replace($patrones, $sustituciones, $c);
	}else{
		return false;
	}
	
}

function getTagImage($c, $find, $find2)
{
	$res = strpos ($c, $find);
	$res2 = strpos ($c, $find2);
	if($res !== FALSE){
		$ini = $res + strlen($find);
		$end = $res2 - $ini;
		$t1 = substr($c, $res, $res2 - $res + strlen($find2) );
		$temp =  substr($c, $ini, $end );
		$llave = strpos ($temp, '}');
		$ini = $ini + $llave + 1;
		$end = $res2 - $ini;
		$a = getWidthHeight($temp);
		$id_image = substr($c, $ini, $end );
		$image = Image::model()->findByAttributes(array('name_real'=>$id_image));
		$replace = "";
		if($image)
		{
			$replace .= "<img src='{$image->image}' width='{$a[0]}' height='{$a[1]}' />";
		}
		//$replace = htmlspecialchars($replace, ENT_QUOTES);
		$patrones = array();
		$patrones[0] = '/'.$t1.'/';
		$sustituciones = array();
		$sustituciones[0] = $replace;
		$f = preg_replace($patrones, $sustituciones, $c);
		return $f;
	}else{
		return false;
	}
}

function getTagSwf($c, $find, $find2)
{
	$res = strpos ($c, $find);
	$res2 = strpos ($c, $find2);
	if($res !== FALSE){
		$ini = $res + strlen($find);
		$end = $res2 - $ini;
		$t1 = substr($c, $res, $res2 - $res + strlen($find2) );
		$temp =  substr($c, $ini, $end );
		$llave = strpos ($temp, '}');
		$ini = $ini + $llave + 1;
		$end = $res2 - $ini;
		$a = getWidthHeight($temp);
		$id_swf = substr($c, $ini, $end );
		$swf = SWF::model()->findByAttributes(array('name_real'=>$id_swf));
		$replace = "";
		if($swf)
		{
			$replace = "<script type='text/javascript'>swfobject.embedSWF('{$swf->swf}', '{$id_swf}', '{$a[0]}', '$a[1]', '9.0.0', 'expressInstall.swf');</script>";
			$replace .= "<div id='{$id_swf}' ></div>";
		}
		$patrones = array();
		$patrones[0] = '/'.$t1.'/';
		$sustituciones = array();
		$sustituciones[0] = $replace;
		$f = preg_replace($patrones, $sustituciones, $c);
		return $f;
	}else{
		return false;
	}
	
}





	$content = "Codigo {video w=1024&h=700}videos2{-video}{video w=100&h=200}videos3{-video} {imagenes w=250&h=250}imagenes2{-imagenes}  {audio}audios3{-audio} {pdf}pdf1{-pdf}y aqui va otro video Codigo <iframe src='http://player.vimeo.com/video/15704652' width='640' height='385' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> {imagenes w=100&h=200}imagenes1{-imagenes} {video w=100&h=200}videos4{-video} Codigo {video w=100&h=200}videos2{-video} {swf w=500&h=300}swf2{-swf} <iframe class='youtube-player' type='text/html' width='640' height='385' src='http://www.youtube.com/embed/kxwsu8JfvVU' frameborder='0'></iframe>";
	$res = $content;
	while($res !== FALSE){
		$content = $res;
		$res = getTagVideo($content,'{video','{-video}');
	}	
	$res = $content;
	while($res !== FALSE){
		$content = $res;
		$res = getTagAudio($content,'{audio}','{-audio}');
	}	
	$res = $content;
	while($res !== FALSE){
		$content = $res;
		$res = getTagImage($content,'{imagenes','{-imagenes}');
	}	
	$res = $content;
	while($res !== FALSE){
		$content = $res;
		$res = getTagPdf($content,'{pdf}','{-pdf}');
	}	
	$res = $content;
	while($res !== FALSE){
		$content = $res;
		$res = getTagSwf($content,'{swf','{-swf}');
	}	
	echo $content;
	
?>
