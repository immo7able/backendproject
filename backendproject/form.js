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
