<?php

namespace Tests;

use Parentheses\Exception\InvalidArgumentException;
use Parentheses\Parentheses;
use PHPUnit\Framework\TestCase;

class ParenthesesTest extends  TestCase
{
    /**
     * @dataProvider providerBalanced
     */
    public function testBalanced($result, $string)
    {
        // arrange
        $object = new Parentheses($string);

        // act
        $is_balanced = $object->isBalanced();

        // assert
        $this->assertEquals($result, $is_balanced);
    }

    public function providerBalanced()
    {
        return [
            [true, '()'],
            [true, '()()()'],
            [true, '((()))'],
            [true, '(()(()()))'],
            [true, "(\t) (\n) (\r)"],

            [false, ')('],
            [false, '())()'],
            [false, ')((()))'],
            [false, '((()(()()))'],
            [false, "(\t) (\n (\r)"],
        ];
    }

    /**
     * @dataProvider providerExceptions
     */
    public function testInvalidArgumentException($string)
    {
        $this->expectException(InvalidArgumentException::class);

        $object = new Parentheses($string);

        $object->isBalanced();
    }

    public function providerExceptions()
    {
        return [
            ['sdfsd'],
            ['(asdfadf_ )'],
        ];
    }
}