<?php include ROOT . '/views/layouts/header.php'; ?>
<?php
	
	if(isset($_POST['sorta'])) 
	{
		$c=$categoryProductsAsc;
	
	} else if(isset($_POST['sortd'])) {
		
		$c=$categoryProductsDesc;		
		
	} else if(isset($_POST['search'])) {
				
		$c=$searchProductName;		
		
	}else {
		
		$c=$categoryProducts;
	}
?>
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
                        <?php endforeach; ?>
			<form method="post"  action="">					
				<h4 class="link"> Сортировать по цене:</h4>	
				<input type="submit" value="По возростанию" name= "sorta"></input>
				<input type="submit" value="По убыванию" name= "sortd"></input>									
			</form>
			<p class="link"><b>------------------------------------------------</b></p>
			<form method="post"  action="#">					
				<h4 class="link">Поиск по названию продукта</h4>
				<select name="name">
                            		
                                	<?php foreach ($productsListName as $product): ?>

                                    		<option value="<?php echo $product['name']; ?>">

                                        		<?php echo $product['name']; ?>
 
                                   		</option>
 
                               		<?php endforeach; ?>                           		
 
                       		</select>
				<p></p>	
				<input type="submit" value="Искать" name= "search"></input>												</form>
			<p class="link"><b>------------------------------------------------</b></p>
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
                    <h3 class="title text-center link"> Товары</h3>	    
                     	<?php foreach ($c as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img style="width: 300px; height: 200px;" src="/template/images/<?=$product['id']?>.jpg" alt="" />
                                        <h3 class="link" id="price">Стоимость <br/><?php echo $product['price']; ?> руб</h3>
                                        <p>
                                            <a href="/product/<?php echo $product['id']; ?>" class="link" id="name">
                                                "<?php echo $product['name']; ?>" <br />(подробнее)
                                            </a>
                                        </p>
                                       	    <a href="#" data-id="<?php echo $product['id']; ?>" class="btn btn-default add-to-cart a">
                                        		Купить
                                    	    </a>
                                    </div>
                                 </div>
                            </div> 
			   </div>                       
                    <?php endforeach; ?> 
		    </div> 
			<?php echo $pagination->get(); ?> 		 	                        
                </div>		            
            </div>
        </div>    
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>