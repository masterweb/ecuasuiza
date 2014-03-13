<?php
$base = Yii::app()->request->baseUrl;
?>

<div class="buscador">
    <div class="icon_buscador"><img width="14" height="19" src="<?php echo $base; ?>/images/search.jpg"></div>
    <div class="campoBusqueda">
        <label for="textfield"></label>
        <input type="text" id="txt_search" class="campoBusquedaText" name="textfield">
    </div>
</div>
<?php
//Videos youtube y vimeo
//$video_web = VideoWeb::model()->findAll();
//$avw = array();
//foreach ($video_web as $web) {
//    $video = array();
//    $video['id_video'] = $web->id_video;
//    $video['id_video_web'] = $web->id_video_web;
//    $video['servidor'] = $web->servidor;
//    $video['name'] = $web->name;
//    if ($web->servidor == 2)
//        $video['thumb'] = $web->thumb;
//    $avw[] = $video;
//}

//definimos el path de acceso
$path = "uploads";

//instanciamos el objeto
$dir = dir("uploads");
$sub_folder = array();
if (isset($dir)) {
    echo "<div id='main_folder'>";
    $i = 0;
    while ($elemento = $dir->read()) {
        if ($elemento != '..' && $elemento != '.') {
            echo "<div class='folder' id='f{$i}'>{$elemento}</div>";
            $sub_folder[] = $this->getArrayDir($path . '/' . $elemento);
            $i++;
        }
    }
    echo "<div class='video_web'></div>";

    echo "</div>";
    //Cerramos el directorio
    $dir->close();
}
?>
<div id='sub_folder'>
</div>

<div id="info_file">
    Informacion file... 
</div>

<?php
//echo $this->getTypeResource();
?>

<script type="text/javascript">
    var path = 'multimedia';
    var folder = <?php echo json_encode($sub_folder); ?>;
    $('.folder').click(function(){
        $('#info_file').html("");
        var i = $(this).attr('id');
        var name = $(this).html();
        i = i.substring(1, i.length);
        showSubFolder(i, name);
    });

    $('.video_web').click(function(){
        $('#info_file').html("");
        var video_web = <?php echo json_encode($avw); ?>;
        var i = 0;
        var video_id = "";
        var html = "";
        while(i < video_web.length)
        {
            video_id = video_web[i]['id_video'];
            if(video_web[i]['servidor'] == 2)
            {
                src = video_web[i]['thumb'];
            }
            else
            {
                src = "http://img.youtube.com/vi/" + video_id + "/0.jpg"; 
            }
            html += "<div class='folder_file' onClick='getInfoVideoWeb(" + video_web[i]['id_video_web'] + ");'>";
            html += "<img src='" + src + "' width='50' height='50' />";
            html += "<p>" + video_web[i]['name'] + "</p>";
            html += "</div>";
            i += 1;
        }
        $("#sub_folder").html(html);
    });

    $('.folder_file').click(function(){
        alert('CLICK.');
        //var id = $(this).attr('id');
        //	alert(id);
    });

    function showSubFolder(i, name)
    {
        if(name == "imagenes")
            showImages(i, name);
        else
            showFiles(i, name);
    }

    function showFiles(i, name)
    {
        var j = 0;
        var sub  = folder[i];
        var html = "";
        var src = "";
        var img = "";
        if(name == 'audios')
            img = "mp3.jpg";
        else if(name == 'videos')
            img = "videos.jpg";
        else if(name == 'swf')
            img = "swf.png";
        else if(name == 'pdf')
            img = "pdf.png";
        for( j = 0; j < sub.length ;j++)
        {
            src = path + "/" + name + "/" + sub[j]['folder'];
            html += "<div class='folder_file " + name + "' onclick='getInfo(\"" + cutEx(sub[j]['folder'])  + "\")' id='" + sub[j]['folder'] + "'>";
            html += "<img width='50' height='50' src='<?php echo $base; ?>/images/" + img + "'>";
            html += "<p>" + cutEx(sub[j]['name_resource']) + "</p>";
            html += "</div>";
        }
        $("#sub_folder").html(html);
        html = "";
        sub = "";
    }

    function showImages(i, name)
    {
        var j = 0;
        var sub  = folder[i];
        var html = "";
        var src = "";
        for( j = 0; j < sub.length ;j++)
        {
            src = path + "/" + name + "/" + sub[j]['folder'];
            html += "<div class='folder_file'  onclick='getInfo(\"" + sub[j]['folder']  + "\")' id='" + sub[j]['folder'] + "'>"
            html += "<img src='<?php echo $base; ?>/" + src + "' width='50' height='50' />";
            html += "<p>" + cutEx(sub[j]['name_resource']) + "</p>";
            html += "</div>";
        }
        $("#sub_folder").html(html);
        htm = "";
        sub = "";
    }

    function cutEx(n)
    {
        if(n != null)
        {
            var x = n.indexOf(".");
            if(x != -1)
                return n.substr(0,x);
            else 
                return n;
        }
    }

    function getInfo(str)
    {
        var yiiToken = '<?php echo Yii::app()->request->csrfToken; ?>';
        url = "<?php echo CController::createUrl('multimedia/getInfo'); ?>";
        $.post(url, {str:str,'YII_CSRF_TOKEN':yiiToken}, function(data){
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
        var yiiToken = '<?php echo Yii::app()->request->csrfToken; ?>';
        url = "<?php echo CController::createUrl('videoWeb/getInfo'); ?>";
        $.post(url, {id:id,'YII_CSRF_TOKEN':yiiToken}, function(data){
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