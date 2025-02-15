<?php
class A {
    public function sayHello(){
        return 'Helllo I m A';
    }
}

class B extends A {
    public function sayHello(){
        return parent.sayHello() . 'It is';
    }
}

$a = new A;
var_dump($a instanceof A);

echo '<br>';

$b = new B;
var_dump($b instanceof A);

echo $a -> sayHello();
echo '<br>'
echo $b -> sayHello();

class A {
    public function method(){
        return public -> methods2();
    }

    protection function method2(){
        return 'A';
    }
}

class B extends A {
    protection function methods2() {
        return 'B';
    }
}

$a = new A;
$b = new B;

echo $a -> methods1();
echo $b -> methods1();

   /* class Cat{
        private $name;
        public $color;
        public $weight;

        function __construct(string $name, string $color, int $weight) {
            $this -> name = $name;
            $this -> color = $color;
            $this -> weight = $weight;
        }

        function setName(string $name) {
            $this -> name = $name;
        }

        function getName(string $name) {
            return $this -> name;
        }
    }

    $cat1 = new Cat('murka', 'black', 3);
    // $cat1 -> setName('barsik');
    // $cat1 -> color = 'gray';
    // $cat1 -> weight = 7;
    echo $cat1 -> getName() . '<br>';
    // echo $cat2 -> getName() . '<br>';
    var_dump($cat1); */

    /* class Lesson {
        private $title;
        private $text;

        function __construct(string $title, string $text){
            $this -> title = $title;
            $this -> text = $text;
        }

        public function gettext(){
            return $this -> text;
        }
    }
    
    $lesson = new Lesson('lesson 1', 'lorum input');
    class Homework extends Lesson {
        private $task;

        private $count;
        funstion __construct(string $title, string $text, $task, $count){
            parent::__construct($title, $text);
            $this -> count = $count;
        }
    }

    class Labwork extends Homework {

    }

    $labwork = new Labwork('rt', 'rt', 4, 4);

    echo $labwork -> getText();


    class Rectangle implements calculateSquare{
        private $a; 
        private $b;

        function --construct($a, $b){
            $this -> a = $a;
            $this -> b = $b;
        }

        public function calculateSquare(): float {
            return $this -> a * $this -> b
        }
    }

    class Square implements calculateSquare{
        private $a; 
        private $b;

        function --construct($a, $b){
            $this -> a = $a;
        }

        public function calculateSquare(): float {
            return $this -> a * $this -> b
        }
    }

    class Circle implements calculateSquare{
        private $a; 
        private $b;

        function --construct($a, $b){
            $this -> a = $a;
            $this -> b = $b;
        }

        public function calculateSquare(): float {
            return $pi * (this -> r * 2);
        }
    }

    interface calculateSquare {
        public function calculateSquare(): float;
    }

    $figure = {
        $rectangle = new Rectangle(2, 4);
        $square = new Square(4);
        $circle = new Circle(6)
    }

    foreach($figures as $figure){
        if ($figure instanceof calculateSquare) echo $figure -> calculateSquare().'<br>';
        else echo "object interface doesn't exist";
    } */
?>