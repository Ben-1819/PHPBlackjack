<?php 

describe("Ensures that the cards belonging to the Clubs suit give the player the correct amount of score", function(){
    it("ensures that 2 of Clubs adds 2 to the players score", function(){

    });
    it("ensures that 3 of Clubs adds 3 to the players score", function(){

    });
    it("ensures that 4 of Clubs adds 4 to the players score", function(){

    });
    it("ensures that 5 of Clubs adds 5 to the players score", function(){

    });
    it("ensures that 6 of Clubs adds 6 to the players score", function(){

    });
    it("ensures that 7 of Clubs adds 7 to the players score", function(){

    });
    it("ensures that 8 of Clubs adds 8 to the players score", function(){

    });
    it("ensures that 9 of Clubs adds 9 to the players score", function(){

    });
    it("ensures that 10 of Clubs adds 10 to the players score", function(){

    });
    it("ensures that J of Clubs adds 10 to the players score", function(){

    });
    it("ensures that Q of Clubs adds 10 to the players score", function(){

    });
    it("ensures that K of Clubs adds 10 to the players score", function(){

    });
    it("ensures that A of Clubs adds 11 to the players score if they have 10 or less and that playerAces increases by 1", function(){

    });
    it("ensures that A of Clubs adds 1 to the players score if they have 11 or more and that playerAces does not change", function(){

    });
    it("ensures that A of Clubs changes its value from 11 to 1 if the player takes a card and their score goes above 21 and that playerAces decreases", function(){

    });
})->group("playerClubs");

describe("Ensures that the cards belonging to the Clubs suit give the dealer the correct amount of score", function(){
    it("ensures that 2 of Clubs adds 2 to the dealers score", function(){

    });
    it("ensures that 3 of Clubs adds 3 to the dealers score", function(){

    });
    it("ensures that 4 of Clubs adds 4 to the dealers score", function(){

    });
    it("ensures that 5 of Clubs adds 5 to the dealers score", function(){

    });
    it("ensures that 6 of Clubs adds 6 to the dealers score", function(){

    });
    it("ensures that 7 of Clubs adds 7 to the dealers score", function(){

    });
    it("ensures that 8 of Clubs adds 8 to the dealers score", function(){

    });
    it("ensures that 9 of Clubs adds 9 to the dealers score", function(){

    });
    it("ensures that 10 of Clubs adds 10 to the dealers score", function(){

    });
    it("ensures that J of Clubs adds 10 to the dealers score", function(){

    });
    it("ensures that Q of Clubs adds 10 to the dealers score", function(){

    });
    it("ensures that K of Clubs adds 10 to the dealers score", function(){

    });
    it("ensures that A of Clubs adds 11 to the dealers score if they have 10 or less and that dealerAces increases by 1", function(){

    });
    it("ensures that A of Clubs adds 1 to the dealers score if they have 11 or more and that dealerAces does not change", function(){

    });
    it("ensures that A of Clubs changes its value from 11 to 1 if the dealer takes a card and their score goes above 21 and that dealerAces decreases", function(){

    });
})->group("dealerClubs");
?>