<?php include ROOT . '/views/layouts/header_admin.php'; ?>
	

<section>

		<div class="container">

			<div class="row">

<br/>						



        				
				<h3 class="text-center">История заказов:</h3>

<br/>
				<h3>Кол-во заказов: <?php echo $count[0]; ?></h3><br/>				
				<table border="1", width="700px">


					<tr align="center">						
						<td><b>Дата заказа</b></td>

						<td>Номер заказа</td>
						<td>Телефон покупателя</td>

						<td>Адрес выгрузки</td>
					</tr>
					<?php foreach ($orderUserList as $product_order): ?>
			                <tr align="center">
						<td><?php echo $product_order['date']; ?></td>
				
                <td><?php echo $product_order['id']; ?></td>						
          
		    		                <td><?php echo $product_order['user_phone']; ?></td>
			
                	<td><?php echo $product_order['address_delivery']; ?></td>

					</tr>					
				
       	<?php endforeach; ?>					              
			           </table>

 
				   <br/>
			        <a href="/admin/history/" class="a"><<Назад</a>
 
			</div>
		</div>



	</section>



