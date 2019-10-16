<?php include ROOT . '/views/layouts/header_admin.php'; ?>


	<section>
   
		<div class="container">
   
			<div class="row">

<br/>

  
				<h4 align="center">Удаление товара</h4>
       
    				<h4>Вы действительно хотите удалить товар со следующим индификатором <?php echo $id; ?>?</h4>     
       	 			<form method="post">
      
					<input type="submit" name="submit" value="Удалить" />
      
        			</form>


				<a href="/admin/product" class="link"><h4><<Назад</h4></a>  
        		</div>
 
	 	</div>

	</section>


