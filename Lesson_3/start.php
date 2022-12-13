<?php

// Задание 1
$array1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$array2 = $array1;

foreach ($array1 as $key => $item) {
    $array3[] =  $array1[$key] * $array2[$key];
}

print_r($array3);
$array3 = [];

for ($i = 0; $i < 10; $i++) {
    $array3[] =  $array1[$i] * $array2[$i];
}

print_r($array3);

// Задание 2
$wishes = ["процветания", "счастья", "здоровья",  "богатства", "изобилия", "урожая"];
$epithets = ["огромного", "бесконечного", "бескрайнего", "крепкого", "увесистого", "неподдельного"];

do {
    $name = readline("Как вас зовут? ");   
} while (!$name);

$congratulation = "Дорогой $name, от всего сердца поздравляю тебя с днем рождения, желаю";

for ($i = 1; $i <= 3; $i++){
    $key1 = array_rand($wishes, 1);
    $key2 = array_rand($epithets, 1);
    $congratulation = "$congratulation $epithets[$key2] $wishes[$key1]";
    if ($i == 2) $congratulation = $congratulation . " и";
    elseif ($i < 2) $congratulation = $congratulation . ", ";
    unset($wishes[$key1]);
    unset($epithets[$key2]);
};

echo $congratulation . ".\n";
echo "\n";

// Задание 3
$students = [
    'ЭВМ1' => [
        'Мещерякова Мария' => 4,
        'Пахомова Ева' => 2,       
        'Цветков Вадим' => 4,    
        'Савин Савелий' => 5,
        'Соловьев Станислав' => 4,
        'Короткова Ксения' => 5,
        'Белякова София' => 4,
        'Панина София' => 5,            
    ],

    'ИТ20' => [
        'Иванов Иван' => 5,
        'Кириллов Кирилл' => 3,
        'Зыкова Виктория' => 2,
        'Ефимова Мария' => 4,
        'Кулешов Эмир' => 6,
        'Ковалева Елизавета' => 4,
        'Соколов Матвей' => 3,
        'Петров Пётр' => 2,
    ],

    'БАП20' => [
        'Антонов Антон' => 3,
        'Сергеев Леон' => 5,
        'Андреева Виктория' => 4,
        'Крылова София' => 3,
        'Сергеева Алиса' => 2,
        'Егорова Александра' => 4,
        'Лебедева Алёна' => 5,
    ],

    'ЭВМ2' => [
        'Черепанов Сергей' => 4,
        'Чернышев Александр' => 2,       
        'Миронова Виктория' => 4,    
        'Тарасов Вячеслав' => 5,
        'Сафонов Матвей' => 4,
        'Павлов Платон' => 5,
        'Дубова Елизавета' => 4,
        'Васильев Андрей' => 5,            
    ]
 ];


$maxAvarage = 0;
$i = 0;
$j = 0;

foreach ($students as $key => $item) {
    $performance[$i][0] = array_sum($item) / count($item);
    $performance[$i][1] = $key;
    $i++;
    foreach ($item as $nanmeKey => $value){
        if ($value < 3) {
            $hitList[$key][$j] = $nanmeKey;
            $j++;
        }
    }
}

rsort($performance);
// Тут оставляем группы с одинаковой максимальной успеваемостью
for ($i = 1; $i < count($performance); $i++) {
    if ($performance[$i][0] < $performance[0][0]) {
        array_splice($performance, $i, 1);
        $i--;
    };
}

if (count($performance) > 1) {
    echo "Группы с наибольшей успеваимостью:\n";
    foreach ($performance as $key => $item) echo "$key. $item[1]\n"; 
}
else echo "Группа с наибольшей успеваимостью - {$performance[0][1]}\n";

echo "\n";
echo "Кандидаты на вылет:\n";
print_r($hitList);


