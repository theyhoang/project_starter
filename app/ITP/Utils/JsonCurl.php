<?php 

namespace ITP\Utils;

class JsonCurl {

    public function request($url)
    {
        return json_decode(file_get_contents($url));
    }

}