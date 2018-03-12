<?php
/* @var $this ProductOrdersController */
/* @var $model ProductOrders */

$this->breadcrumbs=array(
	'Product Orders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ProductOrders', 'url'=>array('index')),
	array('label'=>'Manage ProductOrders', 'url'=>array('admin')),
);
?>

<h1>Create ProductOrders</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'type'=>'create')); ?>