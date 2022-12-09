<?php

// Задание 1.
while (true) { 
    $answer = (int)readline("В каком году Колумб открыл Америку? (варианты: 1546,  1492, 1399): ");
    switch ($answer) {
        case 1492: 
            echo "Спасибо, верный ответ.";
            break(2);
        case $answer == 1546 || $answer == 1399:
            echo "Ответ не верный.";
            break(2);
    }
}
 
echo "\n";

// Задание 2.
$taskCount = 0;
$tempStr = "";
$duration = 0;
$totalDuration = 0;

$name = readline("Здравствуйте, как вас зовут? ");
$age = (int)readline("Сколько вам лет? ");
echo "Вас зовут $name, вам $age лет\n";

do {
    $taskCount = (int)readline("Сколько задач вы планируете на день? ");   
} while ($taskCount == 0);

echo "\n";

for ($i = 1; $i <= $taskCount; $i++) {
    $tempStr .= "- " . readline("Какая задача $i стоит перед вами сегодня? ");
    $duration = (int)readline("Сколько примерно времени эта задача займет? ");
    $tempStr .= " ($duration ч)\n";
    $totalDuration += $duration;
}

echo "$name, сегодня у вас запланировано $taskCount приоритетных задачи на день:\n";
echo $tempStr;
echo "Примерное время выполнения плана = $totalDuration ч\n";

// Задание 3.
function finger($number)
{
    $finger = $number % 8;
    if ($finger == 6) $finger = 4;
    elseif ($finger == 7)  $finger = 3;
        elseif ($finger == 0) $finger = 2;   
    return  $finger;   
}

// Проверка функции
// for ($i = 1; $i <= 100; $i++) {
//     echo finger($i) . "; ";
// }


do {
    $number = (int)readline("Введите число: ");   
} while ($number <= 0);

echo finger($number);
