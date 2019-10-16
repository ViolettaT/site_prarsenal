<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 padding-right">
				<?php if ($result): ?>
                    			<h4 class="text-center">Вы зарегестрированы!</h4>
                		<?php else: ?>
                    		<?php if (isset($errors) && is_array($errors)): ?>
                        		<ul>
                            			<?php foreach ($errors as $error): ?>
                                		<li> - <?php echo $error; ?></li>
                            			<?php endforeach; ?>
                        		</ul>
                    		<?php endif; ?>
			<div>
                        	<h3 class="link">Регистрация на сайте</h3>
                        	<form action="#" method="post">
                            		<input type="text" name="name" placeholder="ФИО" value="<?php echo $name; ?>"/>
					<p></p>
					<p></p>
                           		<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
					<p></p>
					<p></p>
                            		<input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
					<p></p>
					<p></p>
                            		<input type="submit" name="submit" value="Зарегестрироваться" />
                        	</form>
			</div>                
                		<?php endif; ?>                
            		</div>
		</div>
	</div>
</section>

