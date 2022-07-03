<?php
/*
 *
                                 5
                        2                  6
                   1        4          X        7
                 X   X    3    X              X    X
                        X   X
 */

include "Node.php";

$rootNode = new Node(5);
$node_2 = new Node(2, $rootNode);
$node_6 = new Node(6, $rootNode);
$node_1 = new Node(1, $node_2);
$node_4 = new Node(4, $node_2);
$node_3 = new Node(3, $node_4);
$node_7 = new Node(7, $node_6);


$rootNode->setLeftNode($node_2);
$rootNode->setRightNode($node_6);
$node_2->setLeftNode($node_1);
$node_2->setRightNode($node_4);
$node_4->setLeftNode($node_3);
$node_6->setRightNode($node_7);

echo 'DFS LEFT pre-order' . PHP_EOL;
preOrder($rootNode); // 5,2,1,4,3,6,7
echo PHP_EOL;
echo PHP_EOL;

inOrder($rootNode); // 1,2,3,4,5,6,7
echo PHP_EOL;
echo PHP_EOL;

// 計算業績返佣是用這個
postOrder($rootNode); // 1,3,4,2,7,6,5
echo PHP_EOL;
echo PHP_EOL;

// DFS LEFT pre-order 馬上印
function preOrder(Node $node)
{
    $node->printValue();
    if (!is_null($node->leftNode)) {
        preOrder($node->leftNode);
    }
    if (!is_null($node->rightNode)) {
        preOrder($node->rightNode);
    }
}

// DFS LEFT in-order 左邊回來後印
function inOrder(Node $node)
{
    if (!is_null($node->leftNode)) {
        inOrder($node->leftNode);
    }
    $node->printValue();
    if (!is_null($node->rightNode)) {
        inOrder($node->rightNode);
    }
}

// DFS LEFT post-order 右邊回來後印
function postOrder(Node $node)
{
    if (!is_null($node->leftNode)) {
        postOrder($node->leftNode);
    }
    if (!is_null($node->rightNode)) {
        postOrder($node->rightNode);
    }
    $node->printValue();
}

