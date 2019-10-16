<?php include ROOT . '/views/layouts/header_admin.php'; ?>


<section>
   
 	<div class="container">
        
		<div class="row"><br/>

          
  			<h4 align="center">Список товаров:</h4>    
			<br/>

           
 			<table align="center", border="1", width="1000">				     
            			<tr align="center">

                   			<td><b>ID товара</b></td>             				
  
            				<td><b>Название товара</b></td>
   
            				<td><b>Цена</b></td>
            
    
            				<td><b>Удалить</b></td>
					
 <td><b>Редактировать</b></td>     
            			</tr>
 
               			<?php foreach ($productsList as $product): ?>
   
            			<tr align="center">
                
            				<td><?php echo $product['id']; ?></td>          
            				<td><?php echo $product['name']; ?></td>
  
            				<td><?php echo $product['price']; ?>  руб.</td>               
            				<td>
						<a href="/admin/product/delete/<?php echo $product['id']; ?>" title="Удалить" style="color:black">
							Del
						</a>
					</td>
 
					<td>
						<a href="/admin/product/update/<?php echo $product['id']; ?>" title="Изменить" style="color:black">
							Upd
						</a>
					</td>
         
            			</tr>
       
         			<?php endforeach; ?>
       
     			</table>


			<p></p>
			<p></p>
			<br/>


			<a href="/admin/product/create" class="a">Добавить товар</a>
  
      		</div>
   
 	</div>

</section>


