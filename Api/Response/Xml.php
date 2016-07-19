<?php
namespace Api\Response;

/**
 * Class Xml
 * @package Api\Response
 */
class Xml implements ResponseInterface
{

    /**
     * @var string
     */
    protected $defaultItemsTag = 'item';
    /**
     * @var array
     */
    protected $itemsTagList = array();


    /**
     * @param $tagName
     * @param $parentTagName
     * @return $this
     */
    public function addItemTag($tagName, $parentTagName)
    {
        $this->itemsTagList[$parentTagName] = $tagName;
        return $this;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function render($data)
    {
        return $this->arrayToXml($data, new \SimpleXMLElement('<root/>'));
    }


    /**
     * @return array
     */
    public function getHeaders()
    {
        return array("Content-Type:text/xml");
    }

    /**
     * @param $data
     * @param \SimpleXMLElement $xml
     * @return mixed
     */
    protected function arrayToXml($data, \SimpleXMLElement $xml)
    {
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                if (is_integer($k)) {
                    if (empty($this->itemsTagList[$xml->getName()])) {
                        $k = 'item';
                    } else {
                        $k = $this->itemsTagList[$xml->getName()];
                    }
                }
                if (is_array($v)) {
                    $this->arrayToXml($v, $xml->addChild($k));
                } else {
                    $xml->$k = $v;
                }
            }
        }
        return $xml->asXML();
    }
}