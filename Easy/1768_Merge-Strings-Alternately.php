https://leetcode.com/problems/merge-strings-alternately/


<?php

class Solution {

    /**
     * @param String $word1
     * @param String $word2
     * @return String
     */
    function mergeAlternately($word1, $word2) {
        $str1 = str_split($word1);

        $str2 = str_split($word2);

        $word = '';

        while (((bool) $char1 = array_shift($str1)) & (bool) $shift2 = array_shift($str2))
            $word .= $shift1.$shift2;
        
        return $word.$shift1.implode($str1).$shift2.implode($str2);
    }
}
