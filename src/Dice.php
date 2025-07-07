<?php

class Dice {
    private int $sides;

    public function __construct(int $sides) {
        $this->sides = $sides;
    }
    public function roll() :int {
        return rand(1, $this->sides);
    }

    public function getSides(): int {
        return $this->sides;
    }
}