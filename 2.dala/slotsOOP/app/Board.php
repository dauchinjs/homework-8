<?php

class Board {
//    private array $board = [
//        [' ', ' ', ' ', ' ', ' '],
//        [' ', ' ', ' ', ' ', ' '],
//        [' ', ' ', ' ', ' ', ' '],
//    ];
//    private array $board = [
//        ['F', 'F', 'F', 'F', 'F'],
//        ['L', 'O', 'B', 'L', '@'],
//        ['O', 'L', 'O', '@', 'B'],
//    ];
    private array $combinations = [
        //Horizontal
        [[0, 0], [0, 1], [0, 2], [0, 3], [0, 4]],
        [[1, 0], [1, 1], [1, 2], [1, 3], [1, 4]],
        [[2, 0], [2, 1], [2, 2], [2, 3], [2, 4]],

        //across up and down
        [[0, 0], [1, 1], [2, 2], [1, 3], [0, 4]],
        [[2, 0], [1, 1], [0, 2], [1, 3], [2, 4]],

        //across down ->
        [[0, 0], [1, 1], [2, 2], [2, 3], [2, 4]],

        //across up ->
        [[2, 0], [1, 1], [0, 2], [0, 3], [0, 4]],

        //-> across down
        [[0, 0], [0, 1], [0, 2], [1, 3], [2, 4]],

        //-> across up
        [[2, 0], [2, 1], [2, 2], [1, 3], [0, 4]],

        //zigzag
        [[1, 0], [0, 1], [1, 2], [0, 3], [1, 4]],
        [[2, 0], [1, 1], [2, 2], [1, 3], [2, 4]],
        [[0, 0], [1, 1], [0, 2], [1, 3], [0, 4]],
        [[1, 0], [2, 1], [1, 2], [2, 3], [1, 4]],
    ];

//    public function getBoard()
//    {
//        return $this->board;
//    }
//    public function displayBoard($board)
//    {
//        foreach($board as $row) {
//            foreach($row as $column) {
//                echo "| $column |";
//            }
//            echo PHP_EOL;
//            echo "|---||---||---||---||---|\n";
//        }

//        echo " {$board[0][0]} | {$board[0][1]} | {$board[0][2]} | {$board[0][3]} | {$board[0][4]} \n";
//        echo "---+---+---+---+---\n";
//        echo " {$board[1][0]} | {$board[1][1]} | {$board[1][2]} | {$board[1][3]} | {$board[1][4]} \n";
//        echo "---+---+---+---+---\n";
//        echo " {$board[2][0]} | {$board[2][1]} | {$board[2][2]} | {$board[2][3]} | {$board[2][4]} \n";
//    }

    public function getCombinations(): array
    {
        return $this->combinations;
    }
}