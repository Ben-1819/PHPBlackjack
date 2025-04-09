<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;
use Dealer\Dealer;

describe("Makes sure the functions of the dealer namespace work correctly", function(){
    beforeEach(function(){
        $this->dealer = new Dealer(new Setup);
    });
    it("ensures the dealers deck starts off empty", function(){
        expect($this->dealer->get_cards())->toHaveCount(0);
    });
    it("ensures that the dealers score starts at 0", function(){
        expect($this->dealer->get_score())->toEqual(0);
    });
    it("ensures the dealer gets dealt two cards by the getHand method", function(){
        $this->dealer->getHand();
        expect($this->dealer->get_cards())->toHaveCount(2);
    });
    it("ensures the dealers score is calculated correctly when cards are dealt", function(){
        expect(correctScore($this->dealer->getHand(), $this->dealer->get_score()))->toBeTrue();
    });
    it("ensures that the dealer gets another card when they hit", function(){
        $this->dealer->getHand();
        $og = count($this->dealer->get_cards());
        $this->dealer->hit();
        expect(count($this->dealer->get_cards()))->toBeGreaterThan($og);
    });
    it("ensures the dealer gets the correct card when they choose to hit", function(){
        $this->dealer->getHand();
        $next = $this->dealer->get_deck();
        $this->dealer->hit();
        $cards = $this->dealer->get_cards();
        expect(end($cards))->toEqual(end($next));
    });
    it("ensures the dealers score gets updated when they choose to hit", function(){
        $this->dealer->set_cards("K of Hearts", "2 of Spades");
        $startScore = $this->dealer->get_score();
        $this->dealer->push_card("2 of Hearts");
        expect($this->dealer->get_score())->not->toEqual($startScore);
    });
    it("ensures the dealers score gets updated correctly based on the card they get whenever they choose to hit", function(){
        $this->dealer->set_cards("K of Hearts", "2 of Spades");
        $startScore = $this->dealer->get_score();
        $this->dealer->push_card("2 of Hearts");
        expect($this->dealer->get_score())->toEqual($startScore + 2);
    });
    it("ensures the dealerAces variable increases whenever the dealer gets an ace", function(){
        $this->dealer->set_cards("2 of Clubs", "2 of Diamonds");
        $startAces = $this->dealer->get_aces();
        $this->dealer->push_card("A of Diamonds");
        expect($this->dealer->get_aces())->toEqual($startAces + 1);
    });
    it("ensures that if the dealer has an ace and its value is changed to 1 the dealersAces value decreases", function(){
        $this->dealer->set_cards("2 of Clubs", "A of Diamonds");
        $startAces = $this->dealer->get_aces();
        $this->dealer->push_card("K of Hearts");
        expect($startAces)->toEqual($this->dealer->get_aces() + 1);
    });
    it("ensures that if the dealer goes bust and they have an ace its value changes from 11 to 1", function(){
        $this->dealer->set_cards("2 of Clubs", "A of Diamonds");
        $startScore = $this->dealer->get_score();
        $this->dealer->push_card("K of Hearts");
        expect($this->dealer->get_score())->toEqual(aceNoDecrease($startScore) - 10);
    });
    it("ensures that once the dealer gets to 17 they stand", function(){
        $this->dealer->set_cards("K of Hearts", "8 of Hearts");
        $this->dealer->get_score();
        $this->dealer->choice();
        expect($this->dealer->get_turn())->toBeFalse();
    });
})->group("dealerTests");
?>