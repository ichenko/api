<?php
namespace Api\Request;
/**
 * Interface RequestInterface
 * @package Api\Request
 */
interface RequestInterface {
    /**
     * @param $data
     * @return mixed
     */
    public function process($data);
}