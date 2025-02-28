<?php

class Cat
{
    private $name;
    private $color; // Приватное свойство для цвета

    // Конструктор теперь принимает и имя, и цвет
    public function __construct(string $name, string $color)
    {
        $this->name = $name;
        $this->color = $color;
    }

    // Геттер для имени
    public function getName(): string
    {
        return $this->name;
    }

    // Геттер для цвета
    public function getColor(): string
    {
        return $this->color;
    }

    // Метод sayHello() теперь также сообщает цвет кошки
    public function sayHello(): string
    {
        return "Меня зовут {$this->name}, и я {$this->color} цвета.";
    }
}

// Создаем объект кошки
$cat = new Cat("Мурка", "рыжий");

// Выводим приветствие
echo $cat->sayHello() . PHP_EOL;