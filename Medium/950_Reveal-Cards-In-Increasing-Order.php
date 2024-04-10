https://leetcode.com/problems/reveal-cards-in-increasing-order/description/


<?php

class Solution {

    /**
     * @param Integer[] $deck
     * @return Integer[]
     */
    function deckRevealedIncreasing($deck) {
        sort($deck);

        while ($card = array_pop($deck)) {
            $oDeck[] = $card;
        
            $oDeck[] = array_shift($oDeck);
        }

        $oDeck = array_reverse($oDeck);

        $oDeck[] = array_shift($oDeck);

        return $oDeck;
    }
}
