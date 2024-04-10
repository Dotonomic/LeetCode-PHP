https://leetcode.com/problems/longest-substring-without-repeating-characters/


<?php

class Solution {

    /**
     * @param String $s
     * @return Integer
     */
    function lengthOfLongestSubstring($s) {
        $max = 0;
        
        $s = str_split($s);

        $sub = [];

        while (count($s) + count($sub) > $max) {
            $i = 0;

            foreach ($s as $char)
                if (in_array($char,$sub))
                    break;
                else {
                    $sub[] = $char;    

                    $i++;
                }

            $max = max($max,count($sub));

            if ($max == 95)
                return 95;

            $s = array_slice($s,$i+1);

            $sub = array_slice($sub,array_search($char,$sub)+1);       
        
            $sub[] = $char;

            while (str_starts_with(implode($s),implode($sub)))
                $s = array_slice($s,count($sub));
        }

        return $max;
    }
}
