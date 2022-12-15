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



    public function simulateBattle()
    {
        if($this->pokemon1->speed > $this->pokemon2->speed)
        {
            $this->attackingPokemon = $this->pokemon1;
            $this->defendingPokomon = $this->pokemon2;
        }
        else if($this->pokemon1->speed == $this->pokemon2->speed)
        {
            $coinflip = rand(1,2);
            if($coinflip == 1)
            {
                $this->attackingPokemon = $this->pokemon1;
                $this->defendingPokomon = $this->pokemon2;
            }
            else
            {
                $this->attackingPokemon = $this->pokemon2;
                $this->defendingPokomon = $this->pokemon1;
            }
        }
        else
        {
            $this->attackingPokemon = $this->pokemon2;
            $this->defendingPokomon = $this->pokemon1;
        }

        while($this->pokemon1->getHp() > 0 && $this->pokemon2->getHp() > 0){
            $this->defendingPokomon->dammage($this->attackingPokemon->attackDmg);
            $temp = $this->attackingPokemon;
            $this->attackingPokemon = $this->defendingPokomon;
            $this->defendingPokomon = $temp;
        }

        if($this->pokemon1->getHp() > 0){
            return $this->pokemon1;
        }
        else {
            return $this->pokemon2;
        }

    }

}
