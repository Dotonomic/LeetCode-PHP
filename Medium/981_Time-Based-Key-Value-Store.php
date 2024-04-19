https://leetcode.com/problems/time-based-key-value-store/description/


<?php

class TimeMap {
    private $table;
    
    /**
     */
    function __construct() {
        
    }
  
    /**
     * @param String $key
     * @param String $value
     * @param Integer $timestamp
     * @return NULL
     */
    function set($key, $value, $timestamp) {
        $this->table[$key][$timestamp] = $value;
    }
  
    /**
     * @param String $key
     * @param Integer $timestamp
     * @return String
     */
    function get($key, $timestamp) {
        if ($row = $this->table[$key]) {
            if ($value = $row[$timestamp])
                return $value;

            if (array_key_first($row) > $timestamp)
                return '';
                
            $timestamps = array_keys($row);
            
            $left = 0;
            
            $right = array_key_last($timestamps);
                
            while ($left < $right) {
                $mid = ceil(($left+$right)/2);
                    
                if ($timestamps[$mid] < $timestamp)
                    $left = $mid;
                else
                    $right = $mid - 1;
            }
                
            return $row[$timestamps[$left]];    
        }
        
        return '';
    }
}

/**
 * Your TimeMap object will be instantiated and called as such:
 * $obj = TimeMap();
 * $obj->set($key, $value, $timestamp);
 * $ret_2 = $obj->get($key, $timestamp);
 */
