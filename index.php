<?php 
// header('refresh: 1'); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP_HW4</title>
    <style>
        p {
            display: inline-block;
            max-width: 100%;
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <div style="width: 100%;">
<?php 

/*1. Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'.*/
echo "<hr>";
echo "<p style=\"font-weight: bold;\">Task 1 Дана строка 'london is the capital of great britain'. Сделайте из нее строку 'London Is The Capital Of Great Britain'</p><p></p>";

function capitalize(string $str)
{
    if(!isset($str)) return; 
    echo $str. "<br><br>";
    
    // 1 way
    $str1 = $str;
    $strArr = explode(' ', $str1);

    foreach ($strArr  as &$value){
        $value[0] = mb_strtoupper($value[0]);
    }

    $str1 = implode(" ", $strArr);
    echo $str1. '<br>';

    // 2 way
    $str2 = $str;
    $str2 = mb_convert_case($str2, MB_CASE_TITLE);
    echo "<p>$str2</p>";
}

$str1 = 'london is the capital of great britain';
capitalize($str1);
echo "<hr>";

/*2. Дана строка 'html <b>css</b> php'. Удалите теги из этой строки. С 
помощью функции explode запишите каждое слово этой строки в отдельный 
элемент массива. */

echo "<p style=\"font-weight: bold;\">Task 2 Дана строка 'html <b>css</b> php'. Удалите теги из этой строки. С помощью функции explode запишите каждое слово этой строки в отдельный элемент массива.</p><p></p>";

function strip_tag(string $str)
{

    if(!isset($str)) return; 

    echo $str. "<br><br>";

    $arr = explode(" ", strip_tags($str));

    echo "<pre>";
    print_r($arr);
    echo "<pre>";
}

$str2 = 'html <b>css</b> php';
strip_tag($str2);
echo "<hr>";

/*3. Дана строка. Перемешайте символы этой строки в случайном порядке.*/

echo "<p style=\"font-weight: bold;\">Task 3 Дана строка. Перемешайте символы этой строки в случайном порядке.</p><br>";

function shuffled_chars(string $str1, string $str2)
{

    if(!isset($str1) && !isset($str2)) return; 

    // 1 way if English word
    echo "<p>$str1</p><br>";

    $shuffled = str_shuffle($str1);
    echo "<p>$shuffled</p><br>";

    // 2 way if Russin word
    echo "<p> $str2</p><br>";

    $arr = mb_str_split($str2);
    shuffle($arr);
    $shuffled2 = implode('', $arr);
    echo $shuffled2;
}

$str3 = 'Collapse';
$str33 = 'Kрах';
shuffled_chars($str3, $str33);
echo "<hr>";

/*4. Найдите количество дней в текущем месяце. Скрипт должен работать 
независимо от месяца, в котором он запущен. */
echo "<p style=\"font-weight: bold; width: 100%;\">Task 4 Найдите количество дней в текущем месяце. Скрипт должен работать независимо от месяца, в котором он запущен</p><br>";
function get_days_month()
{
    // 1 way
    $last_sec_prev_month = strtotime("last day this month");
    $first_day_prev_month = strtotime("last day next month");
    
    $days_current_month = ($first_day_prev_month - $last_sec_prev_month) / 60 / 60 / 24;

    echo $days_current_month."<br>";
    // 2 way 
    echo date('t');
}

echo get_days_month();
echo "<hr>";

/*5. Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59', timestamp. */
echo "<p style=\"font-weight: bold;\">Task 5 Выведите текущую дату-время в форматах '2025-12-31', '31.12.2025', '31.12.13', '12:59:59', timestamp</p><br>";
function get_present_date()
{
    echo date("Y-m-d")."<br>";
    echo date("d.m.Y")."<br>";
    echo date("d.m.y")."<br>";
    echo date("H:i:s")."<br>";
    echo time();
}

get_present_date("");
echo "<hr>";

/*6. В переменной $date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня. */
echo "<p style=\"font-weight: bold;\">Task 6 В переменной \$date лежит дата в формате '2025-12-31'. Прибавьте к этой дате 2 дня, 1 месяц и 3 дня, 1 год. Отнимите от этой даты 3 дня</p><br>";
function output_dates()
{
    // set date
    $date = date_create('2025-12-31');
    date_modify($date ,"+2 day");
    echo date_format($date, "Y-m-d")."<br>"; 

    $date = date_create('2025-12-31');
    date_modify($date ,"+3 day +1 month");
    echo date_format($date, "Y-m-d")."<br>"; 

    $date = date_create('2025-12-31');
    date_modify($date ,"+1 year");
    echo date_format($date, "Y-m-d")."<br>"; 

    $date = date_create('2025-12-31');
    date_modify($date ,"-3 day");
    echo date_format($date, "Y-m-d")."<br><br>"; 

    // get date
    echo date("Y-m-d", strtotime("+2 day"))."<br>"; 
    echo date("Y-m-d", strtotime("+3 day +1 month"))."<br>"; 
    echo date("Y-m-d", strtotime("+1 year"))."<br>"; 
    echo date("Y-m-d", strtotime("-3 day"))."<br><br>"; 

    
    echo date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")+2, date("Y")))."<br>";
    echo date("Y-m-d", mktime(0, 0, 0, date("m")+1, date("d")+3, date("Y")))."<br>";
    echo date("Y-m-d", mktime(0, 0, 0, date("m"), date("d"), date("Y")+1))."<br>";
    echo date("Y-m-d", mktime(0, 0, 0, date("m"), date("d")-3, date("Y")))."<br>";
}

output_dates();
echo "<hr>";

/*7. Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. 
Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'. */
echo "<p style=\"font-weight: bold;\">Task 7 Дана строка с буквами и цифрами, например, '1a2b3c4b5d6e7f8g9h0'. Удалите из нее все цифры. То есть в нашем случае должна получится строка 'abcbdefgh'.</p><br>";
function ger_string(string $str)
{
    if(!isset($str)) return;

    echo $str."<br><br>";

    // 1 variant
    $str_no_numb = '';
    for($i = 0; $i < strlen($str); $i++){
        if(is_numeric($str[$i])) continue;
        $str_no_numb .= $str[$i];
    }

    echo $str_no_numb."<br><br>";
    // 2 variant
    $arr_str = str_split($str, 1);
    foreach($arr_str as &$v){
        if(is_numeric($v))  $v = "";
    }

    echo implode('', $arr_str)."<br><br>";
    // 3 variant
    $str_lettes = preg_replace("/\d/", "", $str);
    return "<b>$str_lettes</b>";

    // 4 varant with array_filter
}

$str4 = '1a2b3c4b5d6e7f8g9h0';
echo ger_string($str4);
echo "<hr>";

/*8. Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное число. */
echo "<p style=\"font-weight: bold;\">Task 8 Даны числа 4, -2, 5, 19, -130, 0, 10. Найдите минимальное и максимальное число.</p><br>";

function min_max_val()
{
    echo "min is " . min([4, -2, 5, 19, -130, 0, 10])."<br>";
    echo "max is " . max([4, -2, 5, 19, -130, 0, 10]);
}

min_max_val();
echo "<hr>";

/*9. Выведите на экран случайное число от 1 до 100. */
echo "<p style=\"font-weight: bold;\">Task 9 </p>";
function random_num()
{
    echo "Ramdom number is " . rand(1, 100) . ".";
}

random_num();
echo "<hr>";
/*10. Создайте ассоциативный массив дней недели. Ключами в нем должны 
служить номера дней от начала недели (понедельник - должен иметь ключ 1, вторник - 2 и т.д.). Выведите на экран текущий день недели. */
echo "<p style=\"font-weight: bold;\">Task 10 Создайте ассоциативный массив дней недели. Ключами в нем должны служить номера дней от начала недели (понедельник - должен иметь ключ 1, вторник - 2 и т.д.). Выведите на экран текущий день недели.</p><br>";
function get_day_from_arr()
{
    $arr_weekdays = [
        1 => "Monday",
        2 => "Tuesday",
        3 => "Wednesday",
        4 => "Thursday",
        5 => "Friday",
        6 => "Satuday",
        7 => "Sunday",
    ];

    foreach($arr_weekdays as $k => $v){
        // if($k == date("w")) echo $arr_weekdays[$k];
        if($k == date("w")) echo "The current weekday is <b>$v</b>.";
    }

}

echo get_day_from_arr();
echo "<hr>";

/*11. Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. 
Найдите сумму элементов этого массива. Массив, конечно же, может быть 
произвольным. */

echo "<p style=\"font-weight: bold;\">Task 11 Дан двухмерный массив с числами, например [[1, 2, 3], [4, 5], [6]]. Найдите сумму элементов этого массива. Массив, конечно же, может быть произвольным.</p><br>";
function sum_elem_arr($arr)
{
    if(!isset($arr)) return;

    static $sum = 0;
    foreach($arr as $v){
        if(!is_array($v)) $sum += +$v;
        else sum_elem_arr($v);
       
    }

    return  $sum;
}

$arr1 = [[1, [2, [3]], 4],[5, 6], [7, [8]]];

echo sum_elem_arr($arr1);
echo "<hr>";

/*12. Есть массив $array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то есть вывести без дублей при помощи лишь одного цикла и без использования функций PHP.*/

echo "<p style=\"font-weight: bold;\">Task 12 Есть массив \$array = array(1,1,1,2,2,2,2,3), необходимо вывести 1,2,3, то есть вывести без дублей при помощи лишь одного цикла и без использования функций PHP.</p><br>";
function get_pure_arr($arr)
{
    if(!isset($arr)) return;
    $arr2 = [];
    
    foreach($arr as $v){
        in_array($v, $arr2) ? $arr2 : $arr2[] = $v;
    }
    print_r($arr2);
}

$array = array(1,1,1,5,2,8, 0, 8, 4, 8, 10, 10, 10 ,2,2,2,3,4,5,5,5,6);
get_pure_arr($array);
echo "<hr>";

/*13. Используя ассоциативный массив, добавить на страницу навигационное 
меню вида:
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="about.php">About</a></li>
<li><a href="services.php">Services</a></li>
<li><a href="catalog.php">Catalog</a></li>
<li><a href="contacts.php">Contacts</a></li>
</ul>
Заполните массив соблюдая сл. условия: название индексов являются именем
файла (без расширения), на который ссылается меню; значения массива явл. названиями пунктов меню.*/

echo "<p style=\"font-weight: bold;\">Task 13 </p><br>";
function get_nav($arr_nav)
{
    if(!isset($arr_nav)) return;

    echo "<ul style=\"display: flex; gap: 20px;\">";
    foreach($arr_nav as $key => $val){
        echo "<li style=\"display: inline-block\";><a href=\"$key\">$val</a></li>";
    }

    echo "</ul>";

}
$arr_nav = [
    "index" => "Home",
    "about" => "About",
    "services" => "Services",
    "catalog" => "Catalog",
    "contacts" => "Contacts",
];

get_nav($arr_nav);
echo "<hr>";

/*14. Вывести на черном фоне n красных квадратов случайного размера в 
случайной позиции в браузере.*/

echo "<p style=\"font-weight: bold;\">Task 14 Вывести на черном фоне n красных квадратов случайного размера в случайной позиции в браузере.</p><br>";

echo '<form action="/PHP_HW4/" method="get">
     <p>How many squares do you want?:</p>
     <input type="number" name="squares" placeholder="Enter quantity"></br>
     <button>Enter</button>
     </form>';

function squares_depict($num)
{
    if(array_key_exists("squares", $num) == false) return;
    $num = $num["squares"] ?? null;

    if(!isset($num) || empty($num)){
        echo "<p><strong>Enter quantity</strong></p>";
    }  else {
        $squares = "";
        
        for($i = 0; $i < +$num; $i++){
            $size_square = rand(1, 20);
            $positon_x = rand(1, 80);
            $positon_y = rand(1, 80);
            $squares .= "<div style=\"width: {$size_square}px; height: {$size_square}px;  top: {$positon_x}%; left: {$positon_y}%; background-color: red; position: absolute; z-index: 1;\"></div>";
        }
        
        echo "<div style=\"width: 300px; height: 80px; background-color: black; position: relative;\">$squares</div>";
    }
    
}

squares_depict($_GET);
echo "<hr>";

/*15. Дана строка с любыми символами. Для примера пусть будет '1234567890'. Нужно разбить эту строку в массив таким образом: array('1', '23', '456', '7890') и так далее пока символы в строке не закончатся.*/

echo "<p style=\"font-weight: bold;\">Task 15 Дана строка с любыми символами. Для примера пусть будет '1234567890'. Нужно разбить эту строку в массив таким образом: array('1', '23', '456', '7890') и так далее пока символы в строке не закончатся</p><br>";

function get_chunk_arr(string $str)
{
    if(empty($str)) return;

    echo $str."<br><br>";
    $len = strlen($str);
    $arr_chunk = [];

    for($i = 1;; $i++){

        $str_chunk = mb_substr($str, 0, $i);
        if (empty($str_chunk) && $str_chunk !== "0") break;
        
        array_push($arr_chunk, $str_chunk);
        $str = mb_substr($str, $i, $len);
    }
    print_r($arr_chunk);

}

get_chunk_arr('1234567890');
echo "<hr>";

/*16. Найдите сумму элементов массива между двумя нулями (первым и 
последним нулями в массиве). Если двух нулей нет в массиве, то выведите 
ноль. В массиве может быть более 2х нулей. Пример массива: 
[48,9,0,4,21,2,1,0,8,84,76,8,4,13,2] или [1,8,0,13,76,8,7,0,22,0,2,3,2]*/

echo "<p style=\"font-weight: bold;\">Task 16 Найдите сумму элементов массива между двумя нулями (первым и последним нулями в массиве). Если двух нулей нет в массиве, то выведите ноль. В массиве может быть более 2х нулей. Пример массива: [48,9,0,4,21,2,1,0,8,84,76,8,4,13,2] или [1,8,0,13,76,8,7,0,22,0,2,3,2]</p><br>";
function sum_elems(array $arr)
{
    if(!isset($arr) || count($arr) === 0) return;
    print_r($arr);
    echo "<br>";

    $sum = 0;

    $key = array_keys($arr, 0);
    if(count($key) === 1) return;

    foreach($arr as $k => $v){
        if ($k >= $key[array_key_first($key)] && $k <= $key[array_key_last($key)]) $sum += +$v;
    }

    echo "<p>The outcome is $sum <br>";
}

sum_elems([48,9,0,4,21,2,1,0,8,84,76,8,4,13,2]);
echo "<br>";
sum_elems([1,8,0,13,76,8,7,0,22,0,2,3,2]);
echo "<hr>";

/*17. Сделайте функцию, которая будет генерировать случайный цвет в hex 
(dechex) формате (типа #ffffff).*/
echo "<p style=\"font-weight: bold;\">Task 17 Сделайте функцию, которая будет генерировать случайный цвет в hex (dechex) формате (типа #ffffff)</p><br>";

function generate_color($data)
{
    if(array_key_exists("color", $data) == false) return;
    $data = $data["color"] ?? null;

    if(!isset($data) || empty($data) || $data === null) {
        return "<p><strong>CLICK</strong></p>";
    } else {
        $rand_color = dechex(mt_rand(0, 0xFFFFFF));
        return "<div style=\"width: 50px; height: 50px; background-color: #{$rand_color};\"></div>";
    }
}

echo '<form action="/PHP_HW4/" method="get">
     <p>Generate color</p><br>' . generate_color($_GET) .
     '<input type="hidden" name="color" value="true">
     <button>Click</button>
     </form>';
echo "<hr>";

/*18. Дана строка '332 441 550'. Найдите все места, где есть два одинаковых идущих подряд цифры и замените их на '!'. */
echo "<p style=\"font-weight: bold;\">Task 18 Дана строка '332 441 550'. Найдите все места, где есть два одинаковых идущих подряд цифры и замените их на '!'.</p><br>";
function replace_char(string $str):string
{
    echo $str."<br><br>";

    $len = strlen($str);
    
    for($i = 0; $i < $len; $i++){
        $pos = stripos($str, $str[$i]);

        if(!isset($str[$pos + 1])) {
            break;
        } else {
            if($str[$pos] !== $str[$pos + 1]) continue;
            $str[$pos] = "!";
            $str[$pos + 1] = "!";
        }
    }
    return  $str;

}

echo replace_char('332 441 550');
echo "<hr>";

/*19. Напишите ф-цию строгой проверки ввода номер телефона в 
международном формате (<код страны> <код города или сети> <номер 
телефона>) и упрощенной проверки ввода простого номера с кодом и без 
него. Функция должна возвращать true или false. */
echo "<p style=\"font-weight: bold;\">Task 19 Напишите ф-цию строгой проверки ввода номер телефона в международном формате (<код страны> <код города или сети> <номер телефона>) и упрощенной проверки ввода простого номера с кодом и без него. Функция должна возвращать true или false.</p><br>";
echo '<form action="/PHP_HW4/" method="get">
     <p>Enter phone number:</p>
     <input type="text" maxlength="21" name="tel" placeholder="+375 (XX) XXX-XX-XX"><br>
     <button>Verify</button><br>
     '. verify_tel($_GET) .'
     </form>';

function verify_tel($num)
{
    if(array_key_exists("tel", $num) == false) return;
    $num = $num["tel"] ?? null;
    $regExp = "/^\+?\d{1,3}\s?\(?\d{2,3}\)?\s?\d{3}\-?\s?\d{2}\-?\s?\d{2}/im";
    
    if(!isset($num) || empty($num) || $num === null){
        return"<strong>Enter phone number</strong>";
    }  else {
    return (preg_match($regExp, $num)) ? "Input of phone number  $num is <strong>correct</strong>" : "Input of phone $num is <strong>incorrect</strong>";

    }
}

echo "<hr>";

/*20. Напишите ф-цию, которая должна проверить правильность ввода адреса 
эл. почты. Почта верна при условии: 
a. весь адрес не должен содержать русские буквы и спецсимволы, кроме 
одной «собачки», знака подчеркивания, дефиса и точки, причем они не могут быть первыми и последними в адресе, и идти подряд, например: «..», «@.», «.@» или «@@», «_@», «@-», «--» и т.п. 
b. имя эл. почты (до знака @) должно быть длиной более 2 символов, причем имя может содержать только буквы, цифры, но не быть первыми и 
единственными в имени, и точку; 
c. после последней точки и после @, домен верхнего уровня (ru, by, com и т.п.) не может быть длиной менее 2 и более 11 символов.*/

echo "<p style=\"font-weight: bold;\">Task 20 Напишите ф-цию, которая должна проверить правильность ввода адреса эл. почты.</p><br>";
echo '<form action="/PHP_HW4/" method="get">
     <p>Enter email:</p>
     <input type="text"  name="email" placeholder="mail@mail.com"><br>
     <button>Verify</button><br>
     '. verify_email($_GET) .'
     </form>';

function verify_email($email)
{
    if(array_key_exists("email", $email) == false) return;
    $email = $email["email"] ?? null;
    $regExp = "/^[^0-9\.\_\-][A-Za-z0-9\.\-\_]{2,}[^.\_\-]{1,2}\@[^\@\.\_][\w\-]{2,11}\.[A-Za-z]{2,11}$/im";

    $regExp2 = "/[\.\_\-\@]{2}/im";

    if(!isset($email) || empty($email) || $email === null){
        return"<strong>Write your email</strong>";
    }  else {

    // $result = filter_var($email , FILTER_VALIDATE_EMAIL);
    return (preg_match($regExp, $email) && !preg_match($regExp2, $email)) ? "Email  $email is <strong>correct</strong>" : "Email $email is <strong>incorrect</strong>";
    // return ($result) ? "Email  $email is <strong>correct</strong>" : "Email $email is <strong>incorrect</strong>";

    }
}

echo "<hr>";   

/*21. Напишите программу, которая проверяет правильность ввода пароля от пользователя. Важно, чтобы пароль соотв. сл. требованиям: длина пароля от 6 символов; пароль должен состоять только из лат. символов; содержать минимум 1 число, 1 большой символ и любой знак из списка: _*&-#$.*/

echo "<p style=\"font-weight: bold;\">Task 21 Напишите ф-цию, которая должна проверить правильность ввода пароля.</p><br>";
echo '<form action="/PHP_HW4/" method="get">
     <p>Enter password:</p>
     <input type="password"  name="password" placeholder="Enter password"><br>
     <button>Enter</button><br>
     '. verify_password($_GET) .'
     </form>';

function verify_password($pass)
{
    if(array_key_exists("password", $pass) == false) return;
    $pass = $pass["password"] ?? null;

    $reg_exp = "/[\w\.\_\-\&\*\#]{6,}$/im";
    $reg_exp_num = "/\d{1,}/im";
    $reg_exp_cap = "/[A-Z]{1,}/im";
    $reg_exp_token = "/[\.\_\-\&\*\#]/im";

    if(!isset($pass) || empty($pass) || $pass === null){
        return"<strong>Enter your password</strong>";
    } else {
        return (preg_match($reg_exp, $pass) && preg_match($reg_exp_num, $pass) && preg_match($reg_exp_cap, $pass) && preg_match($reg_exp_token, $pass)) ? "Password $pass is <strong>correct</strong>" : "Password $pass is <strong>incorrect</strong>";
    } 

}

echo "<hr>";  

/*22. Найти число с максимальной суммой цифр среди чисел: 56,987,103,9011,45.*/

echo "<p style=\"font-weight: bold;\">Task 22 Найти число с максимальной суммой цифр среди чисел: 56,987,103,9011,45.</p><br>";

function find_max_sum($num)
{
    if(empty($num) || !isset($num)) return;

    echo $num."<br><br>";

    $arr_num = explode(",", $num);
    $arr_trans = array_map(function($elem){
        $sum = 0;
        for($i = 0; $i < strlen($elem); $i++){
            $sum += +$elem[$i];
        }
        return $sum; 
    }, $arr_num);

    $max_num = max(... $arr_trans);
    $num_max_sum = $arr_num[array_search($max_num, $arr_trans)];

    echo "Max-number of numbers is $num_max_sum with the sum of $max_num";
}

find_max_sum("56,987,103,9011,45");
echo "<hr>";  

/*23. Посчитайте и выведете кол-во встречающихся чисел в строке “В 2018 году появился проект, объединяющий возможности Windows Forms (.NET Framework) и PHP 7. Его разработка медленными темпами ведётся и сейчас. На текущий момент в движке доступны практически все функции для ООП. Среда находится на стадии приватной разработки. К исполняемому файлу по умолчанию прилагается php7ts.dll..*/

echo "<p style=\"font-weight: bold;\">Task 23 Посчитайте и выведете кол-во встречающихся чисел в строке “В 2018 году появился проект, объединяющий возможности Windows Forms (.NET Framework) и PHP 7. Его разработка медленными темпами ведётся и сейчас. На текущий момент в движке доступны практически все функции для ООП. Среда находится на стадии приватной разработки. К исполняемому файлу по умолчанию прилагается php7ts.dll..</p><br>";

function count_nums_in_str(string $str)
{
    if(empty($str) || !isset($str)) return;

    // 1 method
    $reg_exp = "/\d/im";

    preg_match_all( $reg_exp, $str, $arr_nums);

    $count_nums = count($arr_nums[0]);
    echo "<p>There are $count_nums numbers in the string.</p><br>";

    // 2 method
    $count = 0;
    for($i = 0; $i < strlen($str); $i++){
        if(is_numeric($str[$i])) $count++;
    }

    echo "<p>There are $count numbers in the string.</p><br>";
}

$str_with_nums = "В 2018 году появился проект, объединяющий возможности Windows Forms (.NET Framework) и PHP 7. Его разработка медленными темпами ведётся и сейчас. На текущий момент в движке доступны практически все функции для ООП. Среда находится на стадии приватной разработки. К исполняемому файлу по умолчанию прилагается php7ts.dll..";
count_nums_in_str($str_with_nums);
echo "<hr>";  

/*24. Есть 2 массива: arr1 = [1,2,3,4,5,6,7,8] и arr2 = [5, 3, 6, 9, 11]. Напишите функцию, которая принимает 2 массива и возвращает массив элементов, которые есть в обоих массивах. */

echo "<p style=\"font-weight: bold;\">Task 24 Есть 2 массива: arr1 = [1,2,3,4,5,6,7,8] и arr2 = [5, 3, 6, 9, 11]. Напишите функцию, которая принимает 2 массива и возвращает массив элементов, которые есть в обоих массивах.</p><br>";

function arr_matches(array $arr1, array $arr2)
{
    if(!isset($arr1) || !isset($arr2) || count($arr1) === 0 || count($arr2) === 0) return;

    // 1 method
    $result = array_intersect($arr1, $arr2);
    print_r($result);

    // 2 method
    $result2 = [];
    foreach($arr1 as $val){
        if(in_array($val, $arr2)) array_push($result2,$val);
    }
    print_r($result2);
}

arr_matches([1,2,3,4,5,6,7,8], [5, 3, 6, 9, 11]);
echo "<hr>";  

/*25. Есть два массива с числовыми значениями одинаковой длины. Создайте третий массив с суммами элементов данных массивов. Например:  [12,4,0] + [8,7,6] = [20, 11, 6].
. */

echo "<p style=\"font-weight: bold;\">Task 25 Есть два массива с числовыми значениями одинаковой длины. Создайте третий массив с суммами элементов данных массивов. Например:  [12,4,0] + [8,7,6] = [20, 11, 6].
</p><br>";

function arr_sum_val(array $arr1, array $arr2)
{
    if(!isset($arr1) || !isset($arr2) || count($arr1) === 0 || count($arr2) === 0) return;
    $arr_sum_val = [];
    for($i = 0; $i < count($arr1); $i++){
        $arr_sum_val[] =  $arr1[$i] + $arr2[$i];
    }

    print_r($arr_sum_val);
}

arr_sum_val([12,4,0], [8,7,6]);
echo "<hr>";  

/*25. Поменяйте местами максимальный и минимальных элементы в массиве.*/

echo "<p style=\"font-weight: bold;\">Task 25 Поменяйте местами максимальный и минимальных элементы в массиве.
</p><br>";

function arr_swap_val(array $arr)
{
    if(!isset($arr) || count($arr) === 0) return;
    print_r($arr);
    echo "<br>";
    $max_val = max(...$arr);
    $min_val = min(...$arr);

    foreach($arr as &$val){
        if($val === $max_val) {
            $val = $min_val;
        } else if($val === $min_val){
            $val = $max_val;
        }
    }
    echo "The array with swaped places of max and min values:";
    print_r($arr);
}

arr_swap_val([12, 4, 0, 12, 8, 0, 7,6]);
echo "<hr>";  

/*26. Напишите функцию alpha_bet_order(str), которая возвращает переданную строку с буквами в алфавитном порядке. Пример строки: 'alphabetical'. Ожидаемый результат: 'aaabcehillpt'. Предположим, что символы пунктуации и цифры не включены в переданную строку.*/

echo "<p style=\"font-weight: bold;\">Task 26 Напишите функцию alpha_bet_order(str), которая возвращает переданную строку с буквами в алфавитном порядке. Пример строки: 'alphabetical'. Ожидаемый результат: 'aaabcehillpt'. Предположим, что символы пунктуации и цифры не включены в переданную строку.
</p><br>";

function alpha_bet_order(string $str):string
{
    if(!isset($str) || empty($str) === 0) return '';

    echo $str."<br><br>";

    $arr_str = mb_str_split($str, 1);
    sort($arr_str ,SORT_NATURAL | SORT_FLAG_CASE);

    $str_sorted = implode('', $arr_str);

    return "<p>Sorted string: <strong>$str_sorted</strong></p>";
}

echo alpha_bet_order('alphabetical');
echo "<hr>";  

/*27. Напишите функцию find_longest_word(str), которая принимает строку в качестве параметра и находит самое длинное слово в строке..*/

echo "<p style=\"font-weight: bold;\">Task 27 Напишите функцию find_longest_word(str), которая принимает строку в качестве параметра и находит самое длинное слово в строке.
</p><br>";

function find_longest_word($str = null)
{
    if(!isset($str) || empty($str)) return;
    echo $str."</br>";
    $str = str_replace(".", "", $str);
    $str = trim($str);
    $arr_str = explode(" ", $str);
    $arr_str_len = array_map(function($v){
        return mb_strlen($v);
    }, $arr_str); 
    $max_len = max(...$arr_str_len);

    $arr_word = array_filter($arr_str, function ($v) use ($max_len) {
        if (mb_strlen($v) == $max_len) return $v;
    });

    if(count($arr_word) === 1){
        $arr_word = implode($arr_word);
        return "<p>Word with maxlength is <b>$arr_word</b>.</p>";
    } else {
        $arr_word = implode(", ", $arr_word);
        return "<p>Words with maxlength are <b>$arr_word</b>.</p>";

    }
}

echo find_longest_word("СLorem ipsum dolor sit amet consectetur adipisicing elit. Quis distinctio deserunt doloremque a aut reiciendis architecto ipsum, odio maxime illum.в");
echo "<hr>";

/*28. Нужно написать функцию, которая проверяет, являются ли две строки анаграммами, причем регистр букв не имеет значения. Учитываются лишь символы; пробелы или знаки препинания в расчет не берутся.*/

echo "<p style=\"font-weight: bold;\">Task 28 Нужно написать функцию, которая проверяет, являются ли две строки анаграммами, причем регистр букв не имеет значения. Учитываются лишь символы; пробелы или знаки препинания в расчет не берутся.
</p><br>";


function anag_check_words(...$words)
{
    if(!isset($words[0]) || !isset($words[1]) || empty($words[0]) || empty($words[1])) return;

    if(mb_strlen($words[0]) !== mb_strlen($words[1])) return "The words have different length";
    $word1 = $words[0];
    $word2 = $words[1];
    $letter = '';
    $pos = 0;

    $arr_word2 = mb_str_split(mb_strtolower($word2));

    for($i = 0; $i < mb_strlen($word1); $i++){
        $letter = mb_substr(mb_strtolower($word1), $i, 1);
        $pos = array_search($letter, $arr_word2);
        if ($pos === false) continue;
        array_splice($arr_word2, $pos, 1);
    }

    return (count($arr_word2) === 0) ? "<p><b>$word2</b> is an anagram of <b>$word1</b></p>" : "<p><b>$word2</b> isn't an anagram of <b>$word1</b></p>";

}

echo anag_check_words("Пила", "липа");
echo "<hr>";  

/*29. Напишите функцию create_password по созданию паролей длиной от минимум 8 символов, либо до кол-ва введеного через параметр. Обязательные требования к паролю: латинские символы и целые числа; специальные симоволы: _-,.&*^$#@+=!; минимум один большой симовол, одна цифра, один спец. символ.*/

echo "<p style=\"font-weight: bold;\">Task 29 Напишите функцию create_password по созданию паролей длиной от минимум 8 символов, либо до кол-ва введеного через параметр. Обязательные требования к паролю: латинские символы и целые числа; специальные симоволы: _-,.&*^$#@+=!; минимум один большой симовол, одна цифра, один спец. символ.
</p><br>";

echo '<form action="/PHP_HW4/" method="get">
     <p><strong>Create password</strong></p>
     <p>Enter the length of password:</p>
     <input type="number"  name="length_password" placeholder="Enter the length"><br>
     <input type="hidden"  name="length_default" value="8"><br>
     <button>Enter</button><br>
     '. create_password($_GET) .'
     </form>';

function create_password($data)
{
    if(array_key_exists("length_password", $data) == false && array_key_exists("length_default", $data) == false) return;
    
    $data1 = $data["length_password"] ?? null;
    $data2 = $data["length_default"] ?? null;

    $pass_length = 0;

    $lat_capital_letter = range("A", "Z");
    $lat_lower_letter = range("a", "z");
    $integer = range("0", "9");
    $spec_tokens = ["_","-",",",".","&","*","^","$","#","@","+","=","!"];

    $geheral_arr_elems = array_merge($lat_capital_letter, $lat_lower_letter, $integer, $spec_tokens);
    
    if($data1 < "8" && $data1 !== '') {
        return "<p><b>A password should have a length more than 8 positive signs</b></p>";
    } else {
        
        if($data1 === ''){
            $pass_length = +$data2;
        } elseif($data1 >= "8"){
            $pass_length = +$data1;
        }
    }
    
    
    function check_password($pass) 
    {
        $reg_exp_num = "/\d{1,}/im";
        $reg_exp_cap = "/[A-Z]{1,}/im";
        $reg_exp_token = "/[\.\_\-\&\*\#\@\+\=\!\^]{1,}/im";

        if(preg_match($reg_exp_num, $pass) && preg_match($reg_exp_cap, $pass) && preg_match($reg_exp_token, $pass)){
            return true;
        } else {
            return false;
        }
    };
        
    $password = '';

    for($i = 0;; $i++){
        $password .= $geheral_arr_elems[mt_rand(0, (count($geheral_arr_elems) - 1))];

        if(strlen($password) === $pass_length){
            if(!check_password($password)){
                $password = '';
            } else {
                break;
            }
        }
    }
    
    return "Password is <strong>$password</strong>";
 
}

echo "<hr>";  

/*30. Создайте функцию "Калькулятор", calc(expression), которая должны уметь вычислять операции: сложение, вычитание, умножение, разность; между положительными целочисленными значениями. Математическое выражение должно передаваться через параметр expression в виде строки, например: "45+8", "4-23". Если параметр не передается, то нужно запросить выражение через input. Результат вычисления выведите через alert. Используйте регулярные выражения для "парсинг" (обработки) параметра).*/

echo "<p style=\"font-weight: bold;\">Task 30 Создайте функцию \"Калькулятор\", calc(expression), которая должны уметь вычислять операции: сложение, вычитание, умножение, разность; между положительными целочисленными значениями. Математическое выражение должно передаваться через параметр expression в виде строки, например: \"45+8\", \"4-23\". Если параметр не передается, то нужно запросить выражение через input. Результат вычисления выведите через alert. Используйте регулярные выражения для \"парсинг\" (обработки) параметра.
</p><br>";

echo '<form action="/PHP_HW4/" method="get">
     <p><strong>Calculator</strong></p>
     <p>Enter Math expression:</p>
     <input type="text"  name="expression" placeholder="a + | - | * | / b"><br>
     <button>Enter</button><br>
     '. calc($_GET) .'
     </form>';

function calc($data)
{
    if(array_key_exists("expression", $data) == false || !isset($data)) return;
    
    $data = $data["expression"] ?? null;
    if($data === '') return;

    $arr = str_split($data);
    $arr2 = [];
    foreach($arr as $v){
        if($v !== ' ' && !is_numeric($v) && $v !== '=') array_push($arr2, $v);
    }
    print_r($arr2);

    preg_match_all("/\d+/im", $data, $nums);

    if(count($arr2) === 3) {
        $oper = $arr2[1];
    } elseif(!(preg_match("/^\-/im", $data)) && count($arr2) === 2){
        $oper = $arr2[0];
    } elseif ((preg_match("/^\-/im", $data)) && count($arr2) === 2){
        $oper = $arr2[1];
    } else {
        $oper = $arr2[0];
    }
    print_r($oper);

    $num_1 = $nums[0][0];
    $num_2 = $nums[0][1];

    $num_1 = (preg_match("/^\-/im", $data)) ? $num_1 * (-1) : $num_1;

    if(count($arr2) === 3) {
        $num_2 = $num_2 * (-1);
    } else if(!(preg_match("/^\-/im", $data)) && count($arr2) === 2){
        $num_2 = $num_2 * (-1);
    } else if ((preg_match("/^\-/im", $data)) && count($arr2) === 2){
        $num_2 = $nums[0][1];
    }

    echo "<br>".$num_1;
    echo "<br>".$num_2;


    switch($oper){
        case "+":
            $result = (+$num_1) + (+$num_2);
        break;
        case "-":
            $result = (+$num_1) - (+$num_2);
        break;
        case "*":
            $result = (+$num_1) * (+$num_2);
        break;
        case "/":
            if($num_2 !== '0') {
                $result = (+$num_1) / (+$num_2);
            } else {
                return "<p><strong>Result is infinity</strong></p>";
            }
        break;
        default;
    }

    return "<p><strong>Result is" . ($result) ? $result : 0 ."</strong></p>";
}

echo "<hr>";  

/*31. Напиши функцию, которая будет проверять любой объем текста на вхождение плохих (запрещенных) слов, и возвращать новый, прошедший цензуру, текст. Запрещенные слова нужно заменить на символы "#" в зависимости от длины слова. В функцию нужно передавать два параметра: текст, массив запрещенных слов.*/

echo "<p style=\"font-weight: bold;\">Task 31 Напиши функцию, которая будет проверять любой объем текста на вхождение плохих (запрещенных) слов, и возвращать новый, прошедший цензуру, текст. Запрещенные слова нужно заменить на символы \"#\" в зависимости от длины слова. В функцию нужно передавать два параметра: текст, массив запрещенных слов.</p><br>";

function censorship($str) 
{
    $swearing_words = ["мудак", "гребаную"];

    $replacing_sign = ['#'];
    $swearing_words_altered = [];
    foreach($swearing_words as $v){
        preg_match("/$v/", $str, $arr);

        $str_replaced = '';

        for($i = 0 ; $i < mb_strlen($arr[0]); $i++){
            $str_replaced .= $replacing_sign[0];
        }

        array_push($swearing_words_altered, $str_replaced);
    }


    echo str_replace($swearing_words, $swearing_words_altered, $str);

}
echo censorship("Сделай функцию, мудак, которая мудак принимает гребаную строку на русском языке");

echo "<hr>";  

?>
    </div>
</body>
</html>