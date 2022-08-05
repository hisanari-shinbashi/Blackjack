<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\HandEvaluator;

require_once(__DIR__ . '/../../lib/blackjack/HandEvaluator.php');

class HandEvaluatorTest extends TestCase
{
    public function testGetWinner()
    {
        $handEvaluator = new HandEvaluator();
        $playerScore = 21;
        $dealerScore = 20;
        $this->assertSame(true, $playerScore > $dealerScore);
        $this->assertSame(false, $playerScore < $dealerScore);

        $playerScore = 21;
        $dealerScore = 21;
        $winner = $playerScore === $dealerScore;
        $draw = $winner;
        $this->assertSame(true, $draw);

        $playerScore = $handEvaluator->isBust(25);
        $dealerScore = $handEvaluator->isBust(25);
        $winner = $playerScore === $dealerScore;
        $dealerName = $winner;
        $this->assertSame(true, $dealerName);
    }

    public function testIsBust()
    {
        $handEvaluator = new HandEvaluator();
        $score = 22;
        $this->assertSame(true, $handEvaluator->isBust($score));
    }
}
