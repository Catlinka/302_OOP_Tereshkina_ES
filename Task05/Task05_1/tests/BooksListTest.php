<?php

namespace App\Tests;

use App\BooksList;
use App\Book;
use PHPUnit\Framework\TestCase;

class BookListTest extends TestCase
{
    static $bl1;
    public static function setUpBeforeClass(): void
    {
        $b1 = new Book();
        $b1->setTitle("Этюд в багровых тонах")
        ->setAuthors(array("Артур Конан Дойл"))
        ->setPublisher("Азбука")
        ->setYear(2004);

        $b2 = new Book();
        $b2->setTitle("Добрые предзнаменования")
        ->setAuthors(array("Нил Гейман", "Терри Пратчетт"))
        ->setPublisher("Эксмо")
        ->setYear(2020);

        $b3 = new Book();
        $b3->setTitle("Плюс на минус")
        ->setAuthors(array("Андрей Уланов", "Ольга Громыко"))
        ->setPublisher("Альфа-книга")
        ->setYear(2007);

        self::$bl1 = new BookList(array($b1, $b2, $b3));
    }
    public function testRewind()
    {
        self::$bl1->rewind();
        self::$bl1->next();
        self::$bl1->next();
        self::$bl1->next();
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0),
            self::$bl1->current()
        );
    }
    public function testNext()
    {
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2),
            self::$bl1->current()
        );
    }
    public function testValid()
    {
        self::$bl1->rewind();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            true,
            self::$bl1->valid()
        );
        self::$bl1->next();
        $this->assertSame(
            false,
            self::$bl1->valid()
        );
    }
    public function testValue()
    {
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1),
            self::$bl1->current()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2),
            self::$bl1->current()
        );
    }
    public function testKey()
    {
        self::$bl1->rewind();
        $this->assertSame(
            self::$bl1->get(0)->getId(),
            self::$bl1->key()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(1)->getId(),
            self::$bl1->key()
        );
        self::$bl1->next();
        $this->assertSame(
            self::$bl1->get(2)->getId(),
            self::$bl1->key()
        );
    }
}
