<?php

// Интерфейс для вычисления площади
interface CalculateSquare
{
    public function calculateArea(): float;
}

// Класс Circle, реализующий интерфейс CalculateSquare
class Circle implements CalculateSquare
{
    private $radius;

    public function __construct(float $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea(): float
    {
        return pi() * $this->radius ** 2;
    }
}

// Класс Rectangle, реализующий интерфейс CalculateSquare
class Rectangle implements CalculateSquare
{
    private $width;
    private $height;

    public function __construct(float $width, float $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea(): float
    {
        return $this->width * $this->height;
    }
}

// Класс, который не реализует интерфейс CalculateSquare
class Cat
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }
}

// Функция для вывода информации о площади объекта
function printAreaInfo($object)
{
    if ($object instanceof CalculateSquare) {
        echo "Объект класса " . get_class($object) . " имеет площадь: " . $object->calculateArea() . PHP_EOL;
    } else {
        echo "Объект класса " . get_class($object) . " не реализует интерфейс CalculateSquare." . PHP_EOL;
    }
}

// Создаем объекты
$circle = new Circle(5);
$rectangle = new Rectangle(4, 6);
$cat = new Cat("Барсик");

// Выводим информацию о площади
printAreaInfo($circle);    
printAreaInfo($rectangle); 
printAreaInfo($cat);       