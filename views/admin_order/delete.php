<?php include ROOT . '/views/layouts/header_admin.php'; ?>
	

<section>

		<div class="container">

			<div class="row">

<br/>				
				<h4>Вы действительно хотите удалить заказ с индификатором <?php echo $id; ?>?</h4>	               		
	               		<form method="post">

		                	<input type="submit" name="submit" value="Удалить">
</input>
				</form>


				<a href="/admin/order/" class="link"><<Назад</a>
 
			</div>

		</div>

	</section>



