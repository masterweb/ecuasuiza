<link href="<?php echo Yii::app()->request->baseUrl; ?>/css/jPages.css" rel="stylesheet" type="text/css" />
<script src="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap/js/jPages.min.js" type="text/javascript"></script>
<div class="txt_search">Resultados de búsqueda para: <strong> <?php echo $search; ?></strong></div>
<br>
<div id="search-container">
    <?php
    if (isset($documento)) {

        foreach ($documento as $doc) {
            $categoria = $doc['categoria'];
            //$url = Yii::app()->baseUrl . '/' . $doc->url_documento; //$this->createUrl('site/documento',array('id'=>$doc->id_subseccion, 'id_doc'=>$doc->id_documento));
            echo '<div class="document">';
            echo "<div class='descripcion_doc'></div>";
            if ($categoria == 'auto' || $categoria == 'vida' || $categoria == 'hogar'):
                echo '<div class="icon_noticia"><a href="' . Yii::app()->createUrl('/seguros/individuales', array('id' => $doc['id'])) . '" target="_blank">' . $doc['title'] . '</a></div>';
                echo '<p>' . $doc['desc_min'] . '</p>';
            elseif ($categoria == 'empresarial'):
                echo '<div class="icon_noticia"><a href="' . Yii::app()->createUrl('/seguros/empresariales', array('id' => $doc['id'])) . '" target="_blank">' . $doc['title'] . '</a></div>';
                echo '<p>' . $doc['desc_min'] . '</p>';
            endif;

            echo '</div>';
        }
    }

    if (isset($articulo)) {

        foreach ($articulo as $art) {
            $categoria = $art['categoria'];
            //$url = Yii::app()->baseUrl . '/' . $doc->url_documento; //$this->createUrl('site/documento',array('id'=>$doc->id_subseccion, 'id_doc'=>$doc->id_documento));
            echo '<div class="document">';
            echo "<div class='descripcion_doc'></div>";
            if ($categoria == 'noticias'):
                echo '<div class="icon_noticia"><a href="' . Yii::app()->createUrl('/articulos/index', array('id' => $art['id_articulos'])) . '" target="_blank">' . $art['title'] . '</a></div>';
                echo '<p>' . $art['desc_min'] . '</p>';
            elseif ($categoria == 'general'):
                echo '<div class="icon_noticia"><a href="' . Yii::app()->createUrl('/articulos/index', array('id' => $art['id_articulos'])) . '" target="_blank">' . $art['title'] . '</a></div>';
                echo '<p>' . $art['desc_min'] . '</p>';
            endif;

            echo '</div>';
        }
    }
    else {
        echo '<div class="document">';
        echo "<div class='descripcion_doc'><p>No se encontraron resultados</p></div>";
    }
    ?>
</div>
<div class="holder"></div>
<script type="text/javascript">
    /* when document is ready */
    $(document).ready(function(){
        /* initiate the plugin */
        $("div.holder").jPages({
            containerID  : "search-container",
            perPage      : 10
        });
    });
        
</script>
