<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;

describe("Ensures that unwanted outcomes will not happen with the player classes methods.", function(){
    beforeEach(function (){
        $this->gameSetup = new Setup;
        $this->player = new Player($this->gameSetup);
    });
    it("expects the players deck to have card in it at the start", function(){
        $playersCards = $this->player->get_cards();
        expect(count($playersCards))->toBeGreaterThan(0);
    });
    it("expects the amount of cards the player has to stay the same whenever they choose to hit", function(){
        $playersCards = $this->player->getHand();
        $amountOfCards = count($playersCards);
        $playersCards = $this->player->hit();
        $playersCards = $this->player->get_cards();
        $amountAfterHit = count($playersCards);
        expect($amountAfterHit)->toEqual($amountOfCards);
    });
    it("expects the amount of cards the player has to decrease whenever the choose to hit", function(){
        $playersCards = $this->player->getHand();
        $amountOfCards = count($playersCards);
        $playersCards = $this->player->hit();
        $playersCards = $this->player->get_cards();
        $amountAfterHit = count($playersCards);
        expect($amountAfterHit)->toBeLessThan($amountOfCards);
    });
    it("expects playerAces to stay the same whenever they draw an ace", function(){
        $playersCards = $this->player->set_cards("2 of Hearts", "2 of Spades");
        $playersAces = $this->player->get_aces();
        $playersCards = $this->player->push_cards("A of Hearts");
        $newAces = $this->player->get_aces();
        expect($playersAces)->toEqual($newAces);
    });
    it("expects playerAces to stay the same whenever the players ace has a value of one", function(){
        $playersCards = $this->player->set_cards("9 of Clubs", "A of Hearts");
        $playersAces = $this->player->get_aces();
        $playersCards = $this->player->push_cards("K of Diamonds");
        $newAces = $this->player->get_aces();
        expect($playersAces)->toEqual($newAces);
    });
    it("expects playerAces to increase whenever the ace has a value of one", function(){
        $playersCards = $this->player->set_cards("9 of Clubs", "A of Hearts");
        $playersAces = $this->player->get_aces();
        $playersCards = $this->player->push_cards("K of Diamonds");
        $newAces = $this->player->get_aces();
        expect($playersAces)->toBeLessThan($newAces);
    });
    it("expects the value of a players ace to not change to one if the players score is greater than 21", function(){
        $playersCards = $this->player->set_cards("9 of Clubs", "A of Hearts");
        $playersCards = $this->player->push_card("K of Diamonds");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual(30);
    });
});
?>