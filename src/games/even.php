<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\game;

function run()
{
    game(
        'BrainGames\Games\Even\getQuestionAndAnswer',
        'Answer "yes" if the number is even, otherwise answer "no".'
    );
}

function getQuestionAndAnswer()
{
    $question = rand(1, 99);
    $answer = isEven($question) ? 'yes' : 'no';
    return [$question, $answer];
}

function isEven($number)
{
    return ($number % 2 == 0);
}
