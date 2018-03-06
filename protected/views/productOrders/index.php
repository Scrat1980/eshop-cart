<?php
/* @var $this ProductOrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Product Orders',
);

$this->menu=array(
	array('label'=>'Create ProductOrders', 'url'=>array('create')),
	array('label'=>'Manage ProductOrders', 'url'=>array('admin')),
);
?>

<h1>Product Orders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
