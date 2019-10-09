<?php

namespace BrainGames\Even;

use function BrainGames\Common\game;

function run()
{
    game('even', condition_message());
}

function solution()
{
    $question = rand(1, 99);
    $answer = ($question % 2 == 0) ? 'yes' : 'no';
    return [$question, $answer];
}

function condition_message()
{
    return 'Answer "yes" if the number is even, otherwise answer "no".';
}
