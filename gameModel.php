<?php
class GameModel
{
    public $numberOfTiles = 20;
    public $tilesInRow = 4;
    public $tiles = [];
    public $checkedTiles = [];
    public $score = 20;
    function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 2; $j++) {

                array_push($this->tiles,$i);
            }
        }
        shuffle($this->tiles);
    }
    public function UpdateScore($wasPairChosen)
    {
        if ($wasPairChosen)
            $this->score++;
        else
            $this->score--;
    }
    public function CheckTiles($tileNum1, $tileNum2)
    {
        if ($this->CheckIfPair($tileNum1, $tileNum2)) {
            array_push($this->checkedTiles, $tileNum1);
            array_push($this->checkedTiles, $tileNum2);
        }
    }
    public function CheckIfPair($tileNum1, $tileNum2)
    {
        if ($this->tiles[$tileNum1] == $this->tiles[$tileNum2])
            return true;
        else
            return false;
    }
}
