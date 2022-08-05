<?php

namespace Blackjack;

require_once('Deck.php');
require_once('Hand.php');

abstract class AbstractPlayers
{
    public const ADD_DRAW_NUM = 1;
    public Hand $hand;

    abstract public function drawCard(Deck $deck, int $drawNum): void;

    public function __construct(private string $name)
    {
        $this->hand = new Hand();
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addHand(Card $card): void
    {
        $this->hand->addHand($card);
    }

    /**
     * @return array<int, Card>
     */
    public function getHand(): array
    {
        return $this->hand->getHand();
    }

    public function calculateHandScore(): void
    {
        $this->hand->calculateHandScore();
    }

    public function getHandScore(): int
    {
        return $this->hand->getHandScore();
    }
}
