<?php
namespace Knutte\DiceGame;

/**
 * A Dice class for playing 100.
 */

class Dice
{
    /**
     * Roll a dice. Resets $rolls if outcome is 1.
     * @return integer random number between 1 and 6. Return false if 1.
     */
    public function roll()
    {
        $outcome = rand(1, 6);
        if ($outcome == 1) {
            return false;
        }
        return $outcome;
    }
}
