<?php

// Базовый класс Lesson
class Lesson
{
    private $title;
    private $text;
    private $homework;

    public function __construct(string $title, string $text, string $homework)
    {
        $this->title = $title;
        $this->text = $text;
        $this->homework = $homework;
    }

    // Геттеры для свойств
    public function getTitle(): string
    {
        return $this->title;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function getHomework(): string
    {
        return $this->homework;
    }
}

// Класс PaidLesson (платный урок)
class PaidLesson extends Lesson
{
    private $price;

    // Конструктор с дополнительным параметром price
    public function __construct(string $title, string $text, string $homework, float $price)
    {
        parent::__construct($title, $text, $homework); // Вызов конструктора родителя
        $this->price = $price;
    }

    // Геттер для цены
    public function getPrice(): float
    {
        return $this->price;
    }

    // Сеттер для цены
    public function setPrice(float $price): void
    {
        $this->price = $price;
    }
}

// Создаем объект класса PaidLesson
$paidLesson = new PaidLesson(
    "Урок о наследовании в PHP",
    "Лол, кек, чебурек",
    "Ложитесь спать, утро вечера мудренее",
    99.90
);

// Выводим объект с помощью var_dump()
var_dump($paidLesson);