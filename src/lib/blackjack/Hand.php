<?php

namespace Blackjack;

class Hand
{
    /**
     * @var array<int, Card>
     */
    private array $hand = [];
    private int $handScore = 0;

    public function addHand(Card $card): void
    {
        $this->hand[] = $card;
    }

    /**
     * @return array<int, Card>
     */
    public function getHand(): array
    {
        return $this->hand;
    }

    public function calculateHandScore(): void
    {
        $this->handScore = 0;
        foreach ($this->hand as $card) {
            if ($card->getNumber() === 'A') {
                $this->handScore += $card->getRankA($this->handScore);
            } else {
                $this->handScore += $card->getRank();
            }
        }
    }

    public function getHandScore(): int
    {
        return $this->handScore;
    }
}
