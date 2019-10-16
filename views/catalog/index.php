﻿<?php include ROOT . '/views/layouts/header.php'; ?>

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
                	</div><br />											
			<form>
				  <div class="delivery" align="center">    					
    					<b><a href="/order/" class="link">ДОСТАВКА И ОПЛАТА</a></b>
    				  </div>				
			</form>	
                    </div>
            </div>
		
	    <div class="col-sm-9 padding-right">
		<div class="features_items">			
         		<h3 class="text-center link">Добро пожаловать в пекарню "Пряничный Арсенал" <br />
			<p></p>
			<p></p>
			Мы изготавливаем хлеб на <span class="p">собственной закваске</span>. <br />
			А так же вкусные (в том числе <span class="p">диетические</span>) кондитерские изделия, изготовленные исключительно из <span class="p">натуральных</span> продуктов. <br />
			В этом интернет магазине у вас есть уникальная возможность заказать свежайшую продукцию прямо из нашей пекарни. <br />
			<span class="p">Выбирайте, пожалуйста!</span>
			</h3>   	
		</div>	
	   </div>                   
        </div>
    </div>
</section>

