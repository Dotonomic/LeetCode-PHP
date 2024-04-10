https://leetcode.com/problems/sum-of-nodes-with-even-valued-grandparent/description/


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
    
    private $evens = [];
    
    function storeEvens($node) {
        if ($node->val % 2 == 0)
            $this->evens[] = $node;
        
        if (!is_null($node->left))
            $this->storeEvens($node->left);
        
        if (!is_null($node->right))
            $this->storeEvens($node->right);
    }
    
    /**
     * @param TreeNode $root
     * @return Integer
     */
    function sumEvenGrandparent($root) {
        $sum = 0;
        
        $this->storeEvens($root);
        
        foreach ($this->evens as $even) {
            $sum += $even->left->left->val;
            $sum += $even->left->right->val;
            $sum += $even->right->left->val;
            $sum += $even->right->right->val;
        }
                
        return $sum;
    }
}
