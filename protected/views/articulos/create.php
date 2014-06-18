<?php

if (!Yii::app()->user->isAdminUser()) {
    $this->redirect($this->createUrl('admin/login'));
}
?>
<?php
/* @var $this ArticulosController */
/* @var $model Articulos */
if(isset($_GET['categoria']) ){
    $id = $_GET['categoria'];
    $criteria = new CDbCriteria(array("condition" => "categoria='$id'", "order" => "orden DESC"));
    $art = Articulos::model()->findAll($criteria);
    //echo 'categoria: '.$id;
}


$this->menu=array(
	//array('label'=>'Listar Articulos', 'url'=>array('index')),
	//array('label'=>'Administrar Articulos', 'url'=>array('admin','categoria'=>$id)),
);
?>

<h4>Crear Artículos</h4>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>