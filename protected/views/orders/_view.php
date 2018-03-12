<?php
/* @var $this OrdersController */
/* @var $data Orders */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('customer_id')); ?>:</b>
	<?php echo CHtml::encode($data->customer->login); ?>
	<br />

    <?php
        $orderDeleteUrl = $this->createUrl('orders/delete', array('id' => $data->id));
        echo "<a href=$orderDeleteUrl>Удалить заказ</a>" . "<br>";
    ?>

<!--	<b>--><?php //echo CHtml::encode($data->getAttributeLabel('date')); ?><!--:</b>-->
<!--	--><?php //echo CHtml::encode($data->date); ?>
<!--	<br />-->

        <?php
            foreach ($data->productOrders as $item) {
                echo "</br>";
                echo "product name: {$item->product->name}";
                echo "</br>";
                echo "quantity: {$item['quantity']}";
                echo "</br>";
                $itemUpdateRoute = 'productOrders/update';
                $itemUpdateParams = array('id' => $item->id, 'orderId' => $item->order_id);
                $itemUpdateUrl = $this->createUrl($itemUpdateRoute, $itemUpdateParams);
                echo "<a href=$itemUpdateUrl>update</a>" . " ";

                $itemDeleteRoute = 'productOrders/delete';
                $itemDeleteParams = array('id' => $item->id);
                $itemDeleteUrl = $this->createUrl($itemDeleteRoute, $itemDeleteParams);
                echo "<a href=$itemDeleteUrl>delete</a>";
                echo "</br>";
            }
            echo "</br>";

            $itemCreateRoute = 'productOrders/create';
            $itemCreateParams = array('orderId' => $data->id);
            $itemCreateUrl = $this->createUrl($itemCreateRoute, $itemCreateParams);
            echo "<a href=$itemCreateUrl>add product to the order</a>";
        ?>

</div>