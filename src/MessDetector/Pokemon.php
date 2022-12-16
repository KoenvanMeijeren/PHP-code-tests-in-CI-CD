<?php

namespace Src\MessDetector;

enum Type{
    case Fire;
    case Water;
    case Grass;
}
final class Pokemon
{
    public function __construct(
        public readonly string $name,
        public readonly Type $type,
        private int $hp,
        public readonly int $attackDmg,
        public readonly int $speed,
    )
    {}

    public function getHp(){
        return $this->hp;
    }

    public function damage(int $dmg){
        $this->hp -= $dmg;
    }

    public function  __toString(): string
    {
        return "Pokemon: {$this->name}";
    }
}
