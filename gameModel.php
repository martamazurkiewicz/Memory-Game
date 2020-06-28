<?php
class GameModel
{
    public $tiles = [];
    function __construct()
    {
        for ($i = 0; $i < 10; $i++) {
            for ($j = 0; $j < 2; $j++) {

                array_push($this->tiles,$i);
            }
        }
        shuffle($this->tiles);
    }
}
