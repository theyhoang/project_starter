<?php

namespace ITP\API;

use ITP\Utils\JsonCurl;

class Buzzfeed {
    public $status, $content;
    protected $jsonCurl;

    public function __construct(JsonCurl $jsonCurl)
    {
        $this->jsonCurl = $jsonCurl;
    }

    public function get()
    {
        $url = 'http://itpwebdev.herokuapp.com/buzzfeed';
        $jsonResponse = $this->jsonCurl->request($url);

        $this->status = $jsonResponse->status;

        if ($this->status === 'success') {
            $this->content = $jsonResponse->data;
        }

        return $jsonResponse;
    }


}