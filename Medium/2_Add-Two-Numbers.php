https://leetcode.com/problems/add-two-numbers/description/


<?php

/**
 * Definition for a singly-linked list.
 * class ListNode {
 *     public $val = 0;
 *     public $next = null;
 *     function __construct($val = 0, $next = null) {
 *         $this->val = $val;
 *         $this->next = $next;
 *     }
 * }
 */
class Solution {

    private $carry = FALSE;

    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    function addTwoNumbers($l1, $l2) {
        if (is_null($l1) & is_null($l2) & !$this->carry)
            return NULL;

        $val = (is_null($l1) ? 0 : $l1->val) + (is_null($l2) ? 0 : $l2->val) + $this->carry;

        $sum = new ListNode($val % 10);

        $this->carry = $val > 9;

        $l1 = $l1->next;

        $l2 = $l2->next;

        $sum->next = $this->addTwoNumbers($l1, $l2);

        return $sum;
    }
}
