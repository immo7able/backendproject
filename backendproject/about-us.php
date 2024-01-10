<!DOCTYPE html>
<?php 
	session_start(); $error='';$regerror='';$message='';
	if(!empty($_SESSION['message'])){echo "<script language='javascript'>alert('".$_SESSION['message']."');</script>";$_SESSION['message']='';}
?>
<html>

<head>
		<meta charset="UTF-8">
		<meta name="description" content="BOOST SERVICE">
		<meta name="keywords" content="Boost, rank, cs:go">
		<title> О нас </title>
		<?php require_once('common/inhead.php')?>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
		<?php require_once('common/header.php'); ?>
		<!-- Header End -->
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="column4">
                    <div class="breadcrumb-option">
                        <a href="./index.php">Главная</a>
                        <span>О нас</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>О нас</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

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
                    <div class="as-text ap-text">
                        <div class="section-title">
                            <span>О нас</span>
                            <h2>Наша история</h2>
                        </div>
                        <p class="f-para"> Начиная с 2020 мы продолжаем радовать наших клиентов дешевым и качественным сервисом. </p>
                        <p class="s-para"> Ваша поддержка очень много значит для нас! </p>
                        <div class="about-counter">
                            <div class="ac-item">
                                <h2 class="ab-count" id="value1">0</h2>
                                <p>Заказов</p>
                            </div>
                            <div class="ac-item">
                                <h2 class="ab-count" id="value2">0</h2>
                                <p>Положительных отзывов</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- About Us Section End -->

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

		const obj1 = document.getElementById("value1");
		const obj2 = document.getElementById("value2");
		animateValue(obj1, 0, 1000, 1500);
		animateValue(obj2, 0, 200, 1500);
		</script>
</body>

</html>