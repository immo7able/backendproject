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
		<title> FAQ </title>
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
                        <span>F.A.Q.</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>F.A.Q.</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
	
	<!-- FAQ Section End -->
		<section class="faq-section">
			<div class="container">
				<div class="row">
					<div class="faq-header"><span>BOOST</span></div>
					<details class="column7">
						<summary class="faq-title"><span>Как работает наш сервис?</span></summary>
						<p></p><div class="faq-info"><span>Выберите интересующий вас товар и оформите заказ. После оплаты заказа наши бустеры примутся за него как можно быстрее и вы увидите результат уже на следующий день.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Гарантии честности?</span></summary>
						<p></p><div class="faq-info"><span>Более 3 лет работы и 200 исключительно положительных отзывов на площадке FUNPAY.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Как быстро происходит выполнение заказа?</span></summary>
						<p></p><div class="faq-info"><span>Мы приступаем к выполнению заказа в течение суток после оплаты.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Могу ли я получить бан?</span></summary>
						<p></p><div class="faq-info"><span>Мы не используем читы, эксплойты, баги или вертиго при выполнении заказа. Вы не можете быть забанены за наше повышение ранга в CS:GO. Если мы говорим о правилах таких лиг, как Faceit и ESEA, то использование любых сервисов для повышения уровня или эло нарушает правила платформы. Передача аккаунта, наличие нескольких аккаунтов, а также бустинг запрещены. Таким образом, вы несете полную ответственность за подобные нарушения. Однако это лишь формальность, основанная на том факте, что мы никогда не сталкивались с ситуациями блокировок аккаунтов, поскольку всегда применяем необходимые меры безопасности.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Могу ли я играть в кс во время буста?</span></summary>
						<p></p><div class="faq-info"><span>Вы не сможете играть в CS:GO или другие игры, пока бустер выполняет свою работу.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Как производится буст?</span></summary>
						<p></p><div class="faq-info"><span>Буст производится только с передачей аккаунта. Это значит, что нам нужны будут ваши данные Steam/Faceit.</span></div>
					</details>
					<div class="faq-header"><span>Аккаунты</span></div>
					<details class="column7">
						<summary class="faq-title"><span>Откуда аккаунты?</span></summary>
						<p></p><div class="faq-info"><span>Аккаунты Steam и Faceit  сделаны членами команды с помощью обычного смурфинга. Мы не используем запрещенные методы для повышения Эло и Ранга. Все наши аккаунты идут в комплекте с оригинальной электронной почтой.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Если аккаунт забанят?</span></summary>
						<p></p><div class="faq-info"><span>Аккаунты автореги не могут забанить просто так, клиент несет полную ответственность за этот бан. То же касается и аккаунтов Faceit, клиент должен попытаться скрыть, что аккаунт - смурф.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Как быстро я получу аккаунт?</span></summary>
						<p></p><div class="faq-info"><span>Данные от аккаунта после покупки выдаются автоматически.</span></div>
					</details>
					<details class="column7">
						<summary class="faq-title"><span>Могут ли восстановить аккаунт?</span></summary>
						<p></p><div class="faq-info"><span>Все аккаунты созданы нами самостоятельно, их никто не может восстановить.</span></div>
					</details>
				</div>
			</div>
		</section>
	<!-- FAQ Section End -->
	
    <!-- Footer Section Begin -->
		<?php require_once('common/footer.php'); ?>
		<!-- Footer Section End -->

    <!-- Js Plugins -->
</body>

</html>