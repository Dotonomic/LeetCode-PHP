https://leetcode.com/problems/last-stone-weight/description/


<?php

class Solution {

    /**
     * @param Integer[] $stones
     * @return Integer
     */
    function lastStoneWeight($stones) {
        while (count($stones) > 1) {
            sort($stones);
        
            $x = array_pop($stones);
        
            $y = array_pop($stones);
        
            if ($x != $y)
                $stones[] = abs($x-$y);
        }
        
        if (empty($stones))
            return 0;
        
        return $stones[0];
    }
}
