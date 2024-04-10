https://leetcode.com/problems/can-place-flowers/description/


<?php

class Solution {

    /**
     * @param String $str1
     * @param String $str2
     * @return String
     */

    function madeOf($str, $sub) {
        if (strlen($str) % strlen($sub) == 0)
            return $str == str_repeat($sub, strlen($str)/strlen($sub));

        return FALSE;
    }

    function gcdOfStrings($str1, $str2) {
        $gcd = '';

        $maxLen = min(strlen($str1),strlen($str2));

        for ($i=1;$i<=$maxLen;$i++) {
            $len = $maxLen / $i;

            if (substr($str1,0,$len) == substr($str2,0,$len)) {
                $sub = substr($str1,0,$len);
            
                if ($this->madeOf($str1,$sub) & $this->madeOf($str2,$sub)) {
                    $gcd = $sub;

                    break;
                }
            }
        }

        return $gcd;
    }
}
