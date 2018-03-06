<?php
/* @var $this CustomerController */
/* @var $data Customer */
?>

<div class="view">

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('id')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
<!--	<br />-->

	<b><?php echo CHtml::encode($data->getAttributeLabel('login')); ?>:</b>
	<?php echo CHtml::encode($data->login); ?>
	<br />

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('password_hash')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->password_hash); ?>
<!--	<br />-->

    <pre>
    <?php print_r($data); ?>
    </pre>


</div>