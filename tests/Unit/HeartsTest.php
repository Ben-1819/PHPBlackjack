<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;
use Dealer\Dealer;
describe("Ensures that the cards belonging to the Hearts suit give the player the correct amount of score", function(){
    beforeEach(function(){
        $this->player = new Player(new Setup);
    });
    it("ensures that 2 of Hearts adds 2 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("2 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 2);
    });
    it("ensures that 3 of Hearts adds 3 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("3 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 3);
    });
    it("ensures that 4 of Hearts adds 4 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("4 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 4);
    });
    it("ensures that 5 of Hearts adds 5 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("5 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 5);
    });
    it("ensures that 6 of Hearts adds 6 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("6 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 6);
    });
    it("ensures that 7 of Hearts adds 7 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("7 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 7);
    });
    it("ensures that 8 of Hearts adds 8 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("8 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 8);
    });
    it("ensures that 9 of Hearts adds 9 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("9 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 9);
    });
    it("ensures that 10 of Hearts adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("10 of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that J of Hearts adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("J of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that Q of Hearts adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("Q of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that K of Hearts adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("K of Hearts");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that A of Hearts adds 11 to the players score if they have 10 or less and that playerAces increases by 1", function(){
        $this->player->set_cards("2 of Hearts", "2 of Clubs");
        $playerStartAces = $this->player->get_aces();
        $originalScore = $this->player->get_score();
        $this->player->push_card("A of Hearts");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore + 11)
        ->and($playerAces)->toEqual($playerStartAces + 1);
    });
    it("ensures that A of Hearts adds 1 to the players score if they have 11 or more and that playerAces does not change", function(){
        $this->player->set_cards("9 of Hearts", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $playerStartAces = $this->player->get_aces();
        $this->player->push_card("A of Hearts");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore + 1)
        ->and($playerAces)->toEqual($playerStartAces);
    });
    it("ensures that A of Hearts changes its value from 11 to 1 if the player takes a card and their score goes above 21 and that playerAces decreases", function(){
        $this->player->set_cards("9 of Hearts", "A of Hearts");
        $playerStartAces = $this->player->get_aces();
        $originalScore = $this->player->get_score();
        $this->player->push_card("2 of Hearts");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore - 8)
        ->and($playerAces)->toEqual($playerStartAces - 1);
    });
})->group("playerHearts");

describe("Ensures that the cards belonging to the Hearts suit give the dealer the correct amount of score", function(){
    beforeEach(function(){
        $this->dealer = new Dealer(new Setup);
    });
    it("ensures that 2 of Hearts adds 2 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("2 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 2);
    });
    it("ensures that 3 of Hearts adds 3 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("3 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 3);
    });
    it("ensures that 4 of Hearts adds 4 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("4 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 4);
    });
    it("ensures that 5 of Hearts adds 5 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("5 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 5);
    });
    it("ensures that 6 of Hearts adds 6 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("6 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 6);
    });
    it("ensures that 7 of Hearts adds 7 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("7 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 7);
    });
    it("ensures that 8 of Hearts adds 8 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("8 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 8);
    });
    it("ensures that 9 of Hearts adds 9 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("9 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 9);
    });
    it("ensures that 10 of Hearts adds 10 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("10 of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 10);
    });
    it("ensures that J of Hearts adds 10 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("J of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 10);
    });
    it("ensures that Q of Hearts adds 10 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("Q of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 10);
    });
    it("ensures that K of Hearts adds 10 to the dealers score", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("K of Hearts");
        expect($this->dealer->get_score())->toEqual($originalScore + 10);
    });
    it("ensures that A of Hearts adds 11 to the dealers score if they have 10 or less and that dealerAces increases by 1", function(){
        $this->dealer->set_cards("2 of Hearts", "2 of Clubs");
        $dealerStartAces = $this->dealer->get_aces();
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("A of Hearts");
        $dealerScore = $this->dealer->get_score();
        $dealerAces = $this->dealer->get_aces();
        expect($dealerScore)->toEqual($originalScore + 11)
        ->and($dealerAces)->toEqual($dealerStartAces + 1);
    });
    it("ensures that A of Hearts adds 1 to the dealers score if they have 11 or more and that dealerAces does not change", function(){
        $this->dealer->set_cards("9 of Hearts", "2 of Clubs");
        $originalScore = $this->dealer->get_score();
        $dealerStartAces = $this->dealer->get_aces();
        $this->dealer->push_card("A of Hearts");
        $dealerScore = $this->dealer->get_score();
        $dealerAces = $this->dealer->get_aces();
        expect($dealerScore)->toEqual($originalScore + 1)
        ->and($dealerAces)->toEqual($dealerStartAces);
    });
    it("ensures that A of Hearts changes its value from 11 to 1 if the dealer takes a card and their score goes above 21 and that dealerAces decreases", function(){
        $this->dealer->set_cards("5 of Hearts", "A of Hearts");
        $dealerStartAces = $this->dealer->get_aces();
        $originalScore = $this->dealer->get_score();
        $this->dealer->push_card("9 of Hearts");
        $dealerScore = $this->dealer->get_score();
        $dealerAces = $this->dealer->get_aces();
        expect($dealerScore)->toEqual($originalScore - 1)
        ->and($dealerAces)->toEqual($dealerStartAces - 1);
    });
})->group("dealerHearts");
?>