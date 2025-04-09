<?php 

describe("Ensures that the cards belonging to the Diamonds suit give the player the correct amount of score", function(){
    it("ensures that 2 of Diamonds adds 2 to the players score", function(){

    });
    it("ensures that 3 of Diamonds adds 3 to the players score", function(){

    });
    it("ensures that 4 of Diamonds adds 4 to the players score", function(){

    });
    it("ensures that 5 of Diamonds adds 5 to the players score", function(){

    });
    it("ensures that 6 of Diamonds adds 6 to the players score", function(){

    });
    it("ensures that 7 of Diamonds adds 7 to the players score", function(){

    });
    it("ensures that 8 of Diamonds adds 8 to the players score", function(){

    });
    it("ensures that 9 of Diamonds adds 9 to the players score", function(){

    });
    it("ensures that 10 of Diamonds adds 10 to the players score", function(){

    });
    it("ensures that J of Diamonds adds 10 to the players score", function(){

    });
    it("ensures that Q of Diamonds adds 10 to the players score", function(){

    });
    it("ensures that K of Diamonds adds 10 to the players score", function(){

    });
    it("ensures that A of Diamonds adds 11 to the players score if they have 10 or less and that playerAces increases by 1", function(){

    });
    it("ensures that A of Diamonds adds 1 to the players score if they have 11 or more and that playerAces does not change", function(){

    });
    it("ensures that A of Diamonds changes its value from 11 to 1 if the player takes a card and their score goes above 21 and that playerAces decreases", function(){

    });
})->group("playerDiamonds");

describe("Ensures that the cards belonging to the Diamonds suit give the dealer the correct amount of score", function(){
    it("ensures that 2 of Diamonds adds 2 to the dealers score", function(){

    });
    it("ensures that 3 of Diamonds adds 3 to the dealers score", function(){

    });
    it("ensures that 4 of Diamonds adds 4 to the dealers score", function(){

    });
    it("ensures that 5 of Diamonds adds 5 to the dealers score", function(){

    });
    it("ensures that 6 of Diamonds adds 6 to the dealers score", function(){

    });
    it("ensures that 7 of Diamonds adds 7 to the dealers score", function(){

    });
    it("ensures that 8 of Diamonds adds 8 to the dealers score", function(){

    });
    it("ensures that 9 of Diamonds adds 9 to the dealers score", function(){

    });
    it("ensures that 10 of Diamonds adds 10 to the dealers score", function(){

    });
    it("ensures that J of Diamonds adds 10 to the dealers score", function(){

    });
    it("ensures that Q of Diamonds adds 10 to the dealers score", function(){

    });
    it("ensures that K of Diamonds adds 10 to the dealers score", function(){

    });
    it("ensures that A of Diamonds adds 11 to the dealers score if they have 10 or less and that dealerAces increases by 1", function(){

    });
    it("ensures that A of Diamonds adds 1 to the dealers score if they have 11 or more and that dealerAces does not change", function(){

    });
    it("ensures that A of Diamonds changes its value from 11 to 1 if the dealer takes a card and their score goes above 21 and that dealerAces decreases", function(){

    });
})->group("dealerDiamonds");
?>