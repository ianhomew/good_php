<?php
/**
 * Created by PhpStorm.
 * User: admin
 * Date: 2020/1/6
 * Time: 上午 11:50
 */

// 原型模式
// 相比正常创建一个对象 (new Foo () )，首先创建一个原型，然后克隆它会更节省开销。
// 大数据量 (例如：通过 ORM 模型一次性往数据库插入 1,000,000 条数据) 。

/**
 * 淺複製
 * 複製後，物件裡面的其他的物件，不會被複製到。
 *
 * 原型模式只在需要解決重大性能問題的情況下使用，而不僅僅是在需要大量對象的情況下。
 */


abstract class PostPrototype
{
    protected $title;
    protected $content;
    protected $postType; // 1. 商业类 2. 科技类

    abstract public function __clone();
    abstract public function getInsertString();

    public function setTitle(string $title)
    {
        $this->title = $title;
    }
    public function getTitle()
    {
        return $this->title;
    }
    public function setContent(string $content)
    {
        $this->content = $content;
    }
    public function getContent()
    {
        return $this->content;
    }
    public function setPostType(int $postType)
    {
        $this->postType = $postType;
    }
    public function getPostType()
    {
        return $this->postType;
    }
}

class BusinessPost extends PostPrototype
{
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->setPostType(1);
    }

    public function __clone()
    {
    }
    public function getInsertString()
    {
        return "INSERT INTO POST(`type`, `title`, `content`) 
                VALUES ({$this->getPostType()}, {$this->getTitle()}, {$this->getContent()})";
    }


}
class TechPost extends PostPrototype
{
    public function __construct($title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->setPostType(2);
    }

    public function __clone()
    {
    }
    public function getInsertString()
    {
        return "INSERT INTO POST(`type`, `title`, `content`) 
                VALUES ({$this->getPostType()}, {$this->getTitle()}, {$this->getContent()})";
    }
}


$businessPost = new BusinessPost('商业', '商业内容');
$techPost = new TechPost('科技', '科技内容');

$businessArr = [];
for ($i=0; $i<10; $i++) {
    $b = clone $businessPost;
    $b->setTitle($b->getTitle() . '_' . $i);
    $b->setContent($b->getContent() . '____' . $i);
    $businessArr[$i] = $b;
}

$techArr = [];
for ($i=0; $i<10; $i++) {
    $t = clone $techPost;
    $t->setTitle($t->getTitle() . '_' . $i);
    $t->setContent($t->getContent() . '____' . $i);
    $techArr[$i] = $t;
}

/** @var BusinessPost $b */
foreach ($businessArr as $b) {
    echo $b->getInsertString() . PHP_EOL;
}

/** @var TechPost $b */
foreach ($techArr as $t) {
    echo $t->getInsertString() . PHP_EOL;
}



