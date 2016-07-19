<?php
namespace Api\Response;

/**
 * Interface ResponseInterface
 * @package Api\Response
 */
interface ResponseInterface {
    /**
     * @param $data
     * @return mixed
     */
    public function render($data);

    /**
     * @return mixed
     */
    public function getHeaders();
}