<?php
	session_start();
	ini_set('display_errors',1);
	error_reporting(E_ALL);
	require_once __DIR__ .'/vendor/autoload.php';
?>
<!DOCTYPE html>
<html>	
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<style type="text/css">
		   div { 
		    width: 600px; /* Ширина */
			margin-left: auto;
			margin-right: auto;
		    padding: 20px; /* Поля */
			background-color: #EFFBFB;
		    -moz-box-sizing: border-box; /* Для Firefox */
		    -webkit-box-sizing: border-box; /* Для Safari и Chrome */
		    box-sizing: border-box; /* Для IE и Opera */
		   }
		</style>
	</head>
	<body>
		<?php
			$router = new Framework\Router;
			$router->go();
			//$file=new Framework\FileManager('D:\Programs\htdocs\framework\Session.php');
			//echo $file->getSize().' байт';
		?>
	</body>
</html>




<?php

/*  час користувача на сайті
	session_start();
	if(empty($_SESSION['time'])){
	$_SESSION['time'] = time();
	}
	$time_ago=time() - $_SESSION['time'];
	echo ' Ви були на сайті '.$time_ago.' секунд тому';
	
	
	
		$host = 'localhost'; //имя хоста, на локальном компьютере это localhost
		$user = 'root'; //имя пользователя, по умолчанию это root
		$password = '123456'; //пароль, по умолчанию пустой
		$db_name = 'test'; //имя базы данных

	//Соединяемся с базой данных используя наши доступы:
		$link = mysqli_connect($host, $user, $password, $db_name)or die(mysqli_error($link));
    //Устанавливаем кодировку (не обязательно, но поможет избежать проблем):
		mysqli_query($link, "SET NAMES 'utf8'");
		//$query = "SELECT*FROM `workers`";
		//$result = mysqli_query($link,$query); // запрос на выборку

		//while($row = mysqli_fetch_array($result))
		//{
		//	echo '<p>Запись id='.$row['id'].'. Имя: '.$row['name'].'.'.' Возраст: '.$row['age'].' Зарплата '.$row['salary'].'</p>';// выводим данные
		//}
		
		//$query = "UPDATE workers SET name = 'Бодя',salary = 900 WHERE name = 'Петя'";
		//mysqli_query($link,$query);
		//unset($query);
		//В $result будет лежать количество строк:
	$query = "SELECT COUNT(*) as count FROM workers WHERE id>0"; 
	$result = mysqli_query($link, $query) or die( mysqli_error($link) );
	$count = mysqli_fetch_row($result);
	$array=['id','name','age','salary'];

echo '<table border="1">';

for ($tr=1; $tr<=1; $tr++){ 
    echo '<tr>';
    for ($td=1; $td<=count($array); $td++){
        echo '<th>'. $array[$td-1] .'</th>';
    }
    echo '</tr>';
}
$query = " SELECT*FROM workers WHERE id>0 ";
$result = mysqli_query($link, $query) or die(mysqli_error($link));
for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
for ($tr=1; $tr<=$count[0]; $tr++){ 
    echo '<tr>';
    for ($td=0; $td<=count($array)-1; $td++){ // в этом цикле счётчик $td аналогичен
                                    // счётчику $tr.
        echo '<td>'. $data[$td][$array[$td]] .'</td>';
    }
    echo '</tr>';
}

echo '</table>';

	//В $count будет лежать массив 'count'=>кол-во:
	//var_dump($count);

	//Формируем тестовый запрос:
		//$query = "SELECT*FROM workers WHERE name LIKE '%я' ";

	//Делаем запрос к БД, результат запроса пишем в $result:
		//$result = mysqli_query($link, $query) or die(mysqli_error($link));
	//Проверяем что же нам отдала база данных, если null – то какие-то проблемы:

	//Преобразуем то, что отдала нам база в нормальный массив PHP $data:
		//for ($data = []; $row = mysqli_fetch_assoc($result); $data[] = $row);
		//var_dump($data);
	//Мы можем формировать эту строку с помощью переменных:
	//$table = 'users'; //задаем имя таблицы в переменной
	//mysqli_query($link, "SELECT*FROM ".$table." WHERE id>0");
//$result=mysqli_store_result($connection);
//mysqli_close();
//$arr = mysql_fetch_array($result);
//echo $arr['title'];
/*

$string = "This ? is\tan, example\nstring 34;";
$newstring = preg_replace ("/[^a-zA-ZА-Яа-я\s]/","",$string);
echo $newstring;
$arr=explode(" ",$newstring);
for ($i=0;$i<=count($arr);$i++){
	if ($arr[$i]==""){
		unset($arr[$i]);
	}
}
var_dump($arr);



//Сделайте скрипт-гороскоп. Внутри него хранится массив гороскопов на несколько дней вперед для каждого знака зодиака.
// По заходу на страницу спросите у пользователя дату рождения,
// определите его знак зодиака и выведите предсказание для этого знака зодиака на текущий день.
if (isset($_REQUEST['date']))
{
	$start = microtime(true);
	$date = strip_tags($_REQUEST['date']);
	$arr = explode('.',$date);
	$seconds =mktime(0, 0, 0, $arr[1], $arr[0],2015)-mktime (0,0,0,1,1,2015);
	$days=ceil($seconds/60/60/24+1);
	if ($days>=356&&$days<=366||$days>=1&&$days<=20)
		echo 'Ви Козоріг!';
	if ($days>=21&&$days<=50)
		echo 'Ви Водолій!';
	if ($days>=51&&$days<=79)
		echo 'Ви Риби!';
	if ($days>=80&&$days<=110)
		echo 'Ви Овен!';
	if ($days>=111&&$days<=141)
		echo 'Ви Телець!';
	if ($days>=142&&$days<=172)
		echo 'Ви Близнюки!';
	if ($days>=173&&$days<=203)
		echo 'Ви Рак!';
	if ($days>=204&&$days<=235)
		echo 'Ви Лев!';
	if ($days>=236&&$days<=266)
		echo 'Ви Діва!';
	if ($days>=267&&$days<=296)
		echo 'Ви Терези!';
	if ($days>=297&&$days<=326)
		echo 'Ви Скорпіон!';
	if ($days>=327&&$days<=355)
		echo 'Ви Стрілець!';
}
/*
//Дан инпут и кнопка. В этот инпут вводится дата рождения в формате '01.12.1990'. 
//По нажатию на кнопку выведите на экран сколько дней осталось до дня рождения пользователя.
if (isset($_REQUEST['date'])) 
	{
		$date = strip_tags($_REQUEST['date']);
		$arr = explode('.',$date);
		$seconds =mktime(0, 0, 1, $arr[1], $arr[0])-time ();
		$dni=$seconds/60/60/24;
		$dni=ceil($dni);
		if($dni==-0)
		{
			$dni=0;
			echo 'Вітаємо з днем народження!';
		}
		if($dni>0)
		{
			echo 'Днів до дня народження: '.$dni;
		}
		if($dni<0)
		{
			$dni+=365;
			echo 'Днів до дня народження: '.$dni;
		}
	}
По заходу на страницу выведите текущую дату в формате '12 мая 2015 года, воскресенье'.


$arr=explode('.',date('d.m.Y'));
$monts=$arr[1]*1;
$day = date('w', mktime(0, 0, 0, $arr[1], $arr[0], $arr[2]));
$mounts=[1=>'Січня','Лютого','Березня','Квітня','Травня','Червня','Липня','Серпня','Вересня','Жовтня','Листопада','Грудня'];
$day_weeks=['Неділя','Понеділок','Вівторок','Середа','Четвер','П"ятниця','Субота'];
echo $arr[0].' '. $mounts[$monts].' '. $arr[2].' року'.', '.$day_weeks[$day];




Дан инпут и кнопка. В этот инпут вводится дата в формате '01.12.1990'. 
По нажатию на кнопку выведите на экран день недели, соответствующий этой дате, например, 'воскресенье'.
	if (isset($_REQUEST['date'])) 
	{
		$date = strip_tags($_REQUEST['date']);
		$arr=explode('.',$date);
		$day = date('w', mktime(0, 0, 0, $arr[1], $arr[0], $arr[2]));
		$day_weeks=['Неділя','Понеділок','Вівторок','Середа','Четвер','П"ятниця','Субота'];
		echo $day_weeks[$day];
	}
	


	/*$str = '12345678' ;
	$arr=str_split($str);
	$num=count($arr);
	for($i=0;$i<$num;$i+=2)
	{
		$new=$arr[$i];
		$newArr[$i] = $arr[$i+1];
		$newArr[$i+1]=$new;
	}
	$result=implode($newArr);
	echo $result;

	$str = 'givno';
	$newstr='';
	$newArr = str_split($str);
	for ($i = 0; $i <= count($newArr)-1; $i+=2) {
		$newstr.=$newArr[$i];
	}
	echo $newstr;

	Дан массив с произвольными целыми числами. Сделайте так, чтобы первый элемент стал ключом
	второго элемента, третий элемент - ключом четвертого и так далее.
	Пример: [1, 2, 3, 4, 5, 6] превратится в [1=>2, 3=>4, 5=>6]
	
	$arr = [1, 2, 3, 4, 5, 6,7,8];
	$newArr = [];
	for ($i=0;$i<=count($arr)-1;$i+=2) 
	{
		$newArr[$arr[$i]] = $arr[$i+1];
	}
	var_dump($newArr);

	$arr=[1, 3, 2, 4];
	for ($i=0;$i<=count($arr)-1;$i++)
	{
		for($j=$arr[$i];$j>=1;$j--)
		{
		$newarr[]=$arr[$i];
		}
	}
	var_dump($newarr);
	
	 Преобразуйте строку 'var_text_hello' в 'varTextHello'. Скрипт должен работать с любыми стоками такого рода
	$arr = explode('_', 'var_test_text');
	var_dump($arr);
	$str = '';
	foreach ($arr as $elem) 
	{
		if($elem == $arr[0])
			{
			$str .= $elem;
			} 
		else 
			{
			$str .= ucfirst($elem);
			}
	}
	echo $str;


	$str='var_text_hello_hihi';
	$str1='';
	$arr=str_split($str);
	for ($i=0;$i<=count($arr)-1;$i++)
	{
		if (ord($arr[$i]) == 95)
		{
			$arr[$i]=null;
		    $arr[$i+1]=strtoupper($arr[$i+1]);
		}
		$str1.=$arr[$i];
	}
	echo $str1;
 
 
 

	/*function sum_digits($num)
	{
		$str="$num";
		$sum=array_sum(str_split($str));
		if($sum>=10)
		{
			$sum=sum_digits($sum);
		}
		echo $sum.'<br>';
	}
	sum_digits(128);
	
	
	$arr=[1,2,43,5,6,4,3,2,1];
	
	function mass($arr)
	{
		echo array_shift($arr).'<br>';
		if(!empty($arr))
		{
			mass($arr);
		}    
	}
	mass($arr);
	
	for($i=0;$i<300;$i++)
	{
		if(djeliteli($i)==$new_arr[$i])
		{
			echo "$i $new_arr[$i] <br>";
		}
	}
	
	for ($i=100000;$i<=999999;$i++)
	{
		$str = "$i";
		if($str[0]+$str[1]+$str[2]==$str[3]+$str[4]+$str[5])
		{
			$lucky_tikets[]=$i;
		}
	}
	var_dump($lucky_tikets);
	
	function endings ($digit,$one,$two,$thre)
	{
		$str='';
		if($digit==1)
		{
			$str=$one;
		}
		if($digit>=2&&$digit<=4)
		{
			$str=$two;
		}
		if($digit>=5&&$digit<=20)
			$str=$thre;
		if($digit>20)
		{
			if($digit%10==1)
			{
				$str=$one;
			}
			if($digit%10>=2&&$digit%10<=4)
			{
				$str=$two;
			}
			if($digit%10>=5&&$digit%10<=9||$digit%10==0)
			{
				$str=$thre;
			}
			if($digit>100&&$digit%100==11)
			{
				$str=$thre;
			}
			if($digit%100>=12&&$digit%100<=14)
			{
				$str=$thre;
			}
			
		}
		echo "$digit $str";
	}
	func(1011,'месяц','месяца','месяцов');

	function isSimple($num) 
	{
		for ($i = 2; $i < $num; $i++) 
		{
			if($num % $i == 0) 
			{
				return false;
			}
		}
	
		return true;
	}
	

	function inArray($value, $arr) 
	{
		foreach ($arr as $elem) {
			if($elem == $value) {
				return $elem;
			}
		}
	
		return false;
	}
	
	$arr = [1, 2, 3, 4, 5];
	echo inArray(3, $arr); //выведет 3

	function getDivisors($num)
	{
		for($i=1;$i<=$num;$i++)
		{
			if($num%$i==0)
			{
				$var[]=$i;
			}
		}
		return $var;
	}
	function getCommonDivisors($num1,$num2)
	{
		$var1=getDivisors($num1);
		$var2=getDivisors($num2);
		foreach($var1 as $elem)
		{
			foreach($var2 as $subelem)
			{
				If($elem==$subelem)
				{
					$newVar[]=$elem;
				}
			}
		}
		return $newVar;
	}
		var_dump(getCommonDivisors(10,10));
	function isEwen($num)
	{
		if($num%2==0)
		    return true;
		else
			return false;
	}	
	$arr=[1,3,4,6,2,8];
	foreach($arr as $elem)
	{
		if(isEwen($elem))
		$newArr[]=$elem;
	}
	var_dump($newArr);
	
	function isNumberInRange($num)
	{
		If($num>0&&$num<10)
			return true;
		else
			return false;
	}
	$arr=[11,3,2,8,3,15];
	$newArr = [];
		foreach($arr as $elem)
		{
			If(isNumberInRange($elem))
			{
				$newArr[]=$elem;
			}
		}
	var_dump($newArr);
	$arr = [11, 3, 5, 6, 9, 11, 15, 30];
	$newArr = [];
	foreach ($arr as $elem) 
	{
		if (isNumberInRange($elem)) 
		{
			$newArr[] = $elem;
		}
	}
	
	var_dump($newArr);*/
?>