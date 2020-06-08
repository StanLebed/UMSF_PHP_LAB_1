<?php
$login = $_POST["login"];
$password = $_POST["password"];

class user {
	public $name;
	public $surname;
	public $role;

	function __construct($name,$surname,$role)
	{
		$this->name = $name;
		$this->surname = $surname;
		$this->role = $role;
	}
}
class admin extends user {

	public function privet(){
		echo "Здравствуйте, " .$this->name. "  " . $this->surname. ", поскольку Вы " .$this->role. ", значит, Вы практически Боженька на этом несуществующем сайте. Делайте всё, чего пожелаете!";
	}
}
class manager extends user {

	public function privet() {
		echo "Здравствуйте, " .$this->name. "  " .$this->surname. ", Вы наш ".$this->role." верно? (На самом деле мы слишком нищая компания, чтобы позволить себе " .$this->role. "а).";
	}
}
class client extends user {

	public function privet(){
		echo "Здравствуйте, " .$this->name. "  " .$this->surname. ", добро пожаловать! На этом сайте Вы обычный юзер(" .$this->role. "). Жаль только, что юзать тут нечего :_(";
	}
}

$database = [
	["login" => "admin", "password" => "ya_admin", "name" => "Гена" , "surname" => "Бурчик", "role" => "админ"],
	["login" => "manager", "password" => "ya_manager", "name" => "Фрося" , "surname" => "Бабкина", "role" => "менеджер"],
	["login" => "client", "password" => "ya_client", "name" => "Альбибек" , "surname" => "Узбек", "role" => "клиент"],
];
if (!empty($login) && !empty($password)) {
	if ($_POST['login'] == $database[0]['login'] && $_POST['password'] == $database[0]['password'] )
	{
		$admin = new admin($database[0]["name"], $database[0]['surname'], $database[0]['role']);
		$admin->privet();
	}
	if ($_POST['login'] == $database[1]['login'] && $_POST['password'] == $database[1]['password'] )
	{
		$manager = new manager($database[1]["name"], $database[1]['surname'], $database[1]['role']);
		$manager->privet();
	}
	if ($_POST['login'] == $database[2]['login'] && $_POST['password'] == $database[2]['password'] )
	{
		$client = new client($database[2]["name"], $database[2]['surname'], $database[2]['role']);
		$client->privet();
	}
	for ($i=0; $i<count($database); $i++)
	{
		if (($_POST['login'] != $database[$i]['login'] && $_POST['password'] == $database[$i]['password']) || ($_POST['login'] == $database[$i]['login'] && $_POST['password'] != $database[$i]['password']))
		{echo "Чёт не припомню в своей базе данных таких типов. Ты зашёл не в тот райончик, дружок. (Если уверен в своих силах, попробуй проверить логин или пароль)";}
	}
}
else {
	echo "ERROR! Разве так трудно заполнить все поля? Выйди и зайди нормально!";
}
?>
