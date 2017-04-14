<?php
namespace Knutte\DiceGame;

class Player
{
    public function __construct($dice)
    {
        $this->dice = $dice;
        $this->rolls = [];
        $this->score = 0;
    }

    public function roll()
    {
        $roll = $this->dice->roll();
        if ($roll != false) {
            array_push($this->rolls, $roll);
        } else {
            $roll = false;
            $this->clearRolls();
        }
        return $roll;
    }

    public function sum()
    {
        $this->score += array_sum($this->rolls);
    }

    public function clearRolls()
    {
        $this->rolls = [];
    }

    public function getRollSum()
    {
        return array_sum($this->rolls);
    }

    public function getTotal()
    {
        return array_sum($this->rolls) + $this->score;
    }
}
