<?php
/**
 * ParseStream - Wrapper for abstracted stream usage
 *
 * @author Ben Friedman <ben@axolsoft.com>
 */

namespace Parse\HttpClients;

/**
 * Class ParseStream
 * @package Parse\HttpClients
 */
class ParseStream
{
    /**
     *
     * @var resource
     */
    private $stream;

    /**
     * Response headers
     * @var array|null
     */
    private $responseHeaders;

    /**
     * Error message
     * @var string
     */
    private $errorMessage;

    /**
     * Error code
     * @var int
     */
    private $errorCode;

    /**
     * Create a stream context
     *
     * @param array $options  Options to pass to our context
     */
    public function createContext($options)
    {
        $this->stream = stream_context_create($options);

    }

    /**
     * Gets the contents from the given url
     *
     * @param string $url   Url to get contents of
     * @return string
     */
    public function get($url)
    {
        try {
            // get our response
            $response = file_get_contents($url, false, $this->stream);

        } catch(\Exception $e) {
            // set our error message/code and return false
            $this->errorMessage = $e->getMessage();
            $this->errorCode    = $e->getCode();
            return false;

        }

        // set response headers
        $this->responseHeaders = $http_response_header;

        return $response;

    }

    /**
     * Returns the response headers for the last request
     *
     * @return array
     */
    public function getResponseHeaders()
    {
        return $this->responseHeaders;

    }

    /**
     * Gets the current error message
     *
     * @return string
     */
    public function getErrorMessage()
    {
        return $this->errorMessage;

    }

    /**
     * Gest the current error code
     *
     * @return int
     */
    public function getErrorCode()
    {
        return $this->errorCode;

    }

}