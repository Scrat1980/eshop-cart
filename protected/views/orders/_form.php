<?php
/* @var $this OrdersController */
/* @var $model Orders */
/* @var $form CActiveForm */
?>

<div class="form">

<?php
//    var_dump($this->productsAvailable);
//    die;
    $modelProduct = new Product();
//?>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'orders-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model,'customer_id'); ?>
        <?php
        echo $form->dropDownList(
            $model,
            'customer_id',
            $this->customersAvailable
        )
        ?>
        <!--		--><?php //echo $form->textField($model,'product_id'); ?>
        <?php echo $form->error($model,'customer_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'product_id'); ?>
        <?php
        echo $form->dropDownList(
            $modelProduct,
            'id',
            $this->productsAvailable
        )
        ?>
        <!--		--><?php //echo $form->textField($model,'product_id'); ?>
        <?php echo $form->error($model,'product_id'); ?>
    </div>

    <?php
    $productOrdersModel = new ProductOrders();

    ?>

    <div class="row">
        <?php echo $form->labelEx($productOrdersModel,'quantity'); ?>
        <?php echo $form->textField($productOrdersModel,'quantity'); ?>
        <?php echo $form->error($productOrdersModel,'quantity'); ?>
    </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

<?php
    $customerCreateUrl = $this->createUrl('customer/create');
    echo "<a href=$customerCreateUrl>Создать клиента</a>" . "<br>";
?>


</div><!-- form -->