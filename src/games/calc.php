<?php

namespace BrainGames\Games\Calc;

use function BrainGames\GameEngine\game;

function run()
{
    game('calc', conditionMessage());
}

function getResult()
{
    $number1 = rand(1, 99);
    $number2 = rand(1, 99);
    $expressions = ['+', '-', '*'];
    $expression = $expressions[array_rand($expressions)];
    $question = "{$number1} {$expression} $number2";
    $answer = decision($expression, $number1, $number2);

    return [$question, $answer];
}

function decision($expression, $number1, $number2)
{
    switch ($expression) {
        case '+':
            return $number1 + $number2;
        case '-':
            return $number1 - $number2;
        case '*':
            return $number1 * $number2;
    }
}

function conditionMessage()
{
    return 'What is the result of the expression?';
}
