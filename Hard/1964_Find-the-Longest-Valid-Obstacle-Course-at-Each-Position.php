https://leetcode.com/problems/find-the-longest-valid-obstacle-course-at-each-position


<?php

class Solution {

    /**
     * @param Integer[] $obstacles
     * @return Integer[]
     */
     function longestObstacleCourseAtEachPosition($obstacles) {
        $m = [0];

        foreach ($obstacles as $i => $height) {
            if ($height >= end($m)) {
                $m[] = $height;

                $ans[] = array_key_last($m);

                continue;
            }

            $length = 0;

            $right = array_key_last($m);

            do {
                $mid = ($length + $right) >> 1;

                if ($m[$mid] > $height)
                    $right = $mid;
                else
                    $length = $mid + 1;
            } while ($length < $right);

            $m[$length] = $height;
        
            $ans[] = $length;
        }

        return $ans;
    }
}
