https://leetcode.com/problems/sum-of-floored-pairs


<?php

class Solution {

    /**
     * @param Integer[] $nums
     * @return Integer
     */
    function sumOfFlooredPairs($arr) {
        $table = array_count_values($arr);

        ksort($table);

        $sum = 0;

        foreach ($table as $num => $frequency) {
            $nums[] = $num;
            
            $freqTable[] = $frequency;

            $sum += $frequency;

            $freqSum[] = $sum;
        }

        $freqSum[-1] = 0;

        $lastKey = array_key_last($nums);

        $sum = 0;

        foreach ($nums as $key => $num) {
            $f = 0;

            $lastFreqSum = $freqSum[$key - 1];

            for ($left = $key; $left <= $lastKey; $left++) {
                $factor = floor($nums[$left] / $num);

                $limit = ($factor + 1) * $num;

                $right = $lastKey;

                while ($left < $right) {
                    $mid = $left + ceil(($right - $left) / 2);

                    if ($nums[$mid] >= $limit)
                        $right = $mid - 1;
                    else
                        $left = $mid;
                }

                $leftFreqSum = $freqSum[$left];

                $f = ($f + ($factor * ($leftFreqSum - $lastFreqSum)) % 1000000007) % 1000000007;

                $lastFreqSum = $leftFreqSum;
            }

            $sum = ($sum + ($f * $freqTable[$key]) % 1000000007) % 1000000007;
        }

        return $sum;
    }
}
