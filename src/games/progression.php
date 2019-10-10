<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameEngine\game;

function run()
{
    game('progression', conditionMessage());
}

function solution()
{
    $number = rand(1, 5);
    $step = rand(1, 10);
    $select = rand(0, 9);
    $arr = [];
    while (count($arr) < 10) {
        $arr[] = $number;
        $number += $step;
    }

    $answer = $arr[$select];
    $arr[$select] = '..';
    $question = implode(" ", $arr);
    return [$question, $answer];
}

function conditionMessage()
{
    return 'What number is missing in the progression?';
}
