#!/usr/bin/env php
<?php

namespace BrainGames\Games\Progression;

const RULE_PROGRESSION = "What number is missing in the progression?";

function getProgression(int $startNumber, int $step, int $length, int $missingIndex): array
{
    $progression = [];
    for ($i = 0; $i < $length; $i++) {
        $progression[] = $startNumber;
        $startNumber += $step;
    }
    $correctAnswer = (string)$progression[$missingIndex];
    $progression[$missingIndex] = "..";
    return [implode(" ", $progression), $correctAnswer];
}

function run()
{
    main(
        function () {
            $startNumber = rand(0, 50);
            $step = rand(1, 10);
            $length = rand(9, 11);
            $missingIndex = rand(0, $length - 1);
            return getProgression($startNumber, $step, $length, $missingIndex);
        },
        RULE_PROGRESSION
    );
}
