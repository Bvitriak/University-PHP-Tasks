<?php

// Абстрактный класс HumanAbstract, который представляет общие свойства и методы для всех людей
abstract class HumanAbstract
{
    private $name; // Свойство для хранения имени

    // Конструктор класса, который принимает имя и сохраняет его в свойство $name
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    // Метод для получения имени
    public function getName(): string
    {
        return $this->name;
    }

    // Абстрактные методы, которые должны быть реализованы в дочерних классах
    abstract public function getGreetings(): string; // Возвращает приветствие
    abstract public function getMyNameIs(): string; // Возвращает фразу "Меня зовут"

    // Метод для представления человека
    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

// Класс RussianHuman, который представляет человека, говорящего на русском языке
class RussianHuman extends HumanAbstract
{
    // Реализация метода getGreetings для русского языка
    public function getGreetings(): string
    {
        return 'Привет';
    }

    // Реализация метода getMyNameIs для русского языка
    public function getMyNameIs(): string
    {
        return 'Меня зовут';
    }
}

// Класс EnglishHuman, который представляет человека, говорящего на английском языке
class EnglishHuman extends HumanAbstract
{
    // Реализация метода getGreetings для английского языка
    public function getGreetings(): string
    {
        return 'Hello';
    }

    // Реализация метода getMyNameIs для английского языка
    public function getMyNameIs(): string
    {
        return 'My name is';
    }
}

// Функция для получения ввода от пользователя
function getInput(string $prompt): string
{
    echo $prompt; // Выводим подсказку для пользователя
    return trim(fgets(STDIN)); // Считываем ввод и удаляем лишние пробелы и символы новой строки
}

// Получаем имя от пользователя
$name = getInput("Введите ваше имя: ");

// Создаем объекты классов RussianHuman и EnglishHuman с введенным именем
$russianHuman = new RussianHuman($name);
$englishHuman = new EnglishHuman($name);

// Выводим приветствия на русском и английском языках
echo $russianHuman->introduceYourself() . PHP_EOL; 
echo $englishHuman->introduceYourself() . PHP_EOL;