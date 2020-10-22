<?php
echo '<h1>Exercice :</h1>
Cet exercice va uniquement permettre de savoir combien de fois a été instancié la class.';

class Counter
{
    private static $_counter = 0;


    public function __construct()
    {
        self::$_counter++;   
    }


    public static function getCounter() // Méthode statique qui renverra la valeur du compteur.
    {
        return self::$_counter;
    }
}
$test1 = new Counter;
$test2 = new Counter;
$test3 = new Counter;

echo 'La class a été instancié '.counter::getCounter().' fois.';

