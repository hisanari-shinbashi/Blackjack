<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\Dealer;
use Blackjack\Card;

require_once(__DIR__ . '/../../lib/blackjack/Dealer.php');

class DealerTest extends TestCase
{
    public function testGetName()
    {
        $dealer = new Dealer('ディーラー');
        $name = $dealer->getName();
        $this->assertSame('ディーラー', $name);
    }

    public function testGetHand()
    {
        $dealer = new Dealer('ディーラー');
        $card = new Card('クラブ', '5');
        $dealer->addHand($card);
        $this->assertSame([$card], $dealer->getHand());
    }

    public function testGetHandScore()
    {
        $dealer = new Dealer('ディーラー');
        $dealer->addHand(new Card('クラブ', 'J'));
        $dealer->addHand(new Card('スペード', 'A'));
        $dealer->calculateHandScore();
        $this->assertSame(21, $dealer->getHandScore());
    }

    public function testSelectAnswer()
    {
        $dealer = new Dealer('ディーラー');
        $dealer->addHand(new Card('クラブ', 'Q'));
        $dealer->addHand(new Card('クラブ', '6'));
        $dealer->calculateHandScore();
        $this->assertSame('y', $dealer->selectAnswer());
    }
}
