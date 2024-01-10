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
		<title> Калькулятор </title>
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
                        <span>Калькулятор стоимости</span>
                    </div>
                </div>
                <div class="column4">
                    <div class="breadcrumb-text">
                        <h3>Калькулятор стоимости</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Calculator Section Begin -->
    <section class="calculator-section" style="padding-top:50px;background-color:#191919;">
        <div class="container">
            <div class="row">
				<div class="calculator-header"><span>MM BOOST</span></div>
					<div class="mm-section">
						<div class="ranks">
								<span style="color: #FFFFFF;"><strong> Выберите ваше звание</strong> </span><br/>
								<select id="ranks1" name="ranks1" style="border-radius: 6px;padding:10px 16px;">
									<option data-path="img/ranks/silver-1.png" value="0"> Silver I </option>
									<option data-path="img/ranks/silver-2.png" value="50"> Silver II </option>
									<option data-path="img/ranks/silver-3.png" value="110"> Silver III </option>
									<option data-path="img/ranks/silver-4.png" value="170"> Silver IV </option>
									<option data-path="img/ranks/silver-elite.png" value="240"> Silver V </option>
									<option data-path="img/ranks/silver-elite-master.png" value="320"> Silver VI </option>
									<option data-path="img/ranks/gold-nova-1.png" value="410"> Nova I </option>
									<option data-path="img/ranks/gold-nova-2.png" value="510"> Nova II </option>
									<option data-path="img/ranks/gold-nova-3.png" value="620"> Nova III </option>
									<option data-path="img/ranks/gold-nova-master.png" value="740"> Nova IV </option>
									<option data-path="img/ranks/master-guardian-1.png" value="900"> Master Guardian </option>
									<option data-path="img/ranks/master-guardian-2.png" value="1080"> Master Guardian II </option>
									<option data-path="img/ranks/master-guardian-elite.png" value="1280"> Master Guardian Elite </option>
									<option data-path="img/ranks/distinguished-master-guardian.png" value="1530"> Distinguished Master Guardian </option>
									<option data-path="img/ranks/legendary-eagle.png" value="1830"> Legendary Eagle </option>
									<option data-path="img/ranks/legendary-eagle-master.png" value="2180"> Legendary Eagle Master </option>
									<option data-path="img/ranks/supreme-master-first-class.png" value="2580"> Supreme Master First Class </option> 
								</select>	
								<div id="myranksimg"><img src="img/ranks/silver-1.png"/></div>						
						</div>
						<div class="cost">
							<span> Стоимость: <span id="cost"> 0 </span>  рублей. </span>
						</div>
						<div class="ranks">
								<span style="color: #FFFFFF;"> <strong>Выберите звание, которое хотите </strong></span><br/>
								<select id="ranks2" name="ranks2" style="border-radius: 6px;padding:10px 16px;">
									<option data-path="img/ranks/silver-2.png" value="50"> Silver II </option>
									<option data-path="img/ranks/silver-3.png" value="110"> Silver III </option>
									<option data-path="img/ranks/silver-4.png" value="170"> Silver IV </option>
									<option data-path="img/ranks/silver-elite.png" value="240"> Silver V </option>
									<option data-path="img/ranks/silver-elite-master.png" value="320"> Silver VI </option>
									<option data-path="img/ranks/gold-nova-1.png" value="410"> Nova I </option>
									<option data-path="img/ranks/gold-nova-2.png" value="510"> Nova II </option>
									<option data-path="img/ranks/gold-nova-3.png" value="620"> Nova III </option>
									<option data-path="img/ranks/gold-nova-master.png" value="740"> Nova IV </option>
									<option data-path="img/ranks/master-guardian-1.png" value="900"> Master Guardian </option>
									<option data-path="img/ranks/master-guardian-2.png" value="1080"> Master Guardian II </option>
									<option data-path="img/ranks/master-guardian-elite.png" value="1280"> Master Guardian Elite </option>
									<option data-path="img/ranks/distinguished-master-guardian.png" value="1530"> Distinguished Master Guardian </option>
									<option data-path="img/ranks/legendary-eagle.png" value="1830"> Legendary Eagle </option>
									<option data-path="img/ranks/legendary-eagle-master.png" value="2180"> Legendary Eagle Master </option>
									<option data-path="img/ranks/supreme-master-first-class.png" value="2580"> Supreme Master First Class </option>
									<option data-path="img/ranks/the-global-elite.png" value="3000"> Global Elite </option>
								</select>
								<div id="ranksimg"><img src="img/ranks/silver-2.png"/></div>
						</div>
					</div>
					<div class="around-blocks"></div>
					<div class="calculator-header"><span>FACEIT BOOST</span></div>
					<div class="faceit-section">
						<div class="ranks">
								<span style="color: #FFFFFF;"><strong> Выберите ваше звание</strong> </span><br/>
								<select id="faceit1" name="faceit1" style="border-radius: 6px;padding:10px 16px;">
									<option data-path="img/ranks/lvl1.png" value="0"> 1LVL </option>
									<option data-path="img/ranks/lvl2.png" value="150"> 2LVL </option>
									<option data-path="img/ranks/lvl3.png" value="300"> 3LVL </option>
									<option data-path="img/ranks/lvl4.png" value="500"> 4LVL </option>
									<option data-path="img/ranks/lvl5.png" value="800"> 5LVL </option>
									<option data-path="img/ranks/lvl6.png" value="1200"> 6LVL </option>
									<option data-path="img/ranks/lvl7.png" value="1700"> 7LVL </option>
									<option data-path="img/ranks/lvl8.png" value="2300"> 8LVL </option>
									<option data-path="img/ranks/lvl9.png" value="3000"> 9LVL </option>
								</select>	
								<div id="myfaceitimg"><img src="img/ranks/lvl1.png"/></div>						
						</div>
						<div class="cost">
							<span> Стоимость: <span id="cost2"> 0 </span>  рублей. </span>
						</div>
						<div class="ranks">
								<span style="color: #FFFFFF;"> <strong>Выберите звание, которое хотите </strong></span><br/>
								<select id="faceit2" name="faceit2" style="border-radius: 6px;padding:10px 16px;">
									<option data-path="img/ranks/lvl2.png" value="150"> 2LVL </option>
									<option data-path="img/ranks/lvl3.png" value="300"> 3LVL </option>
									<option data-path="img/ranks/lvl4.png" value="500"> 4LVL </option>
									<option data-path="img/ranks/lvl5.png" value="800"> 5LVL </option>
									<option data-path="img/ranks/lvl6.png" value="1200"> 6LVL </option>
									<option data-path="img/ranks/lvl7.png" value="1700"> 7LVL </option>
									<option data-path="img/ranks/lvl8.png" value="2300"> 8LVL </option>
									<option data-path="img/ranks/lvl9.png" value="3000"> 9LVL </option>
									<option data-path="img/ranks/lvl10.png" value="4000"> 10LVL </option>
								</select>
								<div id="faceitimg"><img src="img/ranks/lvl2.png"/></div>
						</div>
					</div>
				</div>
			</div>
        </div>
    </section>
    <!-- Calculator Section End -->
    <!-- Footer Section Begin -->
		<?php require_once('common/footer.php'); ?>
		<!-- Footer Section End -->

    <script>
				$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());
				$('#cost2').text($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val());					
				$('#ranks2').change(function(){
					if(($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val())<=0){
						alert('Ранг аккаунта не может быть выше или равен ожидаемому рангу');
						$('#ranks1 option:first').prop('selected', true);
						$('#ranks2 option:first').prop('selected', true);
						$('#ranksimg').find('img:first').attr('src', $('#ranks2 option:first').attr('data-path'));
						$('#myranksimg').find('img:first').attr('src', $('#ranks1 option:first').attr('data-path'));
						$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());
					}else{
					$('#ranksimg').find('img:first').attr('src', $('#ranks2 option:selected').attr('data-path'));
					$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());
					}});
				$('#ranks1').change(function(){
					if(($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val())<=0){
						alert('Ранг аккаунта не может быть выше или равен ожидаемому рангу');
						$('#ranks1 option:first').prop('selected', true);
						$('#ranks2 option:first').prop('selected', true);
						$('#ranksimg').find('img:first').attr('src', $('#ranks2 option:first').attr('data-path'));
						$('#myranksimg').find('img:first').attr('src', $('#ranks1 option:first').attr('data-path'));
						$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());
					}
					else{
					$('#myranksimg').find('img:first').attr('src', $('#ranks1 option:selected').attr('data-path'));
					$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());
					}});
				$('#cost').text($('#ranks2 option:selected').val()-$('#ranks1 option:selected').val());	
				$('#faceit2').change(function(){
					if(($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val())<=0){
						alert('Ранг аккаунта не может быть выше или равен ожидаемому рангу');
						$('#faceit1 option:first').prop('selected', true);
						$('#faceit2 option:first').prop('selected', true);
						$('#faceitimg').find('img:first').attr('src', $('#faceit2 option:first').attr('data-path'));
						$('#myfaceitimg').find('img:first').attr('src', $('#faceit1 option:first').attr('data-path'));
						$('#cost2').text($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val());
					}else{
					$('#faceitimg').find('img:first').attr('src', $('#faceit2 option:selected').attr('data-path'));
					$('#cost2').text($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val());
					}});
				$('#faceit1').change(function(){
					if(($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val())<=0){
						alert('Ранг аккаунта не может быть выше или равен ожидаемому рангу');
						$('#faceit1 option:first').prop('selected', true);
						$('#faceit2 option:first').prop('selected', true);
						$('#faceitimg').find('img:first').attr('src', $('#faceit2 option:first').attr('data-path'));
						$('#myfaceitimg').find('img:first').attr('src', $('#faceit1 option:first').attr('data-path'));
						$('#cost2').text($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val());}
					else{
					$('#myfaceitimg').find('img:first').attr('src', $('#faceit1 option:selected').attr('data-path'));
					$('#cost2').text($('#faceit2 option:selected').val()-$('#faceit1 option:selected').val());
					}});
	</script>
	</body>
	
</html>