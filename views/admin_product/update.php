<?php include ROOT . '/views/layouts/header_admin.php'; ?>


	<section>

		<div class="container">

			<div class="row">


				<div class="col-lg-4">
					<form action="#" method="post" enctype="multipart/form-data">

<br />
						<table width="600px", cellpadding="5px">
							<tr>
								<td colspan="2"><h4>Обновление товара:</h4><td>
							</tr>
							<tr>
								<td>Название продукта</td>
								<td>		                        
			
                        			<input type="text" name="name" placeholder="" value="<?php echo $product['name']; ?>">

 
								</td>
							</tr> 
							<tr>
								<td>Срок годности</td>
								<td>
 
                       							<input type="text" name="availability" value="<?php echo $product['availability']; ?>">
								</td>
							</tr>
							<tr> 
								<td>Кол-во продукта в упаковке</td>                     													<td>
			                        			<input type="text" name="count" placeholder="" value="<?php echo $product['count']; ?>">

 
								</td>
							</tr>
							<tr>
								<td>Стоимость продукта, руб.</td>
                       						<td>
			                       				<input type="text" name="price" placeholder="" value="<?php echo $product['price']; ?>">


								</td>
							</tr>
							<tr>
								<td>Категория</td>
								<td>
									<select name="category_id">

			                           			<?php if (is_array($categoriesList)): ?>
 
			                               				<?php foreach ($categoriesList as $category): ?>
 
			    <option value="<?php echo $category['id']; ?>" <?php if ($product['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
  
				                                      			<?php echo $category['name']; ?>
    
			    </option>
 
			                               				<?php endforeach; ?>
  
			                         			<?php endif; ?>
 
			                       				</select>
  
								</td> 
							</tr>
							<tr>
								<td>Описание продукта</td>
								<td>                     
									<textarea name="description"><?php echo $product['description']; ?></textarea>

								</td>
							</tr>
							<tr>
								<td>Изображение продукта</td>
								<td>            
                        
		                                			<img src="<?php echo Product::getImage($product['id']); ?>" width="200" alt="" />
									<p></p>
									<input type="file" name="image" placeholder="" value="<?php echo $product['image']; ?>">

 
								</td>
							</tr>
							<tr>
								<td colspan="2" align="right">
									<input type="submit" name="submit" class="btn btn-default" value="Обновить">

								<td>
							</tr>
						</table>
						<a href="/admin/product/" class="link"><h4><<Назад</h4></a>
 
					</form>			
				</div>


			</div>
		</div>

	</section>

