<?php

class AdminOrderController extends AdminBase
{

    /**
     * Action для страницы "Управление заказами"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();	
	
	//получаем информацию о пользователе	
	$userList= User::getUserList();    

        // Получаем список доставляемых заказов
        $ordersList = Order::getOrdersList();
	
	 // Получаем список новых заказов
         $ordersListNew = Order::getOrdersListNew();
	
	 // Получаем список обрабатываемых заказов
         $ordersListProcess = Order::getOrdersListProcess();

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/index.php');
        return true;
    }

    /**
     * Action для страницы "Обновление заказа"
     */
    public function actionUpdate($id)
    {
        // Проверка доступа
        self::checkAdmin();

	
	//получаем информацию о пользователе	
	$userList= User::getUserList();
		
	// Список способ доставкм
        $DeliveryList = Order::getDeliveryList();	    

        // Получаем список доставляемых заказов
        $ordersList = Order::getOrdersList();
       
	 // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена   
            // Получаем данные из формы           
            $userPhone = $_POST['userPhone'];
	    $type_delivery = $_POST['type_delivery'];
            $userAdress = $_POST['userAdress'];
            $date = $_POST['date'];
            $status = $_POST['status'];

            // Сохраняем изменения
            Order::updateOrderById($id, $type_delivery, $userPhone, $userAdress, $date, $status);

            // Перенаправляем пользователя на страницу управлениями заказами
            header("Location: /admin/order/view/$id");
	    
	    // Подключаем вид
            require_once(ROOT . '/views/admin_order/report_up.php');
            return true;
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/update.php');
        return true;
    }

    /**
     * Action для страницы "Просмотр заказа"
     */
    public function actionView($id)
    {
        // Проверка доступа
        self::checkAdmin();

	
	//получаем информацию о пользователе	
	$userList= User::getUserList();  
		
	// Список способ доставкм
        $DeliveryList = Order::getDeliveryList();
	
        // Получаем данные о конкретном заказе
        $order = Order::getOrderById($id);

        // Получаем массив с идентификаторами и количеством товаров
        $productsQuantity = json_decode($order['products'], true);

        // Получаем массив с индентификаторами товаров
        $productsIds = array_keys($productsQuantity);

        // Получаем список товаров в заказе
        $products = Product::getProdustsByIds($productsIds);

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/view.php');
        return true;
    }

    /**
     * Action для страницы "Удалить заказ"
     */
    public function actionDelete($id)
    {
        // Проверка доступа
        self::checkAdmin();

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Удаляем заказ
            Order::deleteOrderById($id);

            // Перенаправляем пользователя на страницу управлениями товарами
            header("Location: /admin/order");
	   
        // Подключаем вид
        require_once(ROOT . '/views/admin_order/report.php');
        return true;		
        }

        // Подключаем вид
        require_once(ROOT . '/views/admin_order/delete.php');
        return true;
    }
}
