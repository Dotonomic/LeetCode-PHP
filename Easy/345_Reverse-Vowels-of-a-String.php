https://leetcode.com/problems/reverse-vowels-of-a-string/


<?php

class Solution {
    
    function isVowel($letter) {
        return in_array($letter,['a','e','i','o','u','A','E','I','O','U']);
    }

  /**
     * @param String $s
     * @return String
  */
    function reverseVowels($s) {
        $s = str_split($s);

        $first = 0;

        $last = count($s) - 1;

        while ($first < $last) {
            while (!$this->isVowel($s[$first])) {
                $first++;
            
                if ($first == $last)
                    break 2;
            }

            while (!$this->isVowel($s[$last])) {
                $last--;
            
                if ($first == $last)
                    break 2;
            }

            $aux = $s[$first];
            
            $s[$first] = $s[$last];

            $s[$last] = $aux;

            $first++;

            $last--;
        }

        return implode($s);
    }
}
