<?php 
namespace Game;
use Monolog\Level;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
class BlackjackSetup{
    public $log;
    protected $deck;
    
    protected $gameOver;

    public function __construct(){
        $this->deck = $this->deckCreate();
    }

    public function get_deck(){
        return $this->deck;
    }

    public function deal_card(){
        // Use array pop to return the last element from the shuffled array
        return array_pop($this->deck);
    }
    protected function deckCreate(){
        // Create array to hold the suits
        $suits = ["Hearts", "Diamonds", "Clubs", "Spades"];
        // Create array to hold cards
        $values = ["2", "3", "4", "5", "6", "7", "8", "9", "10", "J", "Q", "K", "A"];
        // Create array to hold the deck
        $deck = [];

        // Loop through the suits array
        foreach($suits as $suit){
            // Loop through the values array
            foreach($values as $value){
                // Add the current rank and suit to the deck array to make a full deck
                $deck[] = "$value of $suit";
            }
        }

        // Shuffle the deck
        shuffle($deck);
        // Return the deck
        return $deck;
    }
}
?>