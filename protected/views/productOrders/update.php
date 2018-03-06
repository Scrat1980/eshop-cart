<?php
/* @var $this ProductOrdersController */
/* @var $model ProductOrders */

$this->breadcrumbs=array(
	'Product Orders'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductOrders', 'url'=>array('index')),
	array('label'=>'Create ProductOrders', 'url'=>array('create')),
	array('label'=>'View ProductOrders', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ProductOrders', 'url'=>array('admin')),
);
?>

<h1>Update ProductOrders <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>