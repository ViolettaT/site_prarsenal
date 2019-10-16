<?php

class Order
{



    /**
     * Возвращает способ доставки для списка на сайте
     * @return array <p>способ доставки</p>
     */
    public static function getDeliveryList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, type FROM delivery');

        // Получение и возврат результатов
        $i = 0;
       $DeliveryList = array();
        while ($row = $result->fetch()) {
           $DeliveryList[$i]['id'] = $row['id'];
           $DeliveryList[$i]['type'] = $row['type'];
           $i++;
        }
        return $DeliveryList;
    }

    /**
     * Сохранение заказа 
     * @param string $userName <p>Имя</p>
     * @param string $userPhone <p>Телефон</p>
     * @param string $userComment <p>Комментарий</p>
     * @param integer $userId <p>id пользователя</p>
     * @param array $products <p>Массив с товарами</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function save($type, $userPhone, $userAdress, $userId, $products)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product_order (delivery_id, user_phone, address_delivery, user_id, products) '
                . 'VALUES (:delivery_id, :user_phone, :address_delivery, :user_id, :products)';

        $products = json_encode($products);

        $result = $db->prepare($sql);
        $result->bindParam(':delivery_id', $type, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':address_delivery', $userAdress, PDO::PARAM_STR);
        $result->bindParam(':user_id', $userId, PDO::PARAM_STR);
        $result->bindParam(':products', $products, PDO::PARAM_STR);

        return $result->execute();
    }

    /**
     * Возвращает список заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_phone, user_id, date, status FROM product_order WHERE status=3 ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    /**
     * Возвращает список новых заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersListNew()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_id, user_phone, date, status FROM product_order WHERE status=1 ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }

    /**
     * Возвращает список обрабатываемых заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersListProcess()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, user_id, user_phone, date, status FROM product_order WHERE status=2 ORDER BY id DESC');
        $ordersList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['user_phone'] = $row['user_phone'];
            $ordersList[$i]['date'] = $row['date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }


    /**
     * Возвращает список старых заказов конкретного пользователя
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersUserList($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = 'SELECT * FROM product_order WHERE status=4 AND user_id=:id ORDER BY id DESC';

	// Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);       

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $ordersUserList = array();
        $i = 0;
        while ($row = $result->fetch()) {        
            $ordersUserList[$i]['id'] = $row['id'];           
            $ordersUserList[$i]['user_phone'] = $row['user_phone'];
            $ordersUserList[$i]['date'] = $row['date'];
	    $ordersUserList[$i]['address_delivery'] = $row['address_delivery'];          
            $i++;
        }
        return $ordersUserList;
    }

    /**
     * Возвращает количество закрытых заказов конкретного пользователя
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersUserCount($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        $sql = 'SELECT count(id) FROM product_order WHERE status=4 AND user_id=:id';
	
	// Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);	    

       
        $result->fetch(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }


    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    /**
     * Возвращает заказ с указанным id 
     * @param integer $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product_order WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }

    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product_order WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует заказ с заданным id
     * @param integer $id <p>id товара</p>
     * @param string $userName <p>Имя клиента</p>
     * @param string $userPhone <p>Телефон клиента</p>
     * @param string $userComment <p>Комментарий клиента</p>
     * @param string $date <p>Дата оформления</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateOrderById($id, $type_delivery, $userPhone, $userAdress, $date, $status)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product_order
            SET 
                delivery_id = :type, 
                user_phone = :user_phone, 
                address_delivery = :user_adress,		
                date = :date, 
                status = :status 
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':type', $type_delivery, PDO::PARAM_STR);
        $result->bindParam(':user_phone', $userPhone, PDO::PARAM_STR);
        $result->bindParam(':user_adress', $userAdress, PDO::PARAM_STR);	
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        $result->bindParam(':status', $status, PDO::PARAM_INT);
        return $result->execute();
    }
}
