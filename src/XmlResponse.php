<?php

namespace Doliveira\LaravelResponseBuilder;

use Illuminate\Support\Facades\Config;
use Illuminate\Http\Response;
use SimpleXMLElement;

class XmlResponse extends BaseResponse
{
    /**
     * Build the XML response.
     *
     * @return Response
     */
    public function build(): Response
    {
        $structure = $this->getResponseStructure();

        $responseArray = [
            $structure['status'] => $this->statusCode,
            $structure['message'] => $this->message,
            $structure['data'] => $this->data,
        ];

        $responseArray = $this->wrapData($responseArray);

        $xml = $this->arrayToXml($responseArray, Config::get('responsebuilder.xml_root_element'));

        return response($xml, $this->statusCode)
            ->header('Content-Type', 'application/xml');
    }

    /**
     * Convert array to XML.
     *
     * @param array $data
     * @param string $rootElement
     * @return string
     */
    protected function arrayToXml(array $data, string $rootElement): string
    {
        $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><{$rootElement}/>");

        $this->arrayToXmlRecursive($data, $xml);

        return $xml->asXML();
    }

    /**
     * Recursively convert array to XML.
     *
     * @param array $data
     * @param SimpleXMLElement $xml
     */
    protected function arrayToXmlRecursive(array $data, SimpleXMLElement $xml): void
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $subNode = $xml->addChild($key);
                $this->arrayToXmlRecursive($value, $subNode);
            } else {
                $xml->addChild($key, htmlspecialchars((string) $value));
            }
        }
    }
}
