<?php

namespace Blackjack;

class HandEvaluator
{
    private const BUST_SCORE = 22;

    public function getWinner(Player $player, Dealer $dealer): string
    {
        $playerName = $player->getName();
        $dealerName = $dealer->getName();
        $playerScore = $player->getHandScore();
        $dealerScore = $dealer->getHandScore();

        echo '---------------------' . PHP_EOL;
        echo $playerName . 'の得点は' . $playerScore . 'です。' . PHP_EOL;
        echo $dealerName . 'の得点は' . $dealerScore . 'です。' . PHP_EOL;

        $winner = 'draw';

        if ($this->isBust($playerScore) && $this->isBust($dealerScore)) {
            $winner = $dealerName;
        } elseif ($this->isBust($dealerScore)) {
            $winner = $playerName;
        } elseif ($this->isBust($playerScore)) {
            $winner = $dealerName;
        } elseif ($playerScore > $dealerScore) {
            $winner = $playerName;
        } elseif ($playerScore < $dealerScore) {
            $winner = $dealerName;
        } elseif ($playerScore === $dealerScore) {
            $winner = 'draw';
        }
        return $winner;
    }

    public function isBust(int $score): bool
    {
        return $score >= self::BUST_SCORE;
    }

    public function decideWinner(string $winner): void
    {
        if ($winner === 'draw') {
            echo '引き分けです。' . PHP_EOL;
        } else {
            echo $winner . 'の勝ちです！' . PHP_EOL;
        }
    }
}
