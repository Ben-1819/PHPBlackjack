<?php 
use Game\BlackjackSetup as Setup;
describe("ensures that unwanted outcomes will not happen", function(){
    it("expects the deck to be created as null", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        expect($deck)->tobeNull();
    });
    it("expects there to not be 52 cards in the deck", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        expect($deck)->not->toHaveCount(52);
    });
    it("expects there to be duplicate values in the deck", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        expect(hasDuplicates($deck))->toBeTrue();
    });
    it("expects the deck to not be shuffled", function(){
        $setup1 = new Setup;
        $setup2 = new Setup;
        $deck1 = $setup1->get_deck();
        $deck2 = $setup2->get_deck();
        expect($deck1)->toEqual($deck2);
    });
    it("expects the number of cards in the deck to stay the same when a card is dealt", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        $originalCount = count($deck);
        $setup->deal_card();
        $deck = $setup->get_deck();
        expect($deck)->toHaveCount($originalCount);
    });
    it("expects the number of cards in the deck to go up whenever a card is dealt", function(){
        $setup = new Setup;
        $deck = $setup->get_deck();
        $originalCount = count($deck);
        $setup->deal_card();
        $deck = $setup->get_deck();
        expect(count($deck))->toBeGreaterThan($originalCount);
    });
    it("expects a card to still be in the deck after it has been dealt", function(){
        $setup = new Setup;
        $removedCard = $setup->deal_card();
        $deck = $setup->get_deck();
        expect($deck)->toContain($removedCard);
    });
});
?>