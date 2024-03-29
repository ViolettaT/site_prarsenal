<?php

class ProductController
{

    /**
     * Action для страницы просмотра товара
     * @param integer $productId id товара
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $product = Product::getProductById($productId);

	// количество товаров в корзине
	$productsInCart = Cart::getProducts();	

        // Подключаем вид
        require_once(ROOT . '/views/product/view.php');
        return true;
    }
}
