<?php

const Question1 = "Какая задача стоит перед вами сегодня? ";
const Question2 ="Сколько примерно времени эта задача займет? " ;

// Задание 1.
$name = readline("Здравствуйте, как вас зовут? ");
$age = readline("Сколько вам лет? ");
echo "Вас зовут $name, вам $age лет\n";
echo "\n";

// Задание 2.
$task1 = readline(Question1);
$duration1 = readline(Question2);

$task2 = readline(Question1);
$duration2 = readline(Question2);

$task3 = readline(Question1);
$duration3 = readline(Question2);

$totalDuration = $duration1 + $duration2 + $duration3;

echo "$name, сегодня у вас запланировано 3 приоритетных задачи на день:\n";
echo "- $task1 ($duration1 ч)\n";
echo "- $task2 ($duration2 ч)\n";
echo "- $task3 ($duration3 ч)\n";
echo "Примерное время выполнения плана = $totalDuration ч";

// Задание 2, вариант 2.
class Plan {
    public $task = "";
    public $duration = 0;
}

const taskCount = 3;
$plans = array();
$totalDuration = 0;

for ($i = 1; $i <= taskCount; $i++) {
	$plan = new Plan();
    $plan -> task = readline(Question1);
    $plan -> duration = readline(Question2);
    $plans[] = $plan;
    $totalDuration += $plan -> duration;
}

echo "$name, сегодня у вас запланировано " . taskCount . " приоритетных задачи на день:\n";
for ($i = 0; $i <= taskCount - 1; $i++) {
    echo "- {$plans[$i] -> task} ({$plan -> duration} ч)\n";
}
echo "Примерное время выполнения плана = $totalDuration ч";