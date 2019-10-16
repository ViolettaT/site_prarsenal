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
                                        <a href="/category/<?php echo $categoryItem['id']; ?>">
                                            <?php echo $categoryItem['name']; ?>
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
                <div class="product-details">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img style="width: 350px; height: 300px;" src="/template/images/<?=$product['id']?>.jpg" alt="" />
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information">                         
                                <h2><?php echo $product['name']; ?></h2>
				<h4 class="link"><?php echo $product['description']; ?></h4><br />
                                <h4>Срок годности: <?php echo $product['availability']; ?> сут.</h4>
				<h4>Кол-во товара в упаковке: <?php echo $product['count']; ?> кг</h4>                                                             	
				<h4>Кол-во покупаемого продукта:
				<a href="#" id-add="<?php echo $product['id']; ?>" class="add link"><font size="4">+</font></a>
					<?php if (isset($productsInCart[$product['id']])): ?>				 
						<span id="cart"><?php echo $productsInCart[$product['id']];?></span>
					<? else: ?>
						<span id="cart">0</span>
					<?php endif; ?>
				<a href="#" id-dell="<?php echo $product['id']; ?>" class="dell link"><font size="5">-</font></a>
				</h4>	
				<h3 class="link">Стоимость: <?php echo $product['price']; ?> руб.</h3>  			
				<a href="/cart/" class="a">Купить</a>                                                            
                            </div>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
    </div>
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>

