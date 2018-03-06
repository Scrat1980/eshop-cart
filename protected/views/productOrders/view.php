<?php
/* @var $this ProductOrdersController */
/* @var $model ProductOrders */

$this->breadcrumbs=array(
	'Product Orders'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ProductOrders', 'url'=>array('index')),
	array('label'=>'Create ProductOrders', 'url'=>array('create')),
	array('label'=>'Update ProductOrders', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ProductOrders', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ProductOrders', 'url'=>array('admin')),
);
?>

<h1>View ProductOrders #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'product_id',
		'order_id',
		'quantity',
	),
)); ?>
