<?php include ROOT . '/views/layouts/header_admin.php'; ?>
	

<section>

		<div class="container">

			<div class="row">

<br/>
			
				<h3 class="text-center">История заказов:</h3>

<br/>


				<table align="center", border="1", width="600px">

					<tr align="center">

						<td><h4>ID покупателя</h4></td>							                   
						<td><h4>ФИО покупателя</h4></td>
	
						<td><h4>Просмотреть историю заказов</h4></td>
				                
				
         </tr>
				
         <?php foreach ($userList as $user): ?>						
			    
              <tr align="center">

						<td><?php echo $user['id']; ?></td>
 				                        
				          	<td><?php echo $user['name']; ?></td>
                				
                                      
			        
                <td><a class="link" href="/admin/history/view/<?php echo $user['id']; ?>">Show</a></td>
					</tr>

	                		<?php endforeach; ?>						
				</table>	
			</div>
    
		</div>
	
</section>



