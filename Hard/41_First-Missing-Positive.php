https://leetcode.com/problems/first-missing-positive/description/


<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        $fmp = 1;
        
        sort($nums);
        
        foreach ($nums as $num) {
            if ($num > $fmp)
                return $fmp;

            if ($num == $fmp)
                $fmp++;
        }

        return $fmp;
    }
}
