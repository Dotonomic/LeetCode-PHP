https://leetcode.com/problems/minimum-time-visiting-all-points/description/


<?php

class Solution {

    /**
     * @param Integer[][] $points
     * @return Integer
     */
    function minTimeToVisitAllPoints($points) {
        $minTime = 0;
        
        $last = array_shift($points);
        
        foreach ($points as $point) {
            $minTime += max(abs($point[0]-$last[0]),abs($point[1]-$last[1]));
            
            $last = $point;
        }
        
        return $minTime;
    }
}
