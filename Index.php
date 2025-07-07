<?php

require __DIR__ . "\src\Dice.php";
require __DIR__ . "\src\Character.php";

$diceSet = [
    'd2' => new Dice(2),
    'd4' => new Dice(4),
    'd6' => new Dice(6),
    'd8' => new Dice(8),
    'd10' => new Dice(10),
    'd12' => new Dice(12),
    'd20' => new Dice(20),
    'd100' => new Dice(100),
];

while (true) {
    echo "\n====Rolagem Dados====\n";
    echo "Escolha um dado ou digite sair\n";

    foreach ($diceSet as $label => $dice){
        echo  "- $label\n";
    }

    echo "> ";
    $entrada = trim(fgets(STDIN));

    if ($entrada === 'sair') {
        echo "Saindo...";
        break;
    }

    if (array_key_exists($entrada, $diceSet)){
        $resultado = $diceSet[$entrada]->roll();
        echo "Você rolou um $entrada e tirou: $resultado\n";

    } else {
        echo "Dado Invalido. tente novamente.\n";
    }
}


$atributes = [
    'Strength' => 0,
    'Dexterity'=> 0,
    'Constituition' => 0,
    'Inteligence' => 0,
    'Winsdon' => 0,
    'Charisma' => 0
];

var_dump($atributes);