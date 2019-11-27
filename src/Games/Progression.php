<?php

namespace BrainGames\Games\Progression;

use function BrainGames\Engine\play;

define('PROGRESSION_LENGTH', 10);
define('RULE_PROGRESSION', 'What number is missing in the progression?');

function run()
{
    play(
        function () {
            $startElementPosition = rand(1, 5);
            $step = rand(1, PROGRESSION_LENGTH);
            $hiddenElementPosition = rand(0, PROGRESSION_LENGTH - 1);
            $progression = [];
            for ($i = 0; $i < PROGRESSION_LENGTH; $i++) {
                $progression[] = $startElementPosition + $step * $i;
            }
            $answer = $progression[$hiddenElementPosition];
            $progression[$hiddenElementPosition] = '..';
            $question = implode(" ", $progression);
            return [$question, $answer];
        },
        RULE_PROGRESSION
    );
}
