https://leetcode.com/problems/fibonacci-number/description/


<?php

class Solution {
  
    private $mem = [];
    
    /**
     * @param Integer $n
     * @return Integer
     */
    function fib($n) {
        if (isset($this->mem[$n]))
            return $this->mem[$n];
        
        switch ($n) {
            case 0 : return 0;
            case 1 : return 1;
            default :
                $this->mem[$n] = $this->fib($n-1) + $this->fib($n-2);
                return $this->mem[$n];
        }
    }
}
