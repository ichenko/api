<?php
namespace Api\Response;

/**
 * Class Blank
 * @package Api\Response
 */
class Blank implements ResponseInterface
{

    /**
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        return $data;
    }

    /**
     *
     */
    public function getHeaders()
    {
    }
}