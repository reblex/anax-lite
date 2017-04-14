<?php
namespace Knutte\DiceGame;

require_once('Dice.php');
require_once('Player.php');


class Game
{
    public function __construct()
    {
        $this->dice = new \Knutte\DiceGame\Dice();

        $this->player1 = new \Knutte\DiceGame\Player($this->dice);
        $this->player2 = new \Knutte\DiceGame\Player($this->dice);
        $this->players = [null, $this->player1, $this->player2];

        $this->currPlayer = 1;

        $this->playing = true;

        $this->status = " ";
    }


    public function roll()
    {
        $outcome = $this->players[$this->currPlayer]->roll($this->dice);

        if ((int)$this->players[$this->currPlayer]->getTotal() >= 100) {
            $this->playing = false;
            $this->status = "Spelare " . $this->currPlayer . " har totalt " . $this->players[$this->currPlayer]->getTotal() . " poäng och har vunnit spelet!";
        } elseif ($outcome == false) {
            $this->currPlayer = $this->currPlayer == 1 ? $this->currPlayer = 2 : $this->currPlayer = 1;
            $this->status = "Senaste slaget var en etta och turen gå nu över till spelare " . $this->currPlayer . ".";
        } else {
            $this->status = "Senaste slaget var " . $outcome . ".";
        }
    }


    public function stop()
    {
        $this->players[$this->currPlayer]->sum();
        $this->players[$this->currPlayer]->clearRolls();
        $lastPlayer = $this->currPlayer;
        $this->currPlayer = $this->currPlayer == 1 ? $this->currPlayer = 2 : $this->currPlayer = 1;
        $this->status = "Spelare " . $lastPlayer . " har stannat och turen går nu över till spelare " . $this->currPlayer . ".";
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getPlaying()
    {
        return $this->playing;
    }

    public function getCurrentRollSum()
    {
        return $this->players[$this->currPlayer]->getRollSum();
    }

    public function getPlayingNum()
    {
        return $this->currPlayer;
    }

    public function getRollSum($playerNum)
    {
        return $this->players[$playerNum]->getRollSum();
    }

    public function getScore($playerNum)
    {
        return $this->players[$playerNum]->getScore();
    }

    public function getTotal($playerNum)
    {
        return $this->players[$playerNum]->getTotal();
    }
}
