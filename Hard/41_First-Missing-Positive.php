https://leetcode.com/problems/first-missing-positive


<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function firstMissingPositive($nums) {
        $max = pow(2, 31) - 1;

        for ($i = 0; isset($nums[$i]); $i++) {
            $num = $nums[$i];
            
            unset($nums[$i]);

            if ($num > 0)
                $nums[$num + $max] = $num;
        }

        $fmp = $max + 1;

        if (!isset($nums[$fmp]))
            return 1;

        foreach ($nums as $num)
            if (!isset($nums[$num + $max + 1]))
                $fmp = min($fmp, $num + 1);

        return $fmp;
    }
}
