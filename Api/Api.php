<?php
namespace Api;

/**
 * Class Api
 * @package Api
 */
class Api
{
    /**
     * @var
     */
    protected $request;
    /**
     * @var array
     */
    protected $headers = array();
    /**
     * @var Response\ResponceInterface
     */
    protected $response;
    /**
     * @var
     */
    protected $dataProvider;

    /**
     * @param Response\ResponseInterface $response
     * @return $this
     */
    public function setResponseFormat(Response\ResponseInterface $response)
    {
        $this->response = $response;
        return $this;
    }


    /**
     * @param DataProvider\DataProviderInterface $procider
     * @return $this
     */
    public function setDataProvider(DataProvider\DataProviderInterface $procider)
    {
        $this->dataProvider = $procider;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    /**
     * @return Response\ResponceInterface
     */
    public function getResponseFormat()
    {
        return $this->response;
    }

    /**
     * @param Request\RequestInterface $requestType
     * @return Api
     */
    public function setRequestType(Request\RequestInterface $requestType)
    {
        $this->request = $requestType;
        return $this;
    }

    /**
     * @return Request\RequestInterface
     */
    public function getRequestType()
    {
        if (!$this->request) {
            $this->request = new Request\Blank();
        }
        return $this->request;
    }


    /**
     * @param $headerText
     * @return $this
     */
    protected function addHeader($headerText)
    {
        $this->headers[] = $headerText;
        return $this;
    }

    /**
     * @param $headerList
     * @return $this
     */
    protected function addHeaders($headerList)
    {
        if (is_array($headerList)) {
            foreach ($headerList as $header) {
                $this->addHeader($header);
            }
        }
        return $this;
    }

    /**
     *
     */
    protected function sendHeaders()
    {
        foreach ($this->headers as $headerText) {
            header($headerText);
        }
    }


    /**
     * @param array $inputData
     */
    public function output($inputData)
    {
        $body = $this->getResult($inputData);
        $this->sendHeaders();
        echo $body;
    }

    /**
     * @param $inputData
     * @return bool
     */
    public function outputCrypt($inputData)
    {
        if (!isset($inputData['kXccs'])) {
            return false;
        }
        $body = $this->getResult($inputData);
        $this->sendHeaders();
        return \Helper\Encryptor::crypter($body, $inputData['kXccs']);
    }

    /**
     * @param $inputData
     * @return mixed
     * @throws \Exception
     */
    public function getResult($inputData)
    {
        if (!$this->getRequestType()) {
            throw new \Exception('Request type not defined');
        }
        if (!$this->getResponseFormat()) {
            throw new \Exception('Response format not defined');
        }
        if (!$this->getDataProvider()) {
            throw new \Exception('Data provider not defined');
        }

        $params = $this->getRequestType()->process($inputData);
        $this->getDataProvider()->setInputParams($params);


        $this->addHeaders($this->getResponseFormat()->getHeaders());
        return $this->getResponseFormat()->render($this->getDataProvider()->getData());

    }

    /**
     * @param $headerList
     * @return $this
     */
    public function addCustomHeaders($headerList)
    {
        if (is_array($headerList)) {
            foreach ($headerList as $header) {
                $this->addHeader($header);
            }
        }
        return $this;
    }

}