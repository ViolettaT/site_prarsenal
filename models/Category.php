<?php

class Category
{

    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoriesList()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name FROM category ORDER BY name ASC');

        // Получение и возврат результатов
        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

    /**
     * Возвращает массив категорий для списка в админпанели <br/>
     * (при этом в результат попадают и включенные и выключенные категории)
     * @return array <p>Массив категорий</p>
     */
    public static function getCategoriesListAdmin()
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Запрос к БД
        $result = $db->query('SELECT id, name FROM category');

        // Получение и возврат результатов
        $categoryList = array();
        $i = 0;
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];           
            $i++;
        }
        return $categoryList;
    }

    
    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return array <p>Массив с информацией о категории</p>
     */
    public static function getCategoryById($id)
    {
        // Соединение с БД
        $db = Db::getConnection();

        // Текст запроса к БД
        $sql = 'SELECT * FROM category WHERE id = :id';

        // Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);

        // Указываем, что хотим получить данные в виде массива
        $result->setFetchMode(PDO::FETCH_ASSOC);

        // Выполняем запрос
        $result->execute();

        // Возвращаем данные
        return $result->fetch();
    }   
}
