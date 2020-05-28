<?php

namespace Simpleview\Format\Mapper;

use Simpleview\Vo;

/**
 * Activity Xml
 *
 * Class for mapping Activity listings' Xml data to activity Vos
 *
 * @category   Simpleview
 * @package    Format
 * @subpackage Mapper
 *
 * @author     Jed Diaz
 * @since      15 August 2018
 */
class ActivityXml extends AbstractXmlMapper implements MapperInterface
{
    /**
     * Instance of activity vo
     *
     * @var Vo\ActivityVo
     */
    protected $vo;

    /**
     * ActivityXml constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vo = new Vo\ActivityVo();
    }

    /**
     * Remapping method that will automatically use the class's default vo
     *
     * @param array $data - xml data to map to vo
     *
     * @return Vo\ActivityVo $vo
     */
    public function remapDefault($data)
    {
        return $this->remapXml($data, $this->vo);
    }

    /**
     * Remaps xml data to a specified vo
     *
     * @param array $data - data to map to vo
     * @param mixed $vo - vo to hydrate with data
     *
     * @return mixed - hydrated vo
     */
    public function remapXml($data, $vo)
    {
        return parent::remapXml($data, $vo);
    }
}