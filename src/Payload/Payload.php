<?php namespace Rollbar\Payload;

use Rollbar\Payload\Data;
use Rollbar\Utilities;

class Payload implements \JsonSerializable
{
    private $data;
    private $accessToken;

    public function __construct(Data $data, $accessToken = null)
    {
        $this->data = $data;
        $this->setAccessToken($accessToken);
    }

    public function getData()
    {
        return $this->data;
    }

    public function setAccessToken($accessToken)
    {
        if (!is_null($accessToken)) {
            Utilities::validateString($accessToken, "accessToken", 32);
        }
        $this->accessToken = $accessToken;
    }

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function jsonSerialize()
    {
        return Utilities::serializeForRollbar(get_object_vars($this));
    }
}
