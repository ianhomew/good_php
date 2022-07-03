<?php


// 将抽象与实现分离，这样两者可以独立地改变。
// 怎麼連接抽象與實現呢？
// 把介面當作參數 放入抽象內
// 也就是在抽象類內 會有實作與抽象

interface FormatterInterface
{
    public function format($text): string;
}

class HtmlFormatter implements FormatterInterface
{

    public function format($text): string
    {
        return "<p>$text</p>";
    }
}

class PlainFormatter implements FormatterInterface
{

    public function format($text): string
    {
        return $text;
    }
}

abstract class Service
{
    /**
     * @var FormatterInterface
     */
    protected $implementation;

    public function __construct(FormatterInterface $printer)
    {
        $this->implementation = $printer;
    }

    public function beforeGet()
    {
        echo '我是寫死的' . PHP_EOL;
    }

    abstract public function get(): string;
}

class HelloWorldService extends Service
{
    public function get(): string
    {
        return $this->implementation->format('Hello World');
    }
}

$helloHtml = new HelloWorldService(new HtmlFormatter());
echo $helloHtml->get() . PHP_EOL;

$helloPlain = new HelloWorldService(new PlainFormatter());
echo $helloPlain->get() . PHP_EOL;