<?php 
use Game\BlackjackSetup as Setup;
use Player\Player;
describe("Ensures that the cards belonging to the Clubs suit give the player the correct amount of score", function(){
    beforeEach(function(){
        $this->player = new Player(new Setup);
    });
    it("ensures that 2 of Clubs adds 2 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Hearts");
        $originalScore = $this->player->get_score();
        $this->player->push_card("2 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 2);
    });
    it("ensures that 3 of Clubs adds 3 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("3 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 3);
    });
    it("ensures that 4 of Clubs adds 4 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("4 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 4);
    });
    it("ensures that 5 of Clubs adds 5 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("5 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 5);
    });
    it("ensures that 6 of Clubs adds 6 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("6 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 6);
    });
    it("ensures that 7 of Clubs adds 7 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("7 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 7);
    });
    it("ensures that 8 of Clubs adds 8 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("8 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 8);
    });
    it("ensures that 9 of Clubs adds 9 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("9 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 9);
    });
    it("ensures that 10 of Clubs adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("10 of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that J of Clubs adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("J of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that Q of Clubs adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("Q of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that K of Clubs adds 10 to the players score", function(){
        $this->player->set_cards("2 of Spades", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $this->player->push_card("K of Clubs");
        $playerScore = $this->player->get_score();
        expect($playerScore)->toEqual($originalScore + 10);
    });
    it("ensures that A of Clubs adds 11 to the players score if they have 10 or less and that playerAces increases by 1", function(){
        $this->player->set_cards("2 of Hearts", "2 of Clubs");
        $playerStartAces = $this->player->get_aces();
        $originalScore = $this->player->get_score();
        $this->player->push_card("A of Clubs");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore + 11)
        ->and($playerAces)->toEqual($playerStartAces + 1);
    });
    it("ensures that A of Clubs adds 1 to the players score if they have 11 or more and that playerAces does not change", function(){
        $this->player->set_cards("9 of Hearts", "2 of Clubs");
        $originalScore = $this->player->get_score();
        $playerStartAces = $this->player->get_aces();
        $this->player->push_card("A of Clubs");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore + 1)
        ->and($playerAces)->toEqual($playerStartAces);
    });
    it("ensures that A of Clubs changes its value from 11 to 1 if the player takes a card and their score goes above 21 and that playerAces decreases", function(){
        $this->player->set_cards("9 of Hearts", "A of Clubs");
        $playerStartAces = $this->player->get_aces();
        $originalScore = $this->player->get_score();
        $this->player->push_card("2 of Hearts");
        $playerScore = $this->player->get_score();
        $playerAces = $this->player->get_aces();
        expect($playerScore)->toEqual($originalScore - 8)
        ->and($playerAces)->toEqual($playerStartAces - 1);
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