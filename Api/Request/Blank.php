<?php
namespace Api\Request;

/**
 * Class Blank
 * @package Api\Request
 */
class Blank implements RequestInterface {
    /**
     * @param $data
     * @return mixed
     */
    public function process($data) {
        return $data;
    }
}

