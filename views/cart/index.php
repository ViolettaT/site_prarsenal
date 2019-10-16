<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h3 class="link" align="center">Каталог</h3>
                    <div class="panel-group">
                        <?php foreach ($categories as $categoryItem): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a href="/category/<?php echo $categoryItem['id'];?>">
                                            <?php echo $categoryItem['name'];?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?><br />											
			<form>
				  <div class="delivery" align="center">    					
    					<b><a href="/order/" class="link">ДОСТАВКА И ОПЛАТА</a></b>
    				  </div>				
			</form>	
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h3 class="title text-center link">Корзина</h3>                    
                    <?php if ($productsInCart): ?>
                        <h4>Вы выбрали следующие товары:</h4>
                        <table border="1", cellpadding="3", padding="4", background="wheat">
                            <tr align="center">
                                <td>ID товара</td>
                                <td>Наименование товара</td>
                                <td>Стоимость</td>
                                <td>Количество, шт./коробок</td>
                                <td>Удалить товар</td>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr align="center">
                                    <td><?php echo $product['id'];?></td>
                                    <td>
                                        <a href="/product/<?php echo $product['id'];?>" class="link">
                                            "<?php echo $product['name'];?>" <br />(подробнее)
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?> руб.</td>
                                    <td>
					<?php echo $productsInCart[$product['id']];?>
					<a href="/product/<?php echo $product['id'];?>" class="link">
                                            (изменить)
                                        </a>
				    </td> 
                                    <td>
                                        <a href="/cart/delete/<?php echo $product['id'];?>" style="color: black">Удалить</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="5" align="right">Общая стоимость: <?php echo $totalPrice;?> руб.</td>
                                </tr>                            
                        </table><br />                        
                        <a class="a" href="/cart/checkout">Оформить заказ</a>
                    <?php else: ?>
                        <p>Корзина пуста</p>                        
                        <a class="a" href="/">Вернуться на главную страницу</a>
                    <?php endif; ?>
                </div>           
             </div>
        </div>
    </div>
</section>
