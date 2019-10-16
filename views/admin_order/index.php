<?php include ROOT . '/views/layouts/header_admin.php'; ?>
	

<section>

		<div class="container">

			<div class="row">

<br/>
			
					<h4>Список заказов</h4>

<br/>


					<table class="table-bordered table-striped table">

						<tr align="center">

							<td>ID заказа</td>
                    
							<td>Имя покупателя</td>

				                	<td>Телефон покупателя</td>
				
                	<td>Дата оформления заказа</td>
							<td>Статус заказа</td>                 							                					</tr>
				
                <?php foreach ($ordersListNew as $order): ?>							
			    
                    <tr style="color: green; font-weight: 500;" align="center">

				                        <td>
<?php echo $order['id']; ?>
</td>

				                        <td>
								<?php foreach ($userList as $user): ?>
									<?php if ($order['user_id'] == $user['id']) echo $user['name']; ?>
								<?php endforeach; ?>
							</td>
				
                        <td><?php echo $order['user_phone']; ?></td>
				
                        <td><?php echo $order['date']; ?></td> 
							<td><?php echo Order::getStatusText($order['status']); ?></td>              
			        
                        <td><a class="link" href="/admin/order/view/<?php echo $order['id']; ?>">Show</a></td>

				                        <td><a class="link" href="/admin/order/update/<?php echo $order['id']; ?>">Upd</td>
				
                        <td><a class="link" href="/admin/order/delete/<?php echo $order['id']; ?>">Del</a></td>

			                        </tr>

	                			<?php endforeach; ?>
						<?php foreach ($ordersListProcess as $order): ?>
			    
                    <tr style="color: orange;" align="center">

				                        <td size="20">
<?php echo $order['id']; ?>
</td>

				                        <td>
								<?php foreach ($userList as $user): ?>
									<?php if ($order['user_id'] == $user['id']) echo $user['name']; ?>
								<?php endforeach; ?>
							</td>
				
                        <td><?php echo $order['user_phone']; ?></td>
				
                        <td><?php echo $order['date']; ?></td>
							<td><?php echo Order::getStatusText($order['status']); ?></td>	
                        
			        
                        <td><a class="link" href="/admin/order/view/<?php echo $order['id']; ?>">Show</a></td>

				                        <td><a class="link" href="/admin/order/update/<?php echo $order['id']; ?>">Upd</td>
				
                        <td><a class="link" href="/admin/order/delete/<?php echo $order['id']; ?>">Del</a></td>

			                        </tr>

		                		<?php endforeach; ?>
						<?php foreach ($ordersList as $order): ?>
			    
                    <tr style="color: black;" align="center">

				                        <td size="20">
<?php echo $order['id']; ?>
</td>

				                        <td>
								<?php foreach ($userList as $user): ?>
									<?php if ($order['user_id'] == $user['id']) echo $user['name']; ?>
								<?php endforeach; ?>
							</td>
				
                        <td><?php echo $order['user_phone']; ?></td>
				
                        <td><?php echo $order['date']; ?></td>
							<td><?php echo Order::getStatusText($order['status']); ?></td>	
                        
			        
                        <td><a class="link" href="/admin/order/view/<?php echo $order['id']; ?>">Show</a></td>

				                        <td><a class="link" href="/admin/order/update/<?php echo $order['id']; ?>">Upd</td>
				
                        <td><a class="link" href="/admin/order/delete/<?php echo $order['id']; ?>">Del</a></td>

			                        </tr>

		                		<?php endforeach; ?>
					</table>


					
					
				
                
					
					
			</div>
    
		</div>
	
</section>



