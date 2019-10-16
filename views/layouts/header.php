<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Главная</title>
        <link href="/template/css/bootstrap.min.css" rel="stylesheet">
        <link href="/template/css/font-awesome.min.css" rel="stylesheet">
        <link href="/template/css/prettyPhoto.css" rel="stylesheet">
        <link href="/template/css/price-range.css" rel="stylesheet">
        <link href="/template/css/animate.css" rel="stylesheet">
        <link href="/template/css/main.css" rel="stylesheet">
        <link href="/template/css/responsive.css" rel="stylesheet">

	<link href="/template/css/link.css" rel="stylesheet">
	<link href="/template/css/about.css" rel="stylesheet">
	<link href="/template/css/delivery.css" rel="stylesheet">
	        
	<!--[if lt IE 9]>
        <script src="js/html5shiv.js"></script>
        <script src="js/respond.min.js"></script>
        <![endif]-->       
        <link rel="shortcut icon" href="/template/images/ico/favicon.ico">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/template/images/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/template/images/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/template/images/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="/template/images/ico/apple-touch-icon-57-precomposed.png">
    </head><!--/head-->

   <body>	
        	<div>
			<div>
                    		<div class="container">  
					<ul>
                                        	<li><a href="#" class="link">Телефон: +7(903) 40-44-813 </a></li>
                                        	<li><a href="#" class="link">E-mail: pryanichniy.arsenal@yandex.ru</a></li>
						<li><a href="#" class="link">Адрес: ул. Достоевского 70-B, г. Шахты, Ростовская обл.</a></li>
                                	</ul>                     
                                <div class="shop-menu pull-right">					
                                    <ul>					
                                        <li><a href="/cart"><i></i> <h4 class="link">Корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)</h4></a>
                                        </li>
                                        <?php if (User::isGuest()): ?>                                        
                                            <li><a href="/user/login/"><h4 class="link">Вход</h4></a></li>
                                        <?php else: ?>
                                            <li><a href="/cabinet/"></h4 class="link">Личный кабинет</h4></a></li>
                                            <li><a href="/user/logout/"></h4 class="link">Выход</h4></a></li>
                                        <?php endif; ?>
                                    </ul>
				</div>
				</div>
			</div>
		</div>

                <div>
			<div class="container">                       
                    		<div>
                                    <ul class="nav navbar-nav collapse navbar-collapse">
                                        <li><a href="/" class="link">ГЛАВНАЯ</a></li>
					                    <li><a href="/about/" class="link">О ПЕКАРНЕ</a></li>
					                    <li><a href="/order/" class="link">ДОСТАВКА И ОПЛАТА</a></li>
                                        <li><a href="/catalog/" class="link">ТОВАРЫ</a>                   
                                        <li><a href="/user/register/" class="link">РЕГИСТРАЦИЯ</a></li>
                                    </ul>
				</div>
			</div>
               </div> 
	<hr width="85%">                   
    </header>