<?php 
Namespace Play;
use Game\BlackjackSetup as Setup;
use Player\Player;
use Dealer\Dealer;
require __DIR__."/../vendor/autoload.php";
class Play{
    protected $winner;
    protected $player;
    protected $dealer;
    protected $setup;
    public function __construct(Setup $setup, Player $player, Dealer $dealer){
        $this->setup = $setup;
        $this->player = $player;
        $this->dealer = $dealer;
        $this->winner = "";
    }

    public function get_winner(){
        $playerScore = $this->player->get_score();
        $dealerScore = $this->dealer->get_score();
        if($playerScore >= 22 && $dealerScore >= 22){
            $this->winner = "Dealer";
        }elseif($playerScore >= 22){
            $this->winner = "Dealer";
        }elseif($dealerScore >= 22){
            $this->winner = "Player";
        }elseif($playerScore > $dealerScore){
            $this->winner = "Player";
        }elseif($playerScore == $dealerScore){
            $this->winner = "Dealer";
        }elseif($playerScore < $dealerScore){
            $this->winner = "Dealer";
        }
        return $this->winner;
    }
    public function dealerWins(){
        $this->winner = "Dealer";
        return $this->winner;
    }

    public function playerWins(){
        $this->winner = "Player";
        return $this->winner;
    }

    public function playGame(){
        $this->player->getHand();
        $this->dealer->getHand();
        $this->player->playerTurn();
        $this->dealer->dealerTurn();
        self::decideWinner();
    }

    public function decideWinner(){
        $playerScore = $this->player->get_score();
        $dealerScore = $this->dealer->get_score();
        $playersCards = implode(", ", $this->player->get_cards());
        $dealersCards = implode(", ", $this->dealer->get_cards());
        print "Players cards: ".$playersCards."
        ";
        print "Dealers cards: ".$dealersCards."
        ";
        print "Player score: " .$playerScore ."
        ";
        print "Dealer score: " .$dealerScore ."
        ";
        if($playerScore >= 22 && $dealerScore >= 22){
            $this->winner = self::dealerWins();
            print "Player and dealer are both bust, ".$this->winner." wins
            ";
        }elseif($playerScore >= 22){
            $this->winner = self::dealerWins();
            print "Player is bust, " .$this->winner." wins
            ";
        }elseif($dealerScore >= 22){
            $this->winner = self::playerWins();
            print "Dealer is bust, " .$this->winner." wins
            ";
        }elseif($playerScore > $dealerScore){
            $this->winner = self::playerWins();
            print "Player score higher than the dealer, ".$this->winner." wins
            ";
        }elseif($playerScore == $dealerScore){
            $this->winner = self::dealerWins();
            print "Player and dealer drew, " .$this->winner. " wins
            ";
        }elseif($playerScore < $dealerScore){
            $this->winner = self::dealerWins();
            print "Dealer scored higher than player, ".$this->winner." wins
            ";
        }
    }
}

$setup = new Setup;
$player = new Player($setup);
$dealer = new Dealer($setup);
$play = new Play($setup, $player, $dealer);
$play->playGame();
?>