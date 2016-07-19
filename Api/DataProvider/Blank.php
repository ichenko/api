<?php
namespace Api\DataProvider;
/**
 * Class Blank
 * @package Api\DataProvider
 */
class Blank implements DataProviderInterface
{

    /**
     * @var array
     */
    protected $params = array();

    /**
     * @return array
     */
    public function getData()
    {
        return $this->params;
    }

    /**
     * @param $params
     * @return $this
     */
    public function setInputParams($params)
    {
        $this->params = $params;
        return $this;
    }

}