<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\Hand;
use Blackjack\Card;

require_once(__DIR__ . '/../../lib/blackjack/Hand.php');

class HandTest extends TestCase
{
    public function testGetHand()
    {
        $hand = new Hand();
        $card = new Card('クラブ', '5');
        $hand->addHand($card);
        $this->assertSame([$card], $hand->getHand());
    }

    public function testGetHandScore()
    {
        $hand = new Hand();
        $hand->addHand(new Card('クラブ', 'J'));
        $hand->addHand(new Card('スペード', 'A'));
        $hand->calculateHandScore();
        $this->assertSame(21, $hand->getHandScore());
    }
}
