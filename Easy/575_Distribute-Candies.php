https://leetcode.com/problems/distribute-candies/description/


<?php

class Solution {

    /**
     * @param Integer[] $candyType
     * @return Integer
     */
    function distributeCandies($candyType) {
        return min(count(array_unique($candyType)),count($candyType)/2);
    }
}
