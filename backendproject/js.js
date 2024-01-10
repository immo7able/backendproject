function register(){
	let login = prompt('Введите логин');
	let error;
	while(true){
		error=0;
		for(let i=0;i<users.length;i++){
			for(let j=0;j<users.length;j++){
				if(users[j][1]==login){
					error++;
				}
			}
		}
		if(error ==0||users.length==0)
			break;
		else 
			login = prompt('Введите другой логин');
	}
	let name = prompt('Введите имя');
	let pass;
	let pass1;
	while(true){
		pass = prompt('Введите пароль');
		pass1 = prompt('Введите пароль еще раз');
		if(pass!==pass1){
			alert('Пароли не совпадают, попробуйте еще');
		}
		else break;
	}
	users.push([id,login,pass,name]);
	id++;
}
function login(){
	let error = false;
	let userLogin;
	let userPass;
	if(activeUser)
		alert("Пользователь "+activeUser+" уже вошел в аккаунт.");
	else {
		while(true){
			userLogin = prompt('Введите логин');
			userPass = prompt('Введите пароль');
			for(let i=0;i<users.length;i++){
				if(users[i][1] == userLogin && users[i][2] == userPass){
					activeUser = users[i];
					error = false;
					break;
				}
				else error = true;
			}
			if(error) 
				alert("Неправильный логин или пароль.");
			else break;
		}
	}
}
function see(){
	if(activeUser)
		alert("Пользователь "+activeUser[1]+" вошел в аккаунт");
	else
		alert("Никто не вошел");
}
function changePassword(){
	let newpass;
	let newpass1;
	if(activeUser){
	while(true){
		if(activeUser[2] == prompt('Введите старый пароль')){
			newpass = prompt('Введите новый пароль');
			newpass1 = prompt('Введите новый пароль еще раз');
			if(newpass!==newpass1){
				alert('Пароли не совпадают, попробуйте еще');
			}
			else{
				for(let i=0;i<users.length;i++){
					if(activeUser[1]==users[i][1])
						users[i][2]=newpass;
				}
				logout();
				break;
				}
		}
		else alert("Неправильный пароль");
	}
	}
	else alert("Войдите в аккаунт");
}
function logout(){
	activeUser=null;
}
