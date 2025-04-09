<?php
use Game\BlackjackSetup as Setup;
use Pest\ArchPresets\Security;
describe("Makes sure the functions from the Game namespace are working correctly", function(){
    it("ensures that the deck variable is of the data type iterable", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        expect($deck)->toBeIterable();
    });
    it("ensures that the deck is created and has 52 cards", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        expect($deck)->toHaveCount(52);
    });
    it("ensures there is one of each card in the deck", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        $deckOfCards = [
            "2 of Spades", "2 of Hearts", "2 of Clubs", "2 of Diamonds",
            "3 of Spades", "3 of Hearts", "3 of Clubs", "3 of Diamonds",
            "4 of Spades", "4 of Hearts", "4 of Clubs", "4 of Diamonds",
            "5 of Spades", "5 of Hearts", "5 of Clubs", "5 of Diamonds",
            "6 of Spades", "6 of Hearts", "6 of Clubs", "6 of Diamonds",
            "7 of Spades", "7 of Hearts", "7 of Clubs", "7 of Diamonds",
            "8 of Spades", "8 of Hearts", "8 of Clubs", "8 of Diamonds",
            "9 of Spades", "9 of Hearts", "9 of Clubs", "9 of Diamonds",
            "10 of Spades", "10 of Hearts", "10 of Clubs", "10 of Diamonds",
            "A of Spades", "A of Hearts", "A of Clubs", "A of Diamonds",
            "J of Spades", "J of Hearts", "J of Clubs", "J of Diamonds",
            "Q of Spades", "Q of Hearts", "Q of Clubs", "Q of Diamonds",
            "K of Spades", "K of Hearts", "K of Clubs", "K of Diamonds",
        ];
        expect($deck)->toEqualCanonicalizing($deckOfCards)
        ->and($deck)->toHaveCount(52);
    });
    it("ensures that the deck is shuffled whenever it is created", function(){
        $setup1 = new Setup();
        $setup2 = new Setup();
        $deck1 = $setup1->get_deck();
        $deck2 = $setup2->get_deck();
        expect($deck1)->not->toMatchArray($deck2);
    });
    it("ensures that the number of cards in the deck goes down by one whenever a card is taken", function(){
        $setup = new Setup;
        $setup->deal_card();
        $deck = $setup->get_deck();
        expect($deck)->toHaveCount(51);
    });
    it("ensures that the card removed from the deck is no longer in the deck", function(){
        $setup = new Setup;
        $removedCard = $setup->deal_card();
        $deck = $setup->get_deck();
        expect($deck)->not->toContain($removedCard);
    });
});

?>