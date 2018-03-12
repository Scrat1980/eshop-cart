<?php

class ProductOrdersController extends Controller
{
    public $orderId;
    public $productsAvailable = [];
    public $productsAll;

	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
        $this->orderId = (string) $_GET['orderId'];

        $this->setProductsAvailable($this->orderId);

        $model=new ProductOrders();

        if(isset($_POST['ProductOrders']))
        {
            $model->attributes=$_POST['ProductOrders'];
            if($model->save())
                $this->redirect(array('orders/index'));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
	}

    protected function setProductsAvailable($orderId)
    {
        $connection = Yii::app()->db;
        $sql = <<<SQL
            SELECT product.id
            FROM product
            WHERE product.id NOT IN (
              SELECT DISTINCT product_orders.product_id
              FROM product_orders
              WHERE product_orders.order_id = $orderId
            )
SQL;
        $command = $connection->createCommand($sql);
        $ids = $command->execute();
        if (! is_array($ids)) {
            $ids = [$ids];
        }

        $criteria = new CDbCriteria();
        $criteria->addInCondition('id', $ids);
        $products = Product::model()->findAll($criteria);

        $this->productsAvailable = CHtml::listData(
            $products,
            'id',
            'name'
        );

    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
//        $existingProducts = ProductOrders::model()->findAll(
//            "order_id=:order_id",
//            array('order_id' => $id)
//        );
//
//        $this->existingProducts = [];
//        foreach ($existingProducts as $existingProduct) {
//            $this->existingProducts[] = $existingProduct['product_id'];
//        }

        $model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ProductOrders']))
		{
			$model->attributes=$_POST['ProductOrders'];

            if ($model->save())
                $this->redirect(array('orders/index'));
//                        $this->redirect(array('view', 'id' => $model->id));
		}

        $this->orderId = $_GET['orderId'];
        $modelProduct = new Product;
        $this->productsAll = Product::model()->findAll();

        $this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
//			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		    $this->redirect(array('orders/index'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ProductOrders');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ProductOrders('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ProductOrders']))
			$model->attributes=$_GET['ProductOrders'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ProductOrders the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ProductOrders::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ProductOrders $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='product-orders-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
