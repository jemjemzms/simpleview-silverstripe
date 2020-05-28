<?php

namespace Simpleview\Format\Mapper;

/**
 * Mapper Interface
 *
 * Interface for Xml mappers
 *
 * @category   Simpleview
 * @package    Format
 * @subpackage Mapper
 *
 * @author     Jed Diaz
 * @since      08 August 2018
 */
interface MapperInterface
{
    /**
     * Hydrates a VO with an array of XML data
     *
     * @param array $data - data to remap into the vo
     * @param mixed $vo - specific vo to populate
     *
     * @return mixed - returns the specified vo
     */
    public function remapXml($data, $vo);
}