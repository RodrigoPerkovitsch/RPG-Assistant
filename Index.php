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

function parseCommands(string $input): array {
    preg_match_all('/(\d*)d(\d+)/i', $input, $matches, PREG_SET_ORDER);
    $commands = [];

    foreach ($matches as $m) {
        $qty = $m [1] == '' ? 1 :intval($m[1]);
        $sides = intval($m [2]);
        $commands[] = ['qty' => $qty, 'faces' => $sides];

    }

    return $commands;

}

while (true) {
    echo "\n====Rolagem Dados====\n";
    echo "Digite comandos como: 2d20+2 ou sair)\n";
    $entry = trim(fgets(STDIN));

    $cmds = parseCommands($entry);
    if (empty($cmds)) {
        echo "Nenhum comando valido encontrado. Use o Formado (Quantidade de rolagens)D(Quantidade de lados) \n";
        continue;

    } 
    
    foreach ($cmds as $cmd) {
        $qty = $cmd['qty'];
        $faces = $cmd ['faces'];

    if (!isset($diceSet["d$faces"])) {
        echo "dado d{$faces} não disponivel. \n";
        continue;
    }

    $dice = $diceSet["d$faces"];
    $rolls = [];

    for ($i=0; $i < $qty; $i++) {
        $rolls[] = $dice->roll();

    }

    $sum = array_sum($rolls);

    $rollsList = implode(', ', $rolls);
    echo "rolando {$qty}d{$faces}: [{$rollsList}] => total: {$sum}\n";

    }

    echo "> ";

    if (strtolower($entry) === 'sair') {
        echo "Saindo...";
        break;
    }
}