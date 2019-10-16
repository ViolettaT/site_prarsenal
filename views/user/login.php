<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4 padding-center">
				<?php if (isset($errors) && is_array($errors)): ?>
				<ul>
                        		<?php foreach ($errors as $error): ?>
                            		<li> - <?php echo $error; ?></li>
                        		<?php endforeach; ?>
                    		</ul>
                		<?php endif; ?>

                	<div>
				<h3 class="link">Вход на сайт</h3>
				<form action="#" method="post">
                        		<input type="email" name="email" placeholder="E-mail" value="<?php echo $email; ?>"/>
					<p></p>
					<p></p>
                        		<input type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>"/>
					<p></p>
					<p></p>
                        		<input type="submit" name="submit" value="Вход" />
                    		</form>
                	</div>
			</div>
		</div>
	</div>
</section>

