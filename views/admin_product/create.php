<?php include ROOT . '/views/layouts/header_admin.php'; ?>


	<section>

		<div class="container">
 
			<div>

<br/>

        
    				<h4 align="center">Добавление нового продукта</h4>

<br/>


            			<?php if (isset($errors) && is_array($errors)): ?>

               			 	<ul>

                    			<?php foreach ($errors as $error): ?>

                        			<li> - <?php echo $error; ?></li>
 
                   			<?php endforeach; ?>

                			</ul>

            			<?php endif; ?>


            			<div class="col-lg-4">
                			 
                   			<form action="#" method="post" enctype="multipart/form-data">


						<table width="600px", cellpadding="5px">
							<tr>
								<td>Название продукта</td>
								<td>
                                                			<input type="text" name="name" value="">


								</td> 
							</tr>
							<tr>
								<td>Срок годности</td>
								<td>
 
                       							<input type="text" name="availability" value="">
								</td>
							</tr>
							<tr>
								<td>Кол-во товара в упаковке</td>
                       						<td> 
                       							<input type="text" name="count" value="">


								</td>
							</tr>
							<tr>
								<td>Стоимость продукта</td>
								<td>
 
                       							<input type="text" name="price" value="">
								</td>
							</tr>
							<tr>
								<td>Категория</td>
								<td>			
                       							<select name="category_id">

                            						<?php if (is_array($categoriesList)): ?>

                                						<?php foreach ($categoriesList as $category): ?>

                                    							<option value="<?php echo $category['id']; ?>">

                                        							<?php echo $category['name']; ?>
 
                                   							</option>
 
                               							<?php endforeach; ?>
 
                           						<?php endif; ?>
 
                       							</select>
								</td>

							</tr>
							<tr>

 
								<td>Описание продукта</td>
								<td><textarea name="description"></textarea></td>
							</tr>
							<tr>
								<td>Изображение продукта</td>
								<td>
									<input type="file" name="image" placeholder="" value="">


								</td>
							</tr>
							<tr>
								<td colspan="2" align="right">	
                     							<input type="submit" name="submit" class="btn btn-default" value="Сохранить" />


								</td>
							</tr> 
						</table> 
						<a href="/admin/product/" class="link"><h4><<Назад</h4></a>
                     
					</form>              
				</div>

  
			</div>
   
		</div>

	</section>


