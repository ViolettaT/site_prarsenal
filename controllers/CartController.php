<?php

class CartController
{

    /**
     * Action для добавления товара в корзину при помощи асинхронного запроса (ajax)
     * @param integer $id <p>id товара</p>
     */
    public function actionAddAjax($id)
    {
        // Добавляем товар в корзину и печатаем результат: количество товаров в корзине
        echo Cart::addProduct($id);
        return true;
    }

    /**
     * Action для удаления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function actionDellAjax($id)
    {
        // Удаляем заданный товар из корзины и печатаем результат: количество товаров в корзине
        echo Cart::dellProduct($id)
;
	return true;
        
    }

	
    /**
     * Action для изменения количества товара в корзине при помощи асинхронного запроса (ajax)
     * @param integer $id <p>id товара</p>
     */
    public function actionCountAjax($id)

   {
	 
	 // Получаем инфомрацию о товаре
        $product = Product::getProductById($id);	

	// количество товаров в корзине
	$productsInCart = Cart::getProducts();
        
	echo $productsInCart[$product['id']]; 	      
        return true;
    }

    
   /**
     * Action для удаления товара в корзину синхронным запросом
     * @param integer $id <p>id товара</p>
     */
    public function actionDelete($id)
    {
        // Удаляем заданный товар из корзины
        Cart::deleteProduct($id);

        // Возвращаем пользователя в корзину
        header("Location: /cart");
    }

    /**
     * Action для страницы "Корзина"
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получим идентификаторы и количество товаров в корзине
        $productsInCart = Cart::getProducts();

        if ($productsInCart) {
            // Если в корзине есть товары, получаем полную информацию о товарах для списка
            // Получаем массив только с идентификаторами товаров
            $productsIds = array_keys($productsInCart);

            // Получаем массив с полной информацией о необходимых товарах
            $products = Product::getProdustsByIds($productsIds);

            // Получаем общую стоимость товаров
            $totalPrice = Cart::getTotalPrice($products);
        }

        // Подключаем вид
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }

    /**
     * Action для страницы "Оформление покупки"
     */
    public function actionCheckout()
    {
        // Получием данные из корзины      
        $productsInCart = Cart::getProducts();

        // Если товаров нет, отправляем пользователи искать товары на главную
        if ($productsInCart == false) {
            header("Location: /");
        }

        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

	 // Список способ доставкм
        $DeliveryList = Order::getDeliveryList();

        // Находим общую стоимость
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);

        // Количество товаров
        $totalQuantity = Cart::countItems();

        // Поля для формы        
        $userPhone = false;
        $userAdress = false;

        // Статус успешного оформления заказа
        $result = false;

        // Проверяем является ли пользователь гостем
        if (!User::isGuest()) {
            // Если пользователь не гость
            // Получаем информацию о пользователе из БД
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
        } else {
            require_once(ROOT . '/views/cart/error.php');
            return true;
        }

        // Обработка формы
        if (isset($_POST['submit'])) {
            // Если форма отправлена
            // Получаем данные из формы            
	    $type = $_POST['type'];
            $userPhone = $_POST['userPhone'];
            $userAdress = $_POST['userAdress'];

            // Флаг ошибок
            $errors = false;

            
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }


            if ($errors == false) {
                // Если ошибок нет
                // Сохраняем заказ в базе данных
                $result = Order::save($type, $userPhone, $userAdress, $userId, $productsInCart);            

                    // Очищаем корзину
                    Cart::clear();
                }
            }
        

        // Подключаем вид
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }
}
