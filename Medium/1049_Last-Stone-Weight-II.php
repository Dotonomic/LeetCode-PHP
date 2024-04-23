https://leetcode.com/problems/last-stone-weight-ii


<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeightII($stones) {
        $sum = 0;

        foreach (array_reverse($stones, true) as $sKey => $stone) {
            $sum += $stone;
            
            $sums[$sKey-1] = $sum;
        }

        $first = array_shift($stones);

        $branches = [$first,-$first];

        foreach ($stones as $sKey => $stone) {
            $sum = $sums[$sKey];

            foreach ($branches as $key => $branch) {
                $plus = $branch + $sum;

                $minus = $branch - $sum;

                if ($plus * $minus == 0)
                    return 0;
            
                if ($plus < 0 || $minus > 100)
                    unset($branches[$key]);
                else {
                    $branches[$key] += $stone;
                
                    $branches[] = $branch - $stone;
                }
            }
        
            $branches = array_unique($branches);
        }

        $ans = 100;

        foreach ($branches as $branch) {
            if ($branch == 1)
                return 1;

            if ($branch > 0)
                $ans = min($branch, $ans);
        }

        return $ans;
    }
}
