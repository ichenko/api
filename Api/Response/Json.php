<?php
namespace Api\Response;

/**
 * Class Json
 * @package Api\Response
 */
class Json implements ResponseInterface {
    /**
     * @param $data
     * @return string
     */
    public function render($data) {
        return json_encode($data);
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return array("Content-Type: application/json");
    }

}