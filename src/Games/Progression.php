<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\game;

define('PROGRESSION_LENGTH', 10);

function run()
{
    game(
        'BrainGames\Games\Progression\getQuestionAndAnswer',
        'What number is missing in the progression?'
    );
}

function getQuestionAndAnswer()
{
    $number = rand(1, 5);
    $step = rand(1, PROGRESSION_LENGTH);
    $select = rand(0, PROGRESSION_LENGTH - 1);
    $result = [];
    while (count($result) < PROGRESSION_LENGTH) {
        $result[] = $number;
        $number += $step;
    }

    $answer = $result[$select];
    $result[$select] = '..';
    $question = implode(" ", $result);
    return [$question, $answer];
}
