<?php

class CatalogController
{

    /**
     * Action для страницы "Каталог товаров"
     */
    public function actionIndex()
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();        

        // Подключаем вид
        require_once(ROOT . '/views/catalog/index.php');
        return true;
    }

    /**
     * Action для страницы "Категория товаров"
     */
    public function actionCategory($categoryId, $page=1)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();
	
	$productsListName = Product::getProductsListName($categoryId);	
	
	// Список товаров в категории
        $categoryProducts = Product::getProductsListByCategory($categoryId, $page);

	// Список товаров в категории по возростанию
        $categoryProductsAsc = Product::getProductsListByCategoryAsc($categoryId, $page);

	// Список товаров в категории по убыванию
        $categoryProductsDesc = Product::getProductsListByCategoryDesc($categoryId, $page);
	
	// Обработка формы
        if (isset($_POST['search'])) {
            	$searchProduct=$_POST['name'];    
	
		//Поиск товара по имени
		$searchProductName = Product::searchProductsList($categoryId, $page, $searchProduct);
	}

        // Общее количетсво товаров (необходимо для постраничной навигации)
        $total = Product::getTotalProductsInCategory($categoryId);

        // Создаем объект Pagination - постраничная навигация
        $pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');

        // Подключаем вид
        require_once(ROOT . '/views/catalog/category.php');
        return true;
    }
}
