<header class="header-section">
			<div class="container">
				<div class="row">
					<div class="column1">
						<div class="logo">
							<a href="#">
								<img src="img/logo.png">
							</a>
						</div>
					</div>
					<div class="column2">
						<div class="main-menu">
							<ul>
								<?php 	
									$url = $_SERVER['REQUEST_URI'];
								?>
								<li <?php if(str_contains($url, 'index.php'))echo "class='active'"?>><a href="./index.php">Главная</a></li>
								<li <?php if(str_contains($url, 'about-us.php'))echo "class='active'"?>><a href="./about-us.php">О нас</a></li>
								<li <?php if(str_contains($url, 'calc.php'))echo "class='active'"?>><a href="./calc.php">Калькулятор</a></li>
								<li <?php if(str_contains($url, 'shop.php'))echo "class='active'"?>><a href="./shop.php">Аккаунты</a></li>
								<li <?php if(str_contains($url, 'faq.php'))echo "class='active'"?>><a href="./faq.php">F.A.Q.</a></li>
								<?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
									echo "<li ";if(str_contains($url, 'category.php'))echo"class='active'";echo"><a href='./category.php'>Категории</a></li>";
								} ?>
								<?php if(isset($_SESSION['user']) && $_SESSION['user']['role']=='admin'){
									echo "<li ";if(str_contains($url, 'ban.php'))echo"class='active'";echo"><a href='./ban.php'>Бан</a></li>";
								} ?>
							</ul>
						</div>
						<div class="register">
						<?php
							if (!isset($_SESSION['user']))
							{
								echo "<a href='loginform.php'>Войти</a>";
							}
							else
							{
								echo "<a href='profile.php'><img class='avatar' src='http://localhost/backendproject/img/users/".$_SESSION['user']['avatar']."'></a><span id='register'>Привет, <a href='profile.php'>".$_SESSION['user']['login']."</a><form action='logout.php' method='POST'><div class='field-group'><button type='submit'>Logout</button></div></form>";
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</header>