<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Funciones</title>
</head>
<body>
    <?php
        class Number
        {
            private int|float $number;

            public function setNumber(int|float $numero ):void{
                $this->number = $numero;
            }

            public function getNumber(): int|float{
                return $this->number;
            }
        }

        $num = new Number(10);
        $num->setNumber(10);
        
        echo $num->getNumber();
        echo "<br>";

        define("X","Patata");

        if(defined("X")){
            echo "Me falta comprar ". X . "<br>";
        }else{
            echo "No me hace falta";    
        }

        echo __LINE__ . " Version de PHP: " . PHP_VERSION . "<br>";
        echo __LINE__ . " Sistema Operativo: " . PHP_OS . "<br>";


    
    ?>
</body>
</html>