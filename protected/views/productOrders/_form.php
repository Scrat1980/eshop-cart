<?php
/* @var $this ProductOrdersController */
/* @var $model ProductOrders */
/* @var $test ProductOrders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'product-orders-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <?php
    $availableProducts = [''];
    if (is_array($this->availableProducts) && is_array($this->existingProducts)) {
        foreach ($this->availableProducts as $availableProduct) {
            if (!in_array($availableProduct->id, $this->existingProducts)) {
                $availableProducts[] = $availableProduct->name;

            }
        }
    }
    ?>


    <div class="row">
		<?php echo $form->labelEx($model,'product_id'); ?>
        <?php
            echo $form->dropDownList(
                    $model,
                    'product_id',
                    $availableProducts
                )
        ?>
		<?php echo $form->error($model,'product_id'); ?>
    </div>


	<div class="row" style="display: none">
		<?php echo $form->labelEx($model,'order_id'); ?>
		<?php $model->order_id = $this->orderId; ?>
		<?php echo $form->textField($model,'order_id'); ?>
		<?php echo $form->error($model,'order_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'quantity'); ?>
		<?php echo $form->textField($model,'quantity'); ?>
		<?php echo $form->error($model,'quantity'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->