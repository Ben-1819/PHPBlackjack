<?php 
Namespace Dealer;
use Game\BlackjackSetup as Setup;
use Actions\Blackjack as Black;
require __DIR__."/../vendor/autoload.php";

class Dealer implements Black{
    protected $dealersCards;
    protected $dealerScore;
    protected $dealerAces;
    protected $decksetup;
    protected $dealersTurn;

    public function __construct(Setup $decksetup){
        $this->dealersCards = [];
        $this->dealerScore = 0;
        $this->dealerAces = 0;
        $this->dealersTurn = true;
        $this->decksetup = $decksetup;
    }

    public function get_score(){
        $dealerInfo = self::getScore();
        $this->dealerScore = $dealerInfo[0];
        return $this->dealerScore;
    }
    public function get_aces(){
        $dealerInfo = self::getScore();
        $this->dealerAces = $dealerInfo[1];
        return $this->dealerAces;
    }

    public function get_cards(){
        return $this->dealersCards;
    }
    public function getHand(){
        // Retrieve the deck
        $this->decksetup->get_deck();

        // Deal starting cards to the dealer
        $this->dealersCards = [$this->decksetup->deal_card(), $this->decksetup->deal_card()];

        // Calculate the dealers score
        self::get_score();

        print_r($this->dealersCards);
        // Return the dealers hand
        return $this->dealersCards;
    }
    public function getScore(){
        // Set dealers score and aces to zero
        $this->dealerScore = 0;
        $this->dealerAces = 0;
        // Loop through the dealers hand to get their score
        foreach($this->dealersCards as $card){
            // Explode the card to get the rank
            $rank = explode(" ", $card)[0];
            // Use a switch statement to check how much score the dealer should get
            switch($rank){
                // If the card is an ace
                case "A":
                    // Add 11 to the dealers score
                    $this->dealerScore += 11;
                    // Add 1 to dealerAces
                    $this->dealerAces++;
                // Check if the card is a face card
                case in_array($rank, ["K", "Q", "J"]):
                    // Add 10 to the dealers score
                    $this->dealerScore += 10;
                // If the card is a normal card
                default:
                    // Add the rank of the card to the dealers score
                    $this->dealerScore += (int)$rank;
            }
        }
        // Check if dealers score is greater than 21 and if they have aces
        while($this->dealerScore > 21 && $this->dealerAces > 0){
            // If both conditions are true remove 10 from dealers score
            $this->dealerScore -= 10;
            // And remove one from dealerAces
            $this->dealerAces--;
        }
        return [$this->dealerScore, $this->dealerAces];
    }
    public function hit(){
        // Give another card to the dealer
        array_push($this->dealersCards, $this->decksetup->deal_card());
        // Recalculate the dealers score
        $this->dealerScore = self::get_score();
        print "Dealer got: ".end($this->dealersCards).", their score is $this->dealerScore
        ";
        // Return dealers cards and score
        return [$this->dealersCards, $this->dealerScore];
    }
    public function stand(){
        print "dealer has chosen to stand
        ";
        return $this->dealersTurn = false;
    }

    public function bust(){
        print "Dealer has gone bust!
        ";
        return $this->dealersTurn = false;
    }
    public function choice(){
        if($this->dealerScore < 17){
            self::hit();
        }
        elseif($this->dealerScore > 21){
            self::bust();
        }
        else{
            self::stand();
        }
    }

    public function dealerTurn(){
        while($this->dealersTurn != false){
            self::choice();
        }
    }
}

$dealerTest = new Dealer(new Setup);
$dealerTest->getHand();
$dealerTest->dealerTurn();
?>