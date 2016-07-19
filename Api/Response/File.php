<?php
namespace Api\Response;

/**
 * Class File
 * @package Api\Response
 */
class File implements ResponseInterface
{

    /**
     * @param $data
     * @return mixed
     */
    public function render($data) {
        return $data;
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return array("application/x-msdownload");
    }
}