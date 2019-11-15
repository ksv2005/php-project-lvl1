<?php

namespace BrainGames\Games\Progression;

use function BrainGames\GameEngine\game;

define('PROGRESSION_LENGTH', 10);

function run()
{
    game('BrainGames\Games\Progression\getSolution', conditionMessage());
}

function getSolution()
{
    $number = rand(1, 5);
    $step = rand(1, PROGRESSION_LENGTH);
    $select = rand(0, PROGRESSION_LENGTH - 1);
    $arr = [];
    while (count($arr) < PROGRESSION_LENGTH) {
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
