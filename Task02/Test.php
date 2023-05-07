<?php

function runTest()
{
    $v1 = new Vector(3, 2, 1);
    echo "Ожидается: (3;2;1)" . PHP_EOL;
    echo "Получено: " . $v1 . PHP_EOL;

    $v2 = new Vector(2, 4, 1);
    $v3 = $v1->add($v2);
    echo "Ожидается: (5;6;2)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    $v3 = $v1->sub($v2);
    echo "Ожидается: (1;-2;0)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    $v3 = $v1->product(3);
    echo "Ожидается: (9;6;3)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    $v3 = $v1->scalarProduct($v2);
    echo "Ожидается: 15" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;

    $v3 = $v1->vectorProduct($v2);
    echo "Ожидается: (-2;-1;8)" . PHP_EOL;
    echo "Получено: " . $v3 . PHP_EOL;
}

