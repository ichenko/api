<?php
namespace Api\DataProvider;

/**
 * Interface DataProviderInterface
 * @package Api\DataProvider
 */
interface DataProviderInterface
{
    /**
     * @param $params
     * @return mixed
     */
    public function setInputParams($params);

    /**
     * @return mixed
     */
    public function getData();
}