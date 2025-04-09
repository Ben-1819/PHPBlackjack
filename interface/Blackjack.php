<?php 
Namespace Actions;

interface Blackjack{
    public function getHand();

    public function getScore();
    public function hit();
    public function stand();
}
?>