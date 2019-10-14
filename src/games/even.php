<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameEngine\game;

function run()
{
    game('even', conditionMessage());
}

function getResult()
{
    $question = rand(1, 99);
    $answer = even($question);
    return [$question, $answer];
}

function even($number)
{
    return ($number % 2 == 0) ? 'yes' : 'no';
}

function conditionMessage()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
