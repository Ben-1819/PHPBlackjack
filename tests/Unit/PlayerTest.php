<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;

describe("Makes sure the functions from the player namespace work correctly", function(){
    it("ensures that the players deck starts off empty", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $cards = $player->get_cards();
        expect($cards)->toHaveCount(0);
    });
    it("ensures that the players score starts as 0", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $score = $player->get_score();
        expect($score)->toBe(0);
    });
    it("ensures that the player gets dealt two cards by the gethand method", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->getHand();
        expect($playersCards)->tohaveCount(2);
    });
    it("ensures that the players score is calculated correctly whenever they are dealt cards", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->getHand();
        $playerScore = $player->get_score();
        expect(correctScore($playersCards, $playerScore))->toBeTrue();
    });
    it("ensures that the player gets another card whenever they choose to hit", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->getHand();
        $initialCount = count($playersCards);
        $playerStats = $player->hit();
        $playersCards = $playerStats[0];
        expect(count($playersCards))->toBeGreaterThan($initialCount);
    });
    it("ensures that the player gets the correct card whenever they choose to hit", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->getHand();
        $deck = $player->get_deck();
        $cardToGet = end($deck);
        $playerStats = $player->hit();
        $playersCards = $playerStats[0];
        expect(end($playersCards))->toEqual($cardToGet);
    });
    it("ensures that the players score gets updated whenever they choose to hit", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->getHand();
        $playersInitalScore = $player->getScore();
        $playerStats = $player->hit();
        $newScore = $playerStats[1];
        expect($playersInitalScore)->not->toEqual($newScore);
    });
    it("ensures that the players score is updated based off the card they get whenever they hit", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->get_cards();
        $playersCards = setCards($playersCards, "4 of Hearts", "4 of Spades");
        $playersCards = $player->get_cards();
        $playersInitalScore = $player->get_score();
        $playersCards = $player->push_card("5 of Clubs");
        $playersCards = $player->get_cards();
        $playerScore = $player->get_score();
        $difference = $playerScore - $playersInitalScore;
        $change = correctIncrease($playersCards, $playerScore, $player->get_aces());
        expect($difference)->toEqual(5);
    });
    it("expects the value of playerAces to increase if the player has an ace in their deck whenever score is calculated", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->set_cards("2 of Hearts", "2 of Diamonds");
        $playerScore = $player->get_score();
        $playerInitalAces = $player->get_aces();
        $playersCards = $player->push_card("A of Spades");
        $playerAces = $player->get_aces();
        expect($playerAces)->toBeGreaterThan($playerInitalAces);
    });
    it("expects playerAces to decrease if the players ace turns into a 1", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->set_cards("2 of Hearts", "A of Hearts");
        $playerScore = $player->get_score();
        $playerInitialAces = $player->get_aces();
        $playersCards = $player->push_card("K of Hearts");
        $playerScore = $player->get_score();
        $playerAces = $player->get_aces();
        expect($playerInitialAces)->toBeGreaterThan($playerAces);
    });
    it("expects a players score to reduce by 10 of the player has an ace and their score goes over 21", function(){
        $gameSetup = new Setup;
        $player = new Player($gameSetup);
        $playersCards = $player->set_cards("2 of Hearts", "King of Hearts");
        $playerScore = $player->get_score();
        $playersCards = $player->push_card("Ace of Hearts");
        $actualScore = $player->get_score();
        $wrongScore = aceNoDecrease($playerScore);
        expect($actualScore)->toEqual($wrongScore - 10);
    });
});
?>