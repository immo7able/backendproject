<!DOCTYPE html>
<?php 
	session_start(); 
	$error='';
	$regerror='';
	$message='';
	if(!empty($_SESSION['message'])){
		echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";
		$_SESSION['message']='';
	}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> EZBOOST SERVICE </title>
		<?php require_once('common/inhead.php')?>
		<script>
			document.addEventListener('DOMContentLoaded', function() {
				new Slider(document.querySelector('.carousel'), {
			inFrame: 2, // два элемента в кадре
			offset: 1, // смещать на один элемент
		});
	});
</script>
	</head>
	<body>
			<!-- Page Preloder -->
		<div id="preloder">
			<div class="loader"></div>
		</div>

		<!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
		<!-- Hero Section Begin -->
		<section class="hero-section hero-set-bg">
			<div class="container">
				<div class="row">
					<div class="column3">
						<div class="hs-text">
							<span>Сервис буста и продажи аккаунтов.</span>
							<h2>EZBOOST</h2>
							<p>Надоело играть на низких уровнях или хотите похвастаться перед друзьями? Заказывайте буст у лучшей команды!</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Hero Section End -->

		<!-- About Us Section Begin -->
		<section class="about-us-section spad">
			<div class="container">
				<div class="row">
					<div class="column4">
						<div class="as-pic">
							<img src="img/about-us.jpg" alt="">
						</div>
					</div>
					<div class="column4">
						<div class="as-text">
							<div class="section-title">
								<span>О нас</span>
								<h2>История</h2>
							</div>
							<p class="f-para">Более 1000 заказов и 200 положительных отзывов. </p>
							<p class="s-para">3 успешных года в сфере продаж и буста.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- About Us Section End -->

		<!-- Services Section Begin -->
		<section class="services-section spad">
			<div class="container">
				<div class="row">
					<div class="column5">
						<div class="section-title">
							<span>Наш сервис</span>
							<h2>Мы предлагаем:</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column6">
						<div class="service-item">
							<img src="img/services/faceit.png" height="120px" width="120px" alt="">
							<h4>FACEIT BOOST</h4>
							<p>Буст вашего уровня FACEIT.</p>
						</div>
					</div>
					<div class="column6">
						<div class="service-item">
							<img src="img/services/global-elite.png" height="120px" width="250px" alt="">
							<h4>MM BOOST</h4>
							<p>Буст вашего звания в MM.</p>
						</div>
					</div>
					<div class="column6">
						<div class="service-item">
							<img src="img/services/global-elite.png" height="120px" width="250px" alt="">
							<h4>WINGMAN BOOST</h4>
							<p>Буст вашего звания в режиме "напарники".</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Services Section End -->

		<!-- Counter Section Begin -->
		<section class="counter-section spad">
			<div class="container">
				<div class="row">
					<div class="column4">
						<div class="counter-text">
							<div class="section-title">
								
								<h2>У нас <br /> большой опыт</h2>
							</div>
							
						</div>
					</div>
					<div class="column4">
						<div class="counter-item">
							<div class="ci-number" id="value">
								0
							</div>
							<div class="ci-text">
								<h4>Успешных заказов</h4>
								<p>за 3 года.</p>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</section>
		<!-- Counter Section End -->

		<!-- user Section Begin -->
		<section class="user-section spad">
			<div class="container">
				<div class="row carousel">
					<div class="carousel-window">
						<div class="carousel-slides">
							<div class="column4 carousel-item">
								<div class="user-item">
									<div class="ti-pic">
										<img src="img/user/incognito1.jpg" alt="">
									</div>
									<div class="ti-text">
										<div class="ti-title">
											<h4>Аноним</h4>
											<span>Покупатель</span>
										</div>
										<p>Приятные цены</p>
									</div>
								</div>
							</div>
							<div class="column4 carousel-item">
								<div class="user-item">
									<div class="ti-pic">
										<img src="img/user/incognito1.jpg" alt="">
									</div>
									<div class="ti-text">
										<div class="ti-title">
											<h4>Аноним</h4>
											<span>Покупатель</span>
										</div>
										<p>Быстро и качественно</p>
									</div>
								</div>
							</div>
							<div class="column4 carousel-item">
								<div class="user-item">
									<div class="ti-pic">
										<img src="img/user/incognito1.jpg" alt="">
									</div>
									<div class="ti-text">
										<div class="ti-title">
											<h4>Аноним</h4>
											<span>Покупатель</span>
										</div>
										<p>Всем советую</p>
									</div>
								</div>
							</div>
							<div class="column4 carousel-item">
								<div class="user-item">
									<div class="ti-pic">
										<img src="img/user/incognito1.jpg" alt="">
									</div>
									<div class="ti-text">
										<div class="ti-title">
											<h4>Аноним</h4>
											<span>Покупатель</span>
										</div>
										<p>Лучший буст</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="carousel-next">
						<span class="carousel-prev-icon">&gt;</span>
					</div>
					<div class="carousel-prev">
						<span class="carousel-next-icon">&lt;</span>
					</div>
				</div>
			</div>
		</section>
		<!-- user Section End -->


		<!-- Member Section Begin -->
		<section class="member-section spad">
			<div class="container">
				<div class="row">
					<div class="column5">
						<div class="section-title">
							<span>НАША КОМАНДА</span>
							<h2>Лучшие бустеры</h2>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="column6">
						<div class="member-item" style="background-image:url('img/member/guy1.jpg');">
							<div class="mi-text">
								<p> 10 LVL FACEIT </p>
								<div class="mt-title">
									<h4>73</h4>
									<span>Booster</span>
								</div>
								<div class="mt-social">
									<a href="#"><span class="iconify" data-icon="ri:steam-fill" data-width="80%" data-height="80%"></span></a>
									<a href="#"><span class="iconify" data-icon="simple-icons:faceit" data-width="50%" data-height="50%" data-inline="false"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column6">
						<div class="member-item" style="background-image:url('img/member/guy2.jpg');">
							<div class="mi-text">
								<p>10 LVL FACEIT</p>
								<div class="mt-title">
									<h4>Swallow</h4>
									<span>Booster</span>
								</div>
								<div class="mt-social">
									<a href="#"><span class="iconify" data-icon="ri:steam-fill" data-width="80%" data-height="80%"></span></a>
									<a href="#"><span class="iconify" data-icon="simple-icons:faceit" data-width="50%" data-height="50%" data-inline="false"></span></a>
								</div>
							</div>
						</div>
					</div>
					<div class="column6">
						<div class="member-item" style="background-image:url('img/member/guy3.jpg');">
							<div class="mi-text">
								<p>10 LVL FACEIT</p>
								<div class="mt-title">
									<h4>Devilbtw</h4>
									<span>Booster</span>
								</div>
								<div class="mt-social">
									<a href="#"><span class="iconify" data-icon="ri:steam-fill" data-width="80%" data-height="80%"></span></a>
									<a href="#"><span class="iconify" data-icon="simple-icons:faceit" data-width="50%" data-height="50%" data-inline="false"></span></a> 
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- Member Section End -->
		<!-- Footer Section Begin -->
		<?php require_once('common/footer.php'); ?>
		<!-- Footer Section End -->
		<!-- Js Plugins -->
		<script>
		function animateValue(obj, start, end, duration) {
		  let startTimestamp = null;
		  const step = (timestamp) => {
			if (!startTimestamp) startTimestamp = timestamp;
			const progress = Math.min((timestamp - startTimestamp) / duration, 1);
			obj.innerHTML = Math.floor(progress * (end - start) + start);
			if (progress < 1) {
			  window.requestAnimationFrame(step);
			}
		  };
		  window.requestAnimationFrame(step);
		}

		const obj = document.getElementById("value");
		animateValue(obj, 0, 1000, 1500);
		</script>
	</body>
</html>