<?php

namespace Src\MessDetector;

final class BattleSimulator
{
    private Pokemon $attackingPokemon;
    private Pokemon $defendingPokomon;
    public function __construct(
        private readonly Pokemon $pokemon1,
        private readonly Pokemon $pokemon2
    )
    {}

    public function pokemon1Turn() : void
    {
        $this->attackingPokemon = $this->pokemon1;
        $this->defendingPokomon = $this->pokemon2;
    }

    public function pokemon2Turn() : void
    {
        $this->attackingPokemon = $this->pokemon2;
        $this->defendingPokomon = $this->pokemon1;
    }

    public function decideAttacker() : void
    {
        if($this->pokemon1->speed > $this->pokemon2->speed)
        {
            $this->pokemon1Turn();
        }
        else if($this->pokemon1->speed == $this->pokemon2->speed)
        {
            $this->doCoinflip();
        }
        else
        {
            $this->pokemon2Turn();
        }
    }

    public function doCoinFlip() : void
    {
        $coinFlip = rand(1,2);
        if($coinFlip == 1)
        {
            $this->pokemon1Turn();
        }
        else
        {
            $this->pokemon2Turn();
        }
    }

    public function getWinningPokemon(): Pokemon
    {
        if($this->pokemon1->getHp() > 0){
            return $this->pokemon1;
        }
        else {
            return $this->pokemon2;
        }
    }


    public function simulateBattle(): Pokemon
    {
        $this->decideAttacker();

        while($this->pokemon1->getHp() > 0 && $this->pokemon2->getHp() > 0){
            $this->defendingPokomon->damage($this->attackingPokemon->attackDmg);
            $temp = $this->attackingPokemon;
            $this->attackingPokemon = $this->defendingPokomon;
            $this->defendingPokomon = $temp;
        }

        return $this->getWinningPokemon();
    }

}
