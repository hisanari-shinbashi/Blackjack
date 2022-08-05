<?php

namespace Blackjack\Tests;

use PHPUnit\Framework\TestCase;
use Blackjack\Card;

require_once(__DIR__ . '/../../lib/blackjack/Card.php');

class CardTest extends TestCase
{
    public function testGetSuit()
    {
        $card = new Card('クラブ', '5');
        $this->assertSame('クラブ', $card->getSuit());
    }

    public function testGetNumber()
    {
        $card = new Card('クラブ', 'Q');
        $this->assertSame('Q', $card->getNumber());
    }

    public function testGetRand()
    {
        $card = new Card('クラブ', 'Q');
        $this->assertSame(10, $card->getRank());
    }

    public function testGetRankA()
    {
        $card = new Card('クラブ', '5');
        $this->assertSame(11, $card->getRankA(10));
    }
}
