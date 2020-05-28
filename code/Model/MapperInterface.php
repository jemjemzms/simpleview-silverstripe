<?php

namespace Simpleview\Model;

/**
 * Mapper interface
 *
 * Interface for Orm mappers
 *
 * @category Simpleview
 * @package  Model
 *
 * @author   Lodewyk
 * @since    08 August 2018
 */
interface MapperInterface
{
    /**
     * Maps a vo of data to an orm object
     *
     * @param mixed $vo - vo to map data from
     *
     * @return mixed - orm object
     */
    public function remapOrm($vo);
}