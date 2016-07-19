<?php
namespace Api\Request;

/**
 * Class AspUrl
 * @package Api\Request
 */
class AspUrl implements RequestInterface {
    /**
     * @param $data
     * @return array
     */
    public function process($data) {
        $result = array();
        foreach($data as $key=>$value) {
            if (strstr($value,',') === false) {
                $result[$key] = $value;
            } else {
                $result[$key] = explode(',', $value);
            }
        }
        return $result;
    }
}

