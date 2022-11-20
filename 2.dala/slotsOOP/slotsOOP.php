<?php

require_once 'app/Board.php';
require_once 'app/Symbols.php';


$spinPrice = 1;
$money = (int) readline("Insert your money. Keep in mind that one spin is {$spinPrice}eur. ");

echo PHP_EOL . PHP_EOL;
echo "1.Roll";
echo PHP_EOL;
echo "2.Quit";
echo PHP_EOL;

$input = (int) readline("Wanna roll? :) Press 1 || Want to end? :( Press 2 ");

if($input == 2) {
    exit;
} else if($input > 2 || $input < 1) {
    echo "Invalid input";
    echo PHP_EOL;
    exit;
}

$board = [
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' '],
    [' ', ' ', ' ', ' ', ' '],
];

function displayBoard(array $board) {
        echo " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} | {$board[0][3]} | {$board[0][4]} \n";
        echo "---+---+---+---+---\n";
        echo " {$board[1][0]} | {$board[1][1]} | {$board[1][2]} | {$board[1][3]} | {$board[1][4]} \n";
        echo "---+---+---+---+---\n";
        echo " {$board[2][0]} | {$board[2][1]} | {$board[2][2]} | {$board[2][3]} | {$board[2][4]} \n";
}

$table = new Board();
$game = new Symbols();

while($money >= $spinPrice) {
    $boardSpaces = 15;
    for($i = 0; $i <= $boardSpaces; $i++) {
        for($j = 0; $j <= $boardSpaces; $j++) {
            $board[$i][$j] = $game->randomSymbol(array_keys($game->getSymbols()));
        }
    }

    displayBoard($board);
    echo PHP_EOL;

    $getPayed = 0;
    $money -= $spinPrice;

    foreach($table->getCombinations() as $combination) {
        $combinationCounter = 0;

        [$symbolX, $symbolY] = $combination[0];
        $symbol = $board[$symbolX][$symbolY];

        foreach($combination as $position) {
            [$x, $y] = $position;
            if ($board[$x][$y] !== $symbol) {
                break;
            }
            $combinationCounter++;
        }
        if($combinationCounter >= 3) {
            $amount = $game->getSymbols()[$symbol] * $combinationCounter;
            echo "You won {$amount}eur!";
            echo PHP_EOL;
            $money += $game->getSymbols()[$symbol] * $combinationCounter;
        }
    }

    echo "Your balance: {$money} eur";
    echo PHP_EOL;

    echo "1.Roll";
    echo PHP_EOL;
    echo "2.Quit";
    echo PHP_EOL;
    $input = readline("Roll or quit? ");
    if($input != 1) {
        exit;
    }
}
