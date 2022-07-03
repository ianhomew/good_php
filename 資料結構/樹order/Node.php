<?php


class Node
{
    /** @var int */
    public $value;
    /** @var Node|null  */
    private $parentNode;
    /** @var Node|null  */
    public $leftNode;
    /** @var Node|null  */
    public $rightNode;

    /**
     * Node constructor.
     * @param int  $value
     * @param Node|null $parentNode
     */
    public function __construct(int $value, $parentNode = null)
    {
        $this->value = $value;
        $this->parentNode = $parentNode;
    }

    public function setLeftNode(Node $leftNode): void
    {
        $this->leftNode = $leftNode;
    }
    public function setRightNode(Node $rightNode): void
    {
        $this->rightNode = $rightNode;
    }

    public function printValue(): void
    {
        echo $this->value . ', ';
    }
}