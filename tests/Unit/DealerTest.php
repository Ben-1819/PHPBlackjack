<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;
use Dealer\Dealer;

describe("Makes sure the functions of the dealer namespace work correctly", function(){
    //beforeEach(function(){
    //    $this->setup = new Setup;
    //    $this->player = new Player($setup);
    //    $this->dealer = new Dealer($player->getdeck());
    //});
    it("ensures the dealers deck starts off empty", function(){

    });
    it("ensures the dealer gets dealt two cards by the getHand method", function(){

    });
    it("ensures the dealers score is calculated correctly when cards are dealt", function(){

    });
    it("ensures that the dealer gets another card when they hit", function(){

    });
    it("ensures the dealer gets the correct card when they choose to hit", function(){

    });
    it("ensures the dealers score gets updated when they choose to hit", function(){

    });
    it("ensures the dealers score gets updated correctly based on the card they get whenever they choose to hit", function(){

    });
    it("ensures the dealerAces variable increases whenever the dealer gets an ace", function(){

    });
    it("ensures that if the dealer has an ace and its value is changed to 1 the dealersAces value decreases", function(){

    });
    it("ensures that if the dealer goes bust and they have an ace its value changes from 11 to 1", function(){

    });
    it("ensures that once the dealer gets to 16 they stand", function(){

    });
});
?>