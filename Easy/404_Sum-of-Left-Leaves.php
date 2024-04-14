https://leetcode.com/problems/sum-of-left-leaves/


<?php

/**
 * Definition for a binary tree node.
 * class TreeNode {
 *     public $val = null;
 *     public $left = null;
 *     public $right = null;
 *     function __construct($val = 0, $left = null, $right = null) {
 *         $this->val = $val;
 *         $this->left = $left;
 *         $this->right = $right;
 *     }
 * }
 */
class Solution {

    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumOfLeftLeaves($root, $left = FALSE) {
        if (is_null($root->left) & is_null($root->right))
            if ($left)
                return $root->val;
            else
                return 0;
        
        return $this->sumOfLeftLeaves($root->left, TRUE) + $this->sumOfLeftLeaves($root->right);

    }
}
