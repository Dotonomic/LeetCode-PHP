https://leetcode.com/problems/kids-with-the-greatest-number-of-candies/description/


<?php

class Solution {

    /**
     * @param Integer[] $candies
     * @param Integer $extraCandies
     * @return Boolean[]
     */
    function kidsWithCandies($candies, $extraCandies) {
        $max = max($candies);

        foreach ($candies as $kid => $c)
            $result[$kid] = $c + $extraCandies >= $max;
        
        return $result;
    }
}
