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
        if($this->pokemon1->speed < $this->pokemon2->speed)
        {
            $this->pokemon2Turn();
        }
        if($this->pokemon1->speed == $this->pokemon2->speed){
            $this->doCoinFlip();
        }
    }

    public function doCoinFlip() : void
    {
        $HEADS = 1;
        $TAILS = 2;
        $coinFlip = rand(1,2);
        if($coinFlip == $HEADS)
        {
            $this->pokemon1Turn();
        }
        if($coinFlip == $TAILS)
        {
            $this->pokemon2Turn();
        }
    }

    private function getWinningPokemon(): Pokemon|null
    {
        $pokemon1Hp = $this->pokemon1->getHp();
        $pokemon2Hp = $this->pokemon2->getHp();
        if($this->bothPokemonAlive()){
            return null;
        }
        if($pokemon1Hp > $pokemon2Hp){
            return $this->pokemon1;
        }
        if($pokemon2Hp > $pokemon1Hp){
            return $this->pokemon2;
        }
        return null;
    }

    private function bothPokemonAlive(): bool{
        $DEATH_HP = 0;
        $pokemon1Hp = $this->pokemon1->getHp();
        $pokemon2Hp = $this->pokemon2->getHp();

        if($pokemon1Hp > $DEATH_HP && $pokemon2Hp > $DEATH_HP)
        {
            return true;
        }
        return false;
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
