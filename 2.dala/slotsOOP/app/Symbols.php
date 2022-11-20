<?php

class Symbols {
    private array $symbols = ['F' => 1, 'L' => 2, 'O' => 3, 'B'=> 5, '@'=> 10, '*'=> 20, 'S' => 30, '8' => 50, '$' => 75]; // worst->best with its value


    public function getSymbols(): array
    {
        return $this->symbols;
    }

    public function randomSymbol(array $symbols): string
    {
        $randomValue = floor(mt_rand(0, 1000) / 10);
        if ($randomValue <= 3) {
            return $symbols[8];
        }
        if ($randomValue <= 6) {
            return $symbols[7];
        }
        if ($randomValue <= 9) {
            return $symbols[6];
        }
        if ($randomValue <= 13) {
            return $symbols[5];
        }
        if ($randomValue <= 21) {
            return $symbols[4];
        }
        if ($randomValue <= 40) {
            return $symbols[3];
        }
        if ($randomValue <= 50) {
            return $symbols[2];
        }
        if ($randomValue <= 70) {
            return $symbols[1];
        }
        return $symbols[0];
    }
}