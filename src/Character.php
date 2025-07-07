<?php

class Character{
    private string $name;
    private string $class;
    private int $level;
    private array $atributes;

    public function __construct($name, $class, $level, array $atributes){
        $this->name = $name;
        $this->class = $class;
        $this->level = $level;
        $this->atributes = $atributes;
    }

    public function getSummary(): array{
        return [
            "name"=> $this->name,
            "class"=> $this->class,
            "level"=> $this->level,
            "atributes"=> $this->atributes
        ];
    }
}