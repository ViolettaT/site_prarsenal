<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
	<div class="container">
        	<div class="row">
			<div class="col-sm-4 col-sm-offset-4 padding-right">                
                		<?php if ($result): ?>
                    			<p>Данные отредактированы!</p>
                		<?php else: ?>
                    		<?php if (isset($errors) && is_array($errors)): ?>
                        		<ul>
                            			<?php foreach ($errors as $error): ?>
                                			<li> - <?php echo $error; ?></li>
                            			<?php endforeach; ?>
                        		</ul>
                    		<?php endif; ?>
                    	<div>
                        	<h2 class="link">Редактирование данных</h2>
				<h5>- Для редактирования ФИО введите свой пароль <br /> - Для редатирования пароля, введите новый пароль</h5>
                        	<form action="#" method="post">
                            		 Имя: <br />
                            		<input type="text" name="name" placeholder="ФИО" value="<?php echo $name; ?>"/> 
					<p></p>
					<p></p>                           
                            		Пароль: <br />
                            		<input type="password" name="password" placeholder="Пароль" value=""/>
                            		<p></p>
					<p></p>
                            		<input type="submit" name="submit" value="Сохранить" />
                        	</form>
				<a href="/cabinet" class="link"><h4><<Назад</h4></a>
                    	</div>                
                		<?php endif; ?>
                
            		</div>
        	</div>
 	</div>
</section>

