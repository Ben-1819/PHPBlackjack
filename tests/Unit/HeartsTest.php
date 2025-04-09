<?php 

describe("Ensures that the cards belonging to the Hearts suit give the player the correct amount of score", function(){
    it("ensures that 2 of Hearts adds 2 to the players score", function(){

    });
    it("ensures that 3 of Hearts adds 3 to the players score", function(){

    });
    it("ensures that 4 of Hearts adds 4 to the players score", function(){

    });
    it("ensures that 5 of Hearts adds 5 to the players score", function(){

    });
    it("ensures that 6 of Hearts adds 6 to the players score", function(){

    });
    it("ensures that 7 of Hearts adds 7 to the players score", function(){

    });
    it("ensures that 8 of Hearts adds 8 to the players score", function(){

    });
    it("ensures that 9 of Hearts adds 9 to the players score", function(){

    });
    it("ensures that 10 of Hearts adds 10 to the players score", function(){

    });
    it("ensures that J of Hearts adds 10 to the players score", function(){

    });
    it("ensures that Q of Hearts adds 10 to the players score", function(){

    });
    it("ensures that K of Hearts adds 10 to the players score", function(){

    });
    it("ensures that A of Hearts adds 11 to the players score if they have 10 or less and that playerAces increases by 1", function(){

    });
    it("ensures that A of Hearts adds 1 to the players score if they have 11 or more and that playerAces does not change", function(){

    });
    it("ensures that A of Hearts changes its value from 11 to 1 if the player takes a card and their score goes above 21 and that playerAces decreases", function(){

    });
})->group("playerHearts");

describe("Ensures that the cards belonging to the Hearts suit give the dealer the correct amount of score", function(){
    it("ensures that 2 of Hearts adds 2 to the dealers score", function(){

    });
    it("ensures that 3 of Hearts adds 3 to the dealers score", function(){

    });
    it("ensures that 4 of Hearts adds 4 to the dealers score", function(){

    });
    it("ensures that 5 of Hearts adds 5 to the dealers score", function(){

    });
    it("ensures that 6 of Hearts adds 6 to the dealers score", function(){

    });
    it("ensures that 7 of Hearts adds 7 to the dealers score", function(){

    });
    it("ensures that 8 of Hearts adds 8 to the dealers score", function(){

    });
    it("ensures that 9 of Hearts adds 9 to the dealers score", function(){

    });
    it("ensures that 10 of Hearts adds 10 to the dealers score", function(){

    });
    it("ensures that J of Hearts adds 10 to the dealers score", function(){

    });
    it("ensures that Q of Hearts adds 10 to the dealers score", function(){

    });
    it("ensures that K of Hearts adds 10 to the dealers score", function(){

    });
    it("ensures that A of Hearts adds 11 to the dealers score if they have 10 or less and that dealerAces increases by 1", function(){

    });
    it("ensures that A of Hearts adds 1 to the dealers score if they have 11 or more and that dealerAces does not change", function(){

    });
    it("ensures that A of Hearts changes its value from 11 to 1 if the dealer takes a card and their score goes above 21 and that dealerAces decreases", function(){

    });
})->group("dealerHearts");
?>