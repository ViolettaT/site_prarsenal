<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <div class="left-sidebar">
                    <h3 style="color: #996633" align="center">Каталог</h3>
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
                <div class="features_items">
                    <h3 class="title text-center" style="color: #996633">Корзина</h3>
                    <?php if ($result): ?>
                        <h3>Заказ оформлен!</h3>
                    <?php else: ?>			
			<p></p>
			<p></p>                       
			<h4 class="text-center">ВНИМАНИЕ!<br/> После оформления заказа с вами свяжутся в течение дня.</h4><br />
			<h4>Выбрано товаров: <?php echo $totalQuantity; ?> на сумму: <?php echo $totalPrice; ?> руб.</h4>
			<h5><span class="p">*</span> Поля являются обзательными для заполнения</h5>	
                        <?php if (!$result): ?>                    
                            <div class="col-sm-4">
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>                            

                                <div>					
                                    <form action="#" method="post">
					<table width="400px" height="200px">
						<tr>
							<td>ФИО:</td>
							<td>						                                   												<input size="30" placeholder="имя" value="<?php echo $userName; ?>" readonly />
							</td>
						</tr>
					 	
						<tr>
							<td>Номер телефона:</td>
							<td>						                                   												<input size="30" type="text" name="userPhone" placeholder="Телефон" value="<?php echo $userPhone; ?>"/>
							</td>
							<td><lable class="p">*<lable></td>
						</tr>								                                     
                                        	<tr>
					 		<td>Способ доставки:</td>		
							<td>		
								<select name="type">

                            						<?php if (is_array($DeliveryList)): ?>

                                						<?php foreach ($DeliveryList as $delivery): ?>

                                    							<option value="<?php echo $delivery['id']; ?>">

                                        							<?php echo $delivery['type']; ?>
 
                                   							</option>
 
                               							<?php endforeach; ?>
 
                           						<?php endif; ?>
 
                       						</select>
							</td>
							<td><lable class="p">*<lable></td>
						</tr>
						<tr>
							<td>Адрес:</td>						 
					                <td>                   
                                        			<input size="30" type="text" placeholder="Aдрес отгрузки" name="userAdress" value="<?php echo $userAdress; ?>"/>					</td>
						</tr>
					</table><br />                                        
                                        <input type="submit" name="submit" value="Оформить" />
                                    </form>
                                </div>							
                            </div>				
                        <?php endif; ?>
                    <?php endif; ?>			
                </div>
            </div>
        </div>
    </div>
</section>
