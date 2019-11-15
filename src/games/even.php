<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameEngine\game;

function run()
{
    game('BrainGames\Games\Even\getSolution', conditionMessage());
}

function getSolution()
{
    $question = rand(1, 99);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function isEven($number)
{
    return ($number % 2 == 0);
}

function conditionMessage()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
