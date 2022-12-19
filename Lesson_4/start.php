<?php

// Задание 1
$numbers = [4, 5, 1, 4, 7, 8, 15, 6, 71, 45, 2];

$result = array_map(function($item){
    if ($item & 1) return "нечетное";
    else return "четное";
}, $numbers);

print_r($result);

// Задание 2
function minMax(array $arrayOfNumbers): array
{
    $result["min"] = min($arrayOfNumbers);
    $result["max"] = max($arrayOfNumbers);
    $result["avg"] = array_sum($arrayOfNumbers)/count($arrayOfNumbers);
    return $result;
};

print_r(minMax($numbers));

// Задание 3
$box = [
    [
        'Тетрадь',
        'Книга',
        'Book',
        'Настольная игра',
        [
            'Настольная игра 1',
            'Настольная игра 2',
        ],
        [
            [
                'Ноутбук',
                'Зарядное устройство'
            ],
            [
                'Компьютерная мышь',
                'Набор проводов',
                [
                    'Фотография',
                    'Картина'
                ]
            ],
            [
                'Инструкция',
                [
                    'Ключ'
                ]
            ]
        ]
    ],
    [
        'Пакет кошачьего корма',
        [
            'Музыкальный плеер',
            'Карандаш'
        ]
    ]
 ];

 function findThing(string $thing, array $box): bool
 {
    foreach ($box as $item){
        if (is_array($item)) {
            if (findThing($thing, $item)) return true;
        }
        elseif ($item == $thing) return true;
    };
    return false;
 }

 if (findThing('Карандаш', $box)) echo 'Предмет найден';
 else echo 'Предмет не найден';