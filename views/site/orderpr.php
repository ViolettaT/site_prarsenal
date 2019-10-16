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
                	</div>			
                    </div>
            </div>
		
	    <div class="col-sm-9 padding-right">
		<div class="features_items">
			<h3 class="link" align="center">ДОСТАВКА И ОПЛАТА</h3>
			<div>
				
				<h3 class="p">Правила оформления заказа: </h3>
				<div class="delivery">
				<h4> Для оформления заказа вам необходимо зарегистрироваться на сайте <br />
				     Выберите необходимые товары и нажмите кнопку «Купить». <br />
				     Для просмотра содержания вашего заказа нажмите на раздел "Корзина"<br />
				     После оформления заказа представитель интернет-магазина свяжется с вами в течение 1 рабочего дня для подтверждения заказа и согласования деталей доставки. 
				</h4>
			</div>			
         		<div>
				
				<h3 class="p">Оплата: </h3>
				<div class="delivery">
				<h4> - Наличными курьеру. <br />
				     - Безналичная оплата по счету (для юридических лиц).
				</h4>
			</div>
			<h3 class="p">Самовывоз: </h3>
			<div class="delivery">
				<h4>
				- Специально для наших клиентов, мы предоставляем услугу самовывоз с нашего склада.<br />
				- Для осуществления самовывоза со склада, вам необходимо предварительно согласовать время отгрузки.<br />
				- Самовывоз осуществляется по адресу <span class="p">ул. Достоевского 70-В, г. Шахты, Ростовская обл.</span>		
				</h4>
			</div>
	 		<h3 class="p">Доставка: </h3>
			<div class="delivery">	
				<h4> 	- Если сумма Вашего заказа составляет более <span class="p">2 000 рублей</span>, доставка по г.Ростов-на-Дону и г.Шахты осущетвляется бесплатно. <br />
	     			- Время доставки: в рабочие дни с 8 до 17 часов <span class="p">(суббота и воскресенье — по согласованию)</span>.<br />
				- Возможна доставка нашей продукции в другие регионы России при помощи транспортной компании.</h4>
			</div>	
		</div> 
	     </div>	
	   </div>                   
        </div>
    </div>
</section>

