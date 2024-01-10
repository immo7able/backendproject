<!DOCTYPE html>
<?php 
	session_start(); $error='';$regerror='';$message='';
	include ('shop-bd.php');
	if(isset($_GET['action']) && $_GET['action']=="add"){ 
		$id=intval($_GET['id_products']); 
		if(isset($_SESSION['cart'][$id])){  
			$_SESSION['cart'][$id]['quantity']++;  
		}else{  
			$sql_s="SELECT * FROM products WHERE id_products={$id}"; 
			$query_s=mysqli_query($conn2, $sql_s); 
			if(mysqli_num_rows($query_s)!=0){ 
				$row_s=mysqli_fetch_array($query_s);  
				$_SESSION['cart'][$row_s['id_products']]=array( 
						"quantity" => 1, 
						"price" => $row_s['price'] 
					); 
			}else{  
				$message="Неправильный id продукта.";  
			} 	 
		}  
	} 
?>
<html>

<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> Аккаунт </title>
		<link href="https://fonts.googleapis.com/css?family=Libre+Franklin:400,500,600,700,800,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="styles.css"/>
		<script src="slider.js"></script>
		<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script>
		$(document).ready(function(){
			<?php
				if(!empty($_SESSION['login']) or !empty($_SESSION['id'])) echo "PopUpHide();";
				else{
					if((empty($_SESSION['error']) and empty($_SESSION['regerror']))) echo "PopUpHide();";
					else if(!empty($_SESSION['regerror'])) echo "document.addEventListener('load', PopUpShow());goToRegPage();";
					else {echo "document.addEventListener('load', PopUpShow());goToLogPage();";};
					}
			?>
		});
		function PopUpShow(){
			$("#popup1").show();
		}
		function PopUpHide(){
			$("#popup1").hide();
		}
		</script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
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
								<li><a href="./index.php">Главная</a></li>
								<li><a href="./about-us.php">О нас</a></li>
								<li><a href="./calc.php">Калькулятор</a></li>
								<li class="active"><a href="./shop.php">Аккаунты</a></li>
								<li><a href="./faq.php">F.A.Q.</a></li>
							</ul>
						</div>
						<div class="register">
						<?php
							if (empty($_SESSION['login']) or empty($_SESSION['id']))
							{
								echo "<a href='javascript:PopUpShow()'>Войти</a>";
							}
							else
							{
								echo "<span id='register'>Привет, ".$_SESSION['login']."</span><a href='logout.php'>Выход</a>";
							}
						?>
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- Header End -->
		<div class="b-popup" id="popup1">
			<div id="forform" class="b-popup-content">
				<form id="form" action="testreg.php" method="post">
					<div class="text-field">
						<label class="text-field__label" for="login">Логин</label>
						<input class="text-field__input" type="text" name="login" id="login" placeholder="Login">
					</div>
					<div class="text-field">
						<label class="text-field__label" for="password">Пароль</label>
						<input class="text-field__input" type="password" name="password" id="password" placeholder="Password">
					</div>
					<div class="popup-buttons">
						<input type="submit" name="submit" value="Войти" class="custom-btn btn-3" style="width:40%;">
						<input type="button" onclick="goToRegPage()" value="Зарегистрироваться" class="custom-btn btn-3" style="width:59%;">
					</div>					
					</form>
					<span id = "message"><?php if(isset($_SESSION['error'])) echo $_SESSION['error'];else if(isset($_SESSION['regerror']))echo $_SESSION['regerror']; else echo "";?></span>
				<span id="regclose"><a href="javascript:PopUpHide()">Закрыть окно</a></span>
			</div>
		</div>

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="column4">
                    <div class="breadcrumb-option">
                        <a href="./index.php">Главная</a>
                        <span>Аккаунты</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>Аккаунты</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	
	<!-- Shop Section Begin -->
	<section class="shop-section">
		<div class="container">
			<div class="row">
			<?php 
			$sql="SELECT * FROM products WHERE id_products IN (3) ORDER BY name ASC"; 
			$query=mysqli_query($conn2, $sql); 
			$row=mysqli_fetch_array($query); 
			?> 
				<div class="shop-main"> 
					<div class="account-name"><?php echo $row['name'];  ?> </div>
					<div class="account-description"><?php echo $row['description'];  ?></div>
					<div class="account-price">Цена: <span style="color:#e32879;"><?php echo $row['price'];  ?></span> руб.</div>
					<div class="cart-add custom-btn btn-3"><a href="3.php?page=products&action=add&id_products=<?php echo $row['id_products']; ?>">Добавить в корзину</a></div>
				</div><!--end of main-->  
				<div class="shop-sidebar">
					<h1>Cart</h1> 
						<?php 
							if(isset($_SESSION['cart'])){ 
								$ids="";
								$sql="SELECT * FROM products WHERE id_products IN (";  
								foreach($_SESSION['cart'] as $id => $value) { 
									$ids.=$id;
								}
								if(!empty($ids)){
									foreach($_SESSION['cart'] as $id => $value) { 
									$sql.=$id.","; 
								}
								$sql=substr($sql, 0, -1).") ORDER BY name ASC"; 
								$query=mysqli_query($conn2, $sql); 
								while($row=mysqli_fetch_array($query)){ 
								?> 
									<p><?php echo $row['name'] ?> x <?php echo $_SESSION['cart'][$row['id_products']]['quantity'] ?></p> 
								<?php  
								} 
							?> 
								<hr /> 
								<div class="cart-add custom-btn btn-3"><a href="shop.php?page=cart">В корзину</a></div> 
							<?php  
							}else 
								echo "<p>Корзина пуста. Добавьте товары.</p>";
							}else{ 
								echo "<p>Корзина пуста. Добавьте товары.</p>"; 
							} 
						?>
				</div><!--end of sidebar--> 
			</div>
		</div>
	</section>
	<!-- Shop Section End -->
	
    <!-- Footer Section Begin -->
		<section class="footer-section">
			<div class="container">
				<div class="row">
					<div class="column7">
						<div class="footer-option">
							<div class="fo-logo">
								<a href="#">
									<img src="img/logo.png" height="50px" width="160px"alt="">
								</a>
							</div>
							<ul>
								<li>Address: 66-66 Road 666 New York</li>
								<li>Phone: 87777777777</li>
								<li>Email: ezboost@gmail.com</li>
							</ul>
							<div class="fo-social">
								<a href="#"><span class="iconify" data-icon="ri:steam-fill" data-width="80%" data-height="80%"></span></a>
								<a href="#"><span class="iconify" data-icon="simple-icons:faceit" data-width="50%" data-height="50%" data-inline="false"></span></a> 
							</div>
						</div>
					</div>
					<div class="column7">
						<div class="footer-widget fw-links">
							<h5>Полезные ссылки</h5>
							<ul>
								<li><a href="about-us.php">О нас</a></li>
								<li><a href="calc.php">Калькулятор стоимости</a></li>
								<li><a href="faq.php">F.A.Q.</a></li>
								<li><a href="shop.php">Магазин</a></li>
							</ul>
						</div>
					</div>
				</div>
				<div class="copyright-text">
					<p>
					Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This site is made by Immovable</a>
					</p>
				</div>
			</div>
		</section>
		<!-- Footer Section End -->

    <!-- Js Plugins -->
	<script>
			function goToRegPage(){
			form.remove();
			forform.style.height='400px';
			message.innerText="<?php if(isset($_SESSION['regerror']))echo $_SESSION['regerror']; else echo "";?>";
			let form1 = document.createElement('form');
			form1.id = 'form';
			form1.action ='save_user.php';
			form1.method ='post';
			let inputName = document.createElement('input');
			inputName.type = 'text';
			inputName.id = 'name';
			inputName.placeholder = 'Name';
			inputName.name = 'name';
			inputName.className = 'text-field__input';
			let inputLabel = document.createElement('label');
			inputLabel.className = 'text-field__label';
			inputLabel.for = 'name';
			inputLabel.innerText = 'Имя';
			let divName= document.createElement('div');
			divName.className = 'text-field';
			divName.append(inputLabel);
			divName.append(inputName);
			let inputLogin = document.createElement('input');
			inputLogin.type = 'text';
			inputLogin.id = 'login';
			inputLogin.placeholder = 'Login';
			inputLogin.name = 'login';
			inputLogin.className = 'text-field__input';
			let inputLabel2 = document.createElement('label');
			inputLabel2.className = 'text-field__label';
			inputLabel2.for = 'login';
			inputLabel2.innerText = 'Логин';
			let divLogin= document.createElement('div');
			divLogin.className = 'text-field';
			divLogin.append(inputLabel2);
			divLogin.append(inputLogin);
			let inputPassword = document.createElement('input');
			inputPassword.type = 'password';
			inputPassword.id = 'password';
			inputPassword.placeholder = 'Password';
			inputPassword.name = 'password';
			inputPassword.className = 'text-field__input';
			let inputLabel3 = document.createElement('label');
			inputLabel3.className = 'text-field__label';
			inputLabel3.for = 'password';
			inputLabel3.innerText = 'Пароль';
			let divPassword= document.createElement('div');
			divPassword.className = 'text-field';
			divPassword.append(inputLabel3);
			divPassword.append(inputPassword);
			let BReg = document.createElement('input');
			BReg.className="custom-btn btn-3";
			BReg.style.width = "59%";
			BReg.value = 'Зарегистрироваться';
			BReg.type="submit";
			BReg.name = "submit";
			let BLog = document.createElement('input');
			BLog.className="custom-btn btn-3";
			BLog.type="button";
			BLog.style.width = "40%";
			BLog.value = 'Войти';
			BLog.addEventListener('click', goToLogPage);
			let Buttons = document.createElement('div');
			Buttons.className = "popup-buttons";
			Buttons.append(BReg);
			Buttons.append(BLog);
			form1.append(divName);
			form1.append(divLogin);
			form1.append(divPassword);
			form1.append(Buttons);
			forform.prepend(form1);
		}
		function goToLogPage(){
			form.remove();
			forform.style.height='300px';
			message.innerText="<?php if(isset($_SESSION['error']))echo $_SESSION['error']; else echo "";?>";
			let form1 = document.createElement('form');
			form1.id = 'form';
			form1.action ='testreg.php';
			form1.method ='post';
			let inputLogin = document.createElement('input');
			inputLogin.type = 'text';
			inputLogin.id = 'login';
			inputLogin.placeholder = 'Login';
			inputLogin.name = 'login';
			inputLogin.className = 'text-field__input';
			let inputLabel2 = document.createElement('label');
			inputLabel2.className = 'text-field__label';
			inputLabel2.for = 'login';
			inputLabel2.innerText = 'Логин';
			let divLogin= document.createElement('div');
			divLogin.className = 'text-field';
			divLogin.append(inputLabel2);
			divLogin.append(inputLogin);
			let inputPassword = document.createElement('input');
			inputPassword.type = 'password';
			inputPassword.id = 'password';
			inputPassword.placeholder = 'Password';
			inputPassword.name = 'password';
			inputPassword.className = 'text-field__input';
			let inputLabel3 = document.createElement('label');
			inputLabel3.className = 'text-field__label';
			inputLabel3.for = 'password';
			inputLabel3.innerText = 'Пароль';
			let divPassword= document.createElement('div');
			divPassword.className = 'text-field';
			divPassword.append(inputLabel3);
			divPassword.append(inputPassword);
			let BLog = document.createElement('input');
			BLog.className="custom-btn btn-3";
			BLog.style.width = "40%";
			BLog.value = 'Войти';
			BLog.type="submit";
			BLog.name = "submit";
			let BReg = document.createElement('input');
			BReg.className="custom-btn btn-3";
			BReg.type="button";
			BReg.style.width = "59%";
			BReg.value = 'Зарегистрироваться';
			BReg.addEventListener('click', goToRegPage);
			let Buttons = document.createElement('div');
			Buttons.className = "popup-buttons";
			Buttons.append(BLog);
			Buttons.append(BReg);
			form1.append(divLogin);
			form1.append(divPassword);
			form1.append(Buttons);
			forform.prepend(form1);
		}
		</script>
</body>

</html>