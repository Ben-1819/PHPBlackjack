<?php
use Game\BlackjackSetup as Setup;
use Player\Player;
/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "pest()" function to bind a different classes or traits.
|
*/

pest()->extend(Tests\TestCase::class)->in('Feature');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function something()
{
    // ..
}

function hasDuplicates(array $array){
    $unique = array_unique($array);
    return count($unique) !== count($array);
}

function correctScore(array $array, int $int){
    $score = 0;
    $aces = 0;
    foreach($array as $card){
        // Explode the card to get the rank
        $rank = explode(" ", $card)[0];
        // Perform a switch statement on the rank of the card
        switch($rank){
            // If card is an ace
            case "A":
                $score += 11;
                $aces++;
                break;
            // If card is a face card
            case in_array($rank, ["K", "Q", "J"]):
                $score += 10;
                $aces++;
                break;
            // If card is normal
            default:
                $score += (int)$rank;
        }
        // If score is too high and player has aces reduce the score
        while($score > 21 && $aces >= 1){
            $score -= 10;
            $aces--;
        }
    }
    return $score === $int;
}

function correctIncrease(array $array, int $playerScore, int $playerAces){
    $value = 0;
    $aces = 0;
    // Get the last card given to the player
    $added = end($array);
    // explode the card
    $rank = explode(" ", $added)[0];
    switch($rank){
        // If card is an ace
        case "A":
            $value += 11;
            $aces++;
            break;
        // If card is a face card
        case in_array($rank, ["K", "Q", "J"]):
            $value += 10;
            $aces++;
            break;
        // If card is normal
        default:
            $value += (int)$rank;
    }
    // If score is too high and player has aces reduce the score
    return $value;
}

function setCards($playersCards, $card1, $card2){
    $playersCards = [$card1, $card2];
    return $playersCards;
}

function aceNoDecrease($playerScore){
    $playerScore += 10;
    return $playerScore;
}