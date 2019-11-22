<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\play;

define('RULE_EVEN', 'Answer "yes" if the number is even, otherwise answer "no".');

function run()
{
    play(
        function () {
            $question = rand(1, 99);
            $answer = isEven($question) ? 'yes' : 'no';
            return [$question, $answer];
        },
        RULE_EVEN
    );
}

function isEven($number)
{
    return ($number % 2 == 0);
}
