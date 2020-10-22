
<html>
<body>
    <?php
    $nbr1 = 6;
    $nbr2 = 2;
    $op = "/";
    function calculator($nbr1, $nbr2, $op)
    {
        switch ($op) { // switch is used here to test a particular case according to the keyed of the user
            case "+":
                echo "La somme de ".$nbr1." ".$op." ".$nbr2." est égale à ".($nbr1 + $nbr2);
                break;
            case "-":
                echo "La soustraction de ".$nbr1." ".$op." ".$nbr2." est égale à ".($nbr1 - $nbr2);
                break;
            case "*":
                echo "La multiplication de ".$nbr1." par ".$nbr2." est égale à ".($nbr1 * $nbr2);
                break;
            case "/":
                echo "La divistion de ".$nbr1." par ".$nbr2." est égale à ".($nbr1 / $nbr2);
                break;
        }
    }
    echo calculator($nbr1, $nbr2, $op);
    ?>
</body>
</html>
