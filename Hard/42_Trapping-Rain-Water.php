https://leetcode.com/problems/trapping-rain-water/description/


<?php

class Solution {

    /**
     * @param Integer[] $height
     * @return Integer
     */
    function trap($heights) {
        $water = 0;

        $lastBar = -1;

        $heights[-1] = 0;

        $bars = [];

        foreach ($heights as $bar => $height) {
            if ($height < $heights[$lastBar])
                $bars[] = $lastBar;
            elseif ($height > $heights[$lastBar]) {
                $max = $heights[$lastBar];

                while (!empty($bars)) {
                    $prevBar = array_pop($bars);

                    $prevHeight = $heights[$prevBar];
                    
                    if ($prevHeight >= $height) {
                        $water += ($bar - $prevBar - 1) * ($height - $max);

                        if ($prevHeight > $height)
                            $bars[] = $prevBar;

                        break;
                    }

                    $water += ($bar - $prevBar - 1) * ($prevHeight - $max);

                    $max = $prevHeight;
                }
            }

            $lastBar++;
        }

        return $water;   
    }
}
