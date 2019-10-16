<?php

class Product
{

    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    public static function getProductsListName($categoryId)
    {

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT name FROM product '
                . 'WHERE category_id = :category_id '
                . 'ORDER BY id ASC ';	

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);       

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {           
            $products[$i]['name'] = $row['name'];
                       
            $i++;
        }
        return $products;
    }

    /**
     * Возвращает список товаров в указанной категории
     * @param type $categoryId id категории
     * @param type $page [optional] Номер страницы
     * @return type Массив с товарами
     */
    public static function getProductsListByCategory($categoryId, $page=1)
    {
        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
       $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE category_id = :category_id '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';	

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];            
            $i++;
        }
        return $products;
    }

    public static function getProductsListByCategoryAsc($categoryId, $page = 1)
    {
        
	$limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE category_id = :category_id '
                . 'ORDER BY price ASC LIMIT :limit OFFSET :offset';	

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];            
            $i++;
        }
        return $products;
    }

    
    public static function  getProductsListByCategoryDesc($categoryId, $page = 1)
    {
        
	$limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE category_id = :category_id '
                . 'ORDER BY price DESC LIMIT :limit OFFSET :offset';	

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);	
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];            
            $i++;
        }
        return $products;
    }

    public static function searchProductsList($categoryId, $page = 1, $searchProduct)
    {
        
	$limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;

        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT id, name, price FROM product '
                . 'WHERE category_id = :category_id AND name = :search_product '
                . 'ORDER BY id ASC LIMIT :limit OFFSET :offset';	

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);
	$result->bindParam(':search_product', $searchProduct, PDO::PARAM_INT);
        $result->bindParam(':limit', $limit, PDO::PARAM_INT);
        $result->bindParam(':offset', $offset, PDO::PARAM_INT);

        // Выполнение команды
        $result->execute();

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];            
            $i++;
        }
        return $products;
    }



    /**
     * Возвращает продукт с указанным id
     * @param integer $id id товара
     * @return array Массив с информацией о товаре
     */
    public static function getProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM product WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполнение комaнды
        $result->execute();

        // Получение и возврат результатов
        return $result->fetch();
    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT count(id) AS count FROM product WHERE category_id = :category_id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':category_id', $categoryId, PDO::PARAM_INT);

        // Выполнение комaнды
        $result->execute();

        // Возвращаем значение count - количество
        $row = $result->fetch();
        return $row['count'];
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray Массив с идентификаторами
     * @return array Массив со списком товаров
     */
    public static function getProdustsByIds($idsArray)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);

        // Текст запроса к БД
        $sql = "SELECT * FROM product WHERE id IN ($idsString)";

        $result = $db->query($sql);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Получение и возврат результатов
        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['count'] = $row['count'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $i++;
        }
        return $products;
    }


    /**
     * Возвращает список товаров
     * @return array Массив с товарами
     */
    public static function getProductsList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Получение и возврат результатов
        $result = $db->query('SELECT id, name, price, count FROM product ORDER BY id ASC');
        $productsList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $productsList[$i]['id'] = $row['id'];
            $productsList[$i]['name'] = $row['name'];
            $products[$i]['count'] = $row['count'];
            $productsList[$i]['price'] = $row['price'];
            $i++;
        }
        return $productsList;
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id id товара
     * @return boolean Результат выполнения метода
     */
    public static function deleteProductById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'DELETE FROM product WHERE id = :id';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        return $result->execute();
    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id id товара
     * @param array $options Массив с информацей о товаре
     * @return boolean Результат выполнения метода
     */
    public static function updateProductById($id, $options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = "UPDATE product
            SET 
                name = :name,
		availability = :availability,		
                count = :count, 
                price = :price, 
                category_id = :category_id,                
                description = :description                
            WHERE id = :id";

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
	$result->bindParam(':availability', $options['availability'], PDO::PARAM_STR);
        $result->bindParam(':count', $options['count'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT); 	       
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);        
        return $result->execute();
    }

    /**
     * Добавляет новый товар
     * @param array $options Массив с информацией о товаре
     * @return integer id добавленной в таблицу записи
     */
    public static function createProduct($options)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'INSERT INTO product '
                . '(name, availability, count, price, category_id, description)'
                . 'VALUES '
                . '(:name, :availability, :count, :price, :category_id,'
                . ':description)';

        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':name', $options['name'], PDO::PARAM_STR);
	$result->bindParam(':availability', $options['availability'], PDO::PARAM_STR);
        $result->bindParam(':count', $options['count'], PDO::PARAM_STR);
        $result->bindParam(':price', $options['price'], PDO::PARAM_STR);
        $result->bindParam(':category_id', $options['category_id'], PDO::PARAM_INT);
        $result->bindParam(':description', $options['description'], PDO::PARAM_STR);
        
        if ($result->execute()) {
            // Если запрос выполенен успешно, возвращаем id добавленной записи
            return $db->lastInsertId();
        }
        // Иначе возвращаем 0
        return 0;
    }
 

    /**
     * Возвращает путь к изображению
     * @param integer $id
     * @return string Путь к изображению
     */
    public static function getImage($id)
    {
        // Название изображения
        $noImage = 'no-image.jpg';

        // Путь к папке с товарами
        $path = '/template/images/';

        // Путь к изображению товара
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            // Если изображение для товара существует
            // Возвращаем путь изображения товара
            return $pathToProductImage;
        }

        // Возвращаем путь изображения
        return $path . $noImage;
    }
}
