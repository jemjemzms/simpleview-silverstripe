<?php

namespace Simpleview\Format\Formatter;

use Simpleview\Vo;

/**
 * Formatter Interface
 *
 * Interface class for formatters
 *
 * @category   Simpleview
 * @package    Format
 * @subpackage Formatter
 *
 * @author     Jed Diaz
 * @since      08 August 2018
 */
interface FormatterInterface
{
    /**
     * Formats a listing vo and returns the formatted objec
     *
     * @param Vo\ListingVo $vo - the listing vo to format
     *
     * @return Vo\ListingVo $vo - the formatted listing vo
     */
    public function format($vo);
}