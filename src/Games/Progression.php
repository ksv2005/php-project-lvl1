<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play;

define('PROGRESSION_LENGTH', 10);
define('RULE_PROGRESSION', 'What number is missing in the progression?');

function run()
{
    play(
        function () {
            $position = rand(1, 5);
            $step = rand(1, PROGRESSION_LENGTH);
            $hidden = rand(0, PROGRESSION_LENGTH - 1);
            $progression = [];
            while (count($progression) < PROGRESSION_LENGTH) {
                $progression[] = $position;
                $position += $step;
            }
            $answer = $progression[$hidden];
            $progression[$hidden] = '..';
            $question = implode(" ", $progression);
            return [$question, $answer];
        },
        RULE_PROGRESSION
    );
}
