<?php

namespace Simpleview\Format\Mapper;

use Simpleview\Vo;

/**
 * Accommodation Xml
 *
 * Class for mapping Accommodation listings' Xml data to accommodation Vos
 *
 * @category   Simpleview
 * @package    Format
 * @subpackage Mapper
 *
 * @author     Jed Diaz
 * @since      08 August 2018
 */
class AccommodationXml extends AbstractXmlMapper implements MapperInterface
{
    /**
     * Instance of accommodation vo
     *
     * @var Vo\AccommodationVo
     */
    protected $vo;

    /**
     * AccommodationXml constructor.
     *
     * @return void
     */
    public function __construct()
    {
        $this->vo = new Vo\AccommodationVo();
    }

    /**
     * Remapping method that will automatically use the class's default vo
     *
     * @param array $data - xml data to map to vo
     *
     * @return Vo\AccommodationVo $vo
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