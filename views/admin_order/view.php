<?php include ROOT . '/views/layouts/header_admin.php'; ?>
	

<section>

		<div class="container">

			<div class="row">

<br/>						



        				
				<h4>Информация о заказе:</h4>
				<table class="table-bordered table-striped table">

			                <tr>
						<td>Номер заказа</td>
				
                <td><?php echo $order['id']; ?></td>
			
                </tr>

			                <tr>
				
                <td>Имя покупателя</td>

						<td>
							<?php foreach ($userList as $user): ?>
								<?php if ($order['user_id'] == $user['id']) echo $user['name']; ?>
							<?php endforeach; ?>
						</td>
			                </tr>
 
			                <tr>
			
                	<td>Телефон покупателя</td>

		    		                <td><?php echo $order['user_phone']; ?></td>
			
                </tr>

					<tr>
						<td>Способ доставки</td>
						<td>
							<?php foreach ($DeliveryList as $delivery): ?>
								<?php if ($order['delivery_id'] == $delivery['id']) echo $delivery['type']; ?>
							<?php endforeach; ?>
						</td>	
					</tr>				
			                <tr>
 
				                <td>Адрес выгрузки</td>
				
                <td>
							 <?php echo $order['address_delivery']; ?>
						</td>

					</tr>
				
        <?php if ($order['user_id'] != 0): ?>		    
                   
			
                <?php endif; ?>
			
                <tr>
 
				                 <td><b>Статус заказа</b></td>

				                 <td><?php echo Order::getStatusText($order['status']); ?></td>
			
                </tr>

			                <tr>
		
                    		<td><b>Дата заказа</b></td>

			                        <td><?php echo $order['date']; ?></td>

			                </tr>
 
				</table>
		           	<h4>Товары в заказе:</h4>

 
		           	<table class="table-admin-medium table-bordered table-striped table ">
					<tr>
						<th>ID товара</th>				                
				                <th>Название</th>
				                <th>Цена</th>

				                <th>Количество</th>
				        </tr>

					<?php foreach ($products as $product): ?>
			                <tr>
			
                        <td><?php echo $product['id']; ?></td>			
                        
			
                        <td><?php echo $product['name']; ?></td>

			                        <td><?php echo $product['price']; ?> руб.</td>
			
                        <td><?php echo $productsQuantity[$product['id']]; ?></td>

			                </tr>

			                <?php endforeach; ?>
				</table>


			        <a href="/admin/order/" class="a"><<Назад</a>
 
		</div>



	</section>



