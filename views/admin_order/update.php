<?php include ROOT . '/views/layouts/header_admin.php'; ?>		
	

<section>

		<div class="container">

			<div class="row"><br/>	
				<div class="col-lg-4">
					<div>

						<form action="#" method="post">


							<table width="400px", cellpadding="5px">
							   <tr>
								<td colspan="2"><h4>Редактирование заказа с индификатором <?php echo $id; ?></h4>

</td>
							   </tr
							   <tr>
								<td>Имя покупателя</td>
								<td>			
									<?php foreach ($userList as $user): ?>
										<?php if ($order['user_id'] == $user['id']) echo $user['name']; ?>
									<?php endforeach; ?>
								</td>								
							   </tr>
							   <tr>
								<td>Номер телефона</td>
				                        	<td>
				
                        		<input type="text" name="userPhone" value="<?php echo $order['user_phone']; ?>">
								</td>


							   </tr>
							   <tr>
								<td>Способ доставки</td>
								<td>
									<select name="type_delivery">

                            							<?php if (is_array($DeliveryList)): ?>

                                							<?php foreach ($DeliveryList as $delivery): ?>

                             <option value="<?php echo $delivery['id']; ?>" <?php if ($order['delivery_id'] == $delivery['id']) echo ' selected="selected"'; ?>>
 
                                        								<?php echo $delivery['type']; ?>
 
                             </option>
 
                               								<?php endforeach; ?>
 
                           							<?php endif; ?>
 
                       							</select>
								</td>	
							   </tr>	
							   <tr>
								<td>Адрес выгрузки</td>
				
                		<td>
							 		<input size="23px" type="text" name="userAdress" value ="<?php echo $order['address_delivery']; ?>">
								</td>


				                            </tr>
							    <tr>
								<td>Дата оформления заказа</td>
								<td>
				                        		<input type="text" name="date" value="<?php echo $order['date']; ?>">
								</td>
							    </tr>
							    <tr>
								<td>Статуc</td>
				

                        	<td>
				
                        		<select name="status">

					                            		<option value="1" <?php if ($order['status'] == 1) echo ' selected="selected"'; ?>>
											Новый заказ
								    		</option>

					                            		<option value="2" <?php if ($order['status'] == 2) echo ' selected="selected"'; ?>>
											В обработке
								    		</option>
						
                    		<option value="3" <?php if ($order['status'] == 3) echo ' selected="selected"'; ?>>												Доставляется		
								    		</option>

					                            		<option value="4" <?php if ($order['status'] == 4) echo ' selected="selected"'; ?>>
											Закрыт
								    		</option>

				                       			</select>
								</td>

							  </tr>
							  <tr>					                    
				                        	<td colspan="2" align = "right">
									<input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
								</td>
							  </tr>
							</table>
							<a href="/admin/order/" class="link"><h4><<Назад</h4></a>
 
						</form>

					</div>

				</div>

        
			</div>
   
		</div>

	</section>