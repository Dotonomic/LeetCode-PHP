https://leetcode.com/problems/reorder-data-in-log-files/description/


<?php

class Solution {

    /**
     * @param String[] $logs
     * @return String[]
     */
    function reorderLogFiles($logs) {
        foreach ($logs as $key => $log)
            if (!preg_match('/\s[0-9]/',$log)) {
                unset($logs[$key]);
                
                preg_match('/.*?\s/',$log,$matches);
                
                $letterLogs[] = [substr($log,strlen($matches[0])),$matches[0]];
            }
        
        array_multisort($letterLogs);
        
        foreach ($letterLogs as $log)
            $newLetterLogs[] = $log[1].$log[0];
            
        return array_merge($newLetterLogs,$logs);
    }
}
