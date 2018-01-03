<?php
declare(strict_types = 1);
namespace Parentheses;
use Parentheses\Exception\InvalidArgumentException;

/**
 * Class parentheses
 * @package parentheses
 */
class Parentheses
{
    /** @var string  */
    private $string;

    /**
     * parentheses constructor.
     * @param string $string
     */
    public function __construct(string $string)
    {
        $this->string = $string;
        $this->valid();
    }

    /**
     * String validation
     *
     * @throws InvalidArgumentException
     */
    private function valid()
    {
         $result = preg_match('|([^\(\)\s\n\r\t]+)|m', $this->string);
         if ($result) {
             throw new InvalidArgumentException('String have not allowed symbols. Allow: \s,\n,\r,\t,( and )');
         }
    }

    /**
     * Filter string. Delete all symbols except parentheses
     *
     * @return string
     */
    private function filter() : string
    {
        return preg_filter('|([^\(\)]*)|m', '', $this->string);
    }

    /**
     * Check balance parentheses
     *
     * @return bool
     */
    public function isBalanced() : bool
    {
        $string = $this->filter();

        $count = 0;
        do {
            $string = preg_replace('|\(\)|', '', $string, -1, $count);
        } while ($count > 0);

        return empty($string);
    }
}