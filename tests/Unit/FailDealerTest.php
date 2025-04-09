<?php 
use Game\BlackjackSetup as S;
use Dealer\Dealer as D;

describe("Ensures that unwanted outcomes will not happen with the dealer classes methods", function(){
    beforeEach(function(){
        $this->dealer = new D(new S);
    });
    it("ensures the dealers deck starts off with cards in it", function(){
        expect(count($this->dealer->get_cards))->not->toEqual(0);
    });
    it("ensures the dealer does not get cards from the getHand method", function(){
        $this->dealer->getHand();
        expect(count($this->dealer->get_cards))->not->toEqual(2);
    });
    it("ensures that the dealers score does not increase whenever they choose to hit", function(){
        $this->dealer->getHand();
        $startScore = $this->dealer->get->score();
        $this->dealer->hit();
        expect($this->dealer->get_score())->toEqual($startScore);
    });
    it("ensures that the dealers score does not go above 21", function(){
        $this->dealer->set_cards("K of Hearts", "Q of Hearts");
        $this->dealer->push_card("K of Spades");
        expect($this->dealer->get_score())->toBeLessThanOrEqual(21);
    });
    it("ensures that the dealerAces does not increase when the dealer gets an ace", function(){
        $this->dealer->set_cards("2 of Spades", "2 of Hearts");
        $startAces = $this->dealer->get_aces();
        $this->dealer->push_card("A of Hearts");
        expect($this->dealer->get_aces())->toEqual($startAces);
    });
    it("ensures that if the dealers has an ace and their score is above 21 the value of the ace does not change", function(){

    });
    it("ensures that whenever the value of a dealers ace changes to one it increases dealerAces", function(){

    });
    it("ensures that whenever the value of a dealers ace changes to 1 dealerAces stays the same", function(){

    });
})->group("failDealerTests");
?>