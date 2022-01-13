#!/usr/bin/env php
<?php

namespace BrainGames\Games\Even;

use function BrainGames\Engine\main;

const RULE_EVEN = "Answer 'yes' if the number is even, otherwise answer 'no'.";

function isEven(int $number): string
{
    if ($number % 2 === 0) {
        return "yes";
    }
    return "no";
}

function run()
{
    main(
        function () {
            $question = rand(0, 100);
            $correctAnswer = isEven($question);
            return [$question, $correctAnswer];
        },
        RULE_EVEN
    );
}
