https://leetcode.com/problems/shuffle-string/


<?php

class Solution {

    /**
     * @param String $s
     * @param Integer[] $indices
     * @return String
     */
    function restoreString($s, $indices) {
        $s = str_split($s);
        
        foreach ($s as $pos => $char)
            $result[$indices[$pos]] = $char;
        
        ksort($result);
        
        return implode($result);
    }
}
