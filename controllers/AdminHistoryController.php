<?php

class AdminHistoryController extends AdminBase
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

        // Подключаем вид
        require_once(ROOT . '/views/admin_order_history/index.php');
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
	
	
        // Получаем данные о конкретном заказе
         $orderUserList = Order::getOrdersUserList($id);  
	
	//Получаем количесвто заказов 
	$count = Order::getOrdersUserCount($id);   

        // Подключаем вид
        require_once(ROOT . '/views/admin_order_history/view.php');
        return true;
    }
    
}
