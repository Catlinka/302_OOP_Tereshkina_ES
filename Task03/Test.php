<?php

use App\Book;
use App\BookList;

function runTest()
{
    $bl1 = new BookList(array());

    $b1 = new Book();
    $b1->setTitle("Этюд в багровых тонах")
    ->setAuthors(array("Артур Конан Дойл"))
    ->setPublisher("Азбука")
    ->setYear(2004);
    echo $b1 . PHP_EOL;

    $bl1->add($b1);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL;

    $b2 = new Book();
    $b2->setTitle("Добрые предзнаменования")
    ->setAuthors(array("Нил Гейман", "Терри Пратчетт"))
    ->setPublisher("Эксмо")
    ->setYear(2020);
    echo $b2 . PHP_EOL;

    $bl1->add($b2);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL;

    $b3 = new Book();
    $b3->setTitle("Плюс на минус")
    ->setAuthors(array("Андрей Уланов", "Ольга Громыко"))
    ->setPublisher("Альфа-книга")
    ->setYear(2007);
    echo $b3 . PHP_EOL;

    $bl1->add($b3);
    echo "Количество книг в списке: " . $bl1->count() . PHP_EOL . PHP_EOL;

    $bl1->store("BookList");

    $bl2 = new BookList();
    $bl2->load("BookList");

    for ($i = 0; $i < $bl2->count(); $i++) {
        echo "Ожидается: " . $bl1->get($i)  . PHP_EOL;
        echo "Получено: " . $bl2->get($i) . PHP_EOL;
    }

    echo $bl2->count();
}
