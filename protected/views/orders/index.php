<?php
/* @var $this OrdersController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Заказы',
);

$this->menu=array(
	array('label'=>'Создать заказ', 'url'=>array('create')),
	array('label'=>'Редактировать заказ', 'url'=>array('admin')),
);
?>

<h1>Заказы</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
