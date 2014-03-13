<?php
$base = Yii::app()->request->baseUrl;
$search = "";
if(isset($_REQUEST['buscar']))
	$search = $_REQUEST['buscar']; 

$query = "SELECT tbl_resource.id_resource, tbl_resource.type_resource,tbl_resource.name_resource, tbl_resource.folder_resource,tbl_resource.account, tbl_resource.date_register, tbl_resource.name_real FROM tbl_resource WHERE name_resource LIKE '%{$search}%'";	
$res = Resource::model()->findAllBySQL($query);


$query = "SELECT * FROM tbl_video_web WHERE name LIKE '%{$search}%'";	
$video_web = VideoWeb::model()->findAllBySQL($query);

echo "<h1>Buscando {$search} </h1>";
?>

<div class="buscador">
  <div class="icon_buscador"><img width="14" height="19" src="<?php echo $base; ?>/images/search.jpg"></div>
  <div class="campoBusqueda">
      <label for="textfield"></label>
      <input type="text" id="txt_search" class="campoBusquedaText" name="textfield">
   </div>
</div>

<div id="sub_folder">
	<?php 
		if($res)
		{
			foreach($res as $r)
			{
				$clase = $this->getClassCSS($r['folder_resource']);
				$onclick = "onclick='getInfo(\"{$r['folder_resource']}\")'";
				if($clase != 'imagenes'){
					$img = "<img width='50' height='50' src='{$base}/images/{$clase}'>";
					echo "<div id='{$r['folder_resource']}' {$onclick} class='folder_file'>{$img}<p><b>{$r['name_resource']}</b></p></div> ";
				}
				else
				{
					$img = "<img width='50' height='50' src='{$base}/multimedia/imagenes/{$r['folder_resource']}.jpg'>";
					echo "<div id='{$r['folder_resource']}' {$onclick} class='folder_file {$clase}'>{$img}<p><b>{$r['name_resource']}</b></p></div> ";
				}
			}
		}
		
		if($video_web)
		{
			foreach($video_web as $vw)
			{
				$video_id = $vw['id_video'];
				if($vw['servidor'] == 2)
				{
					$src = $vw['thumb'];
				}
				else
				{
					$src = "http://img.youtube.com/vi/".$video_id."/0.jpg"; 
				}
				
					$html = "";
					$html .= "<div class='folder_file' onClick='getInfoVideoWeb(".$vw['id_video_web'].");'>";
					$html .= "<img src='".$src."' width='50' height='50' alt='{$vw['name']}'/>";
					$html .= "<p>{$vw['name']}</p>";
					$html .= "</div>";
					echo $html;
			}
		}
	?>
</div>
<div id='info_file'></div>
<script type="application/javascript">
function getInfo(str)
{
	url = "<?php echo CController::createUrl('multimedia/getInfo'); ?>";
	$.post(url, {str:str}, function(data){
		if(data.success){
			var html = "";
			html += 'Nombre ' + data['name'] + '<br />';
			html += 'Nombre real ' + data['name_real'] + "<br />";
			html += 'Cantidad de archivo ' + data['account'] + "<br />";
			html += 'Codigo ' + data['codigo'] + "<br />";
			html += '<a href="' + data['update'] + '" > Actualizar </a><br />';
			html += '<a href="' + data['delete'] + '" > Eliminar </a>';
			$('#info_file').html(html);
			html = "";
    	}
		else if(!data.success)
		{
				alert('Error en los datos');
		}
	}, 'json');
}

function getInfoVideoWeb(id)
{
	url = "<?php echo CController::createUrl('videoWeb/getInfo'); ?>";
	$.post(url, {id:id}, function(data){
		if(data.success){
			var html = "";
			html += 'Codigo ' + data['codigo'] + "<br />";
			html += data['show'] + " <br />";
			html += '<a href="' + data['update'] + '" > Actualizar </a><br />';
			html += '<a href="' + data['delete'] + '" > Eliminar </a>';
			$('#info_file').html(html);
			html = "";
    	}
		else if(!data.success)
		{
				alert('Error en los datos');
		}
	}, 'json');
}

$("#txt_search").keypress(function(event) {
  if(event.which == 13)
  	$('.icon_buscador').click();
});

$('.icon_buscador').click(function(){
	var txt = $('#txt_search').val();
	if(txt != '')
	{
		var url =  "<?php echo Yii::app()->createUrl('multimedia/busqueda'); ?>";
		url += "/" + txt;
		document.location.href = url;
	}
});
</script>