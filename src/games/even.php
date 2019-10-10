<?php

namespace BrainGames\Games\Even;

use function BrainGames\GameEngine\game;

function run()
{
    game('even', conditionMessage());
}

function solution()
{
    $question = rand(1, 99);
    $answer = ($question % 2 == 0) ? 'yes' : 'no';
    return [$question, $answer];
}

function conditionMessage()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
