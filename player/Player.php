<?php
namespace Player;
use Game\BlackjackSetup as Setup;
use Actions\Blackjack as Black;
//require __DIR__."/../vendor/autoload.php";
class Player implements Black{
    protected $playersCards;
    protected $playerScore;
    protected $playerAces;
    protected $decksetup;
    protected $playersTurn;
    public function __construct(Setup $decksetup){
        $this->playersCards = [];
        $this->playerScore = 0;
        $this->playerAces = 0;
        $this->playersTurn = true;
        $this->decksetup = $decksetup;
    }
    public function getdeck(){
        return $this->decksetup;
    }

    public function get_deck(){
        return $this->decksetup->get_deck();
    }
    public function set_cards($card1, $card2){
        $this->playersCards = [$card1, $card2];
        return $this->playersCards;
    }

    public function push_card($card){
        array_push($this->playersCards, $card);
        return $this->playersCards;
    }

    public function get_cards(){
        return $this->playersCards;
    }

    public function get_score(){
        $scoreAndAces = self::getScore();
        $this->playerScore = $scoreAndAces[0];
        return $this->playerScore;
    }

    public function get_aces(){
        $scoreAndAces = self::getScore();
        $this->playerAces = $scoreAndAces[1];
        return $this->playerAces;
    }

    public function getHand(){
        

        // Call the get_deck method
        $deck = $this->decksetup->get_deck();

        // Deal two cards to the player
        $this->playersCards = [$this->decksetup->deal_card(), $this->decksetup->deal_card()];
        // Sort players cards in order from lowest to highest

        print_r($this->playersCards);
        $this->playerScore = self::get_score();
        return $this->playersCards;
    }

    public function getScore(){
        $this->playerScore = 0;
        $this->playerAces = 0;
        // Loop through the players hand
        foreach($this->playersCards as $card){
            // Use explode to get the rank of the card
            $rank = explode(" ", $card)[0];
            // Check if card is ace
            switch($rank){
                // Write logic for if the card is an ace
                case "A":
                    // Add 11 to the players score
                    $this->playerScore += 11;
                    // Add 1 to the players aces
                    $this->playerAces++;
                    // Break out of the switch
                    break;
                // Write logic for if the card is a face card
                case in_array($rank, ["K", "Q", "J"]):
                    // Add 10 to the players score
                    $this->playerScore += 10;
                    // Break out of the switch
                    break;
                // Write logic for if the card is a normal card
                default:
                    $this->playerScore += (int)$rank;
            }
        }
        // If score is too high and they have aces reduce score
        while($this->playerScore > 21 && $this->playerAces){
            $this->playerScore -= 10;
            $this->playerAces--;
        }
        //print $this->playerScore."
        //";
        return [$this->playerScore, $this->playerAces];
    }

    public function hit(){
        // Deal another card to the player
        array_push($this->playersCards, $this->decksetup->deal_card());
        // Recalculate the players score
        $this->playerScore = self::get_score();
        //print_r($this->playersCards);
        //print $this->playerScore."
        //";
        //$this->playerScore > 21 ? self::stand() : self::choice();
        return [$this->playersCards, $this->playerScore];
    }

    public function stand(){
        //print("You have chosen to stand.");
        //print_r($this->playersCards);
        $deck = $this->decksetup->get_deck();
        return $deck;
    }

    public function choice(){
        $choice = readline("Your cards are: ". implode(", ", $this->playersCards) ." and your score is: ".$this->playerScore. " do you want to hit or stand? ");
        switch(strtolower($choice)){
            case "hit":
                return $choice;
                //self::hit();
                //break;
            case "stand":
                return $choice;
                //self::stand();
                //break;
            default:
                print "Please only enter hit or stand.
                ";
                self::choice();
        }
    }
    public function playerTurn(){
        self::getHand();
        $choice = self::choice();
    }
}
// Instantiate the Blackjack Setup class
//$decksetup = new Setup();
$newPlayer = new Player(new Setup);
$newPlayer->getHand();
print_r($newPlayer->getdeck());
?>