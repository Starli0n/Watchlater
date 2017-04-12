<?php

namespace Watchlater\Test\Api;

use Watchlater\Api\Router;
use Watchlater\Test\LocalWebTestCase;

class RouterTest extends LocalWebTestCase
{
    public function testHello()
    {
        $this->client->get('/hello/RouterTest');
        $response = $this->client->response;
        $this->assertEquals(200, $response->getStatusCode());
        $this->assertEquals('OK', $response->getReasonPhrase());
        $this->assertEquals('application/json;charset=utf-8', $response->getHeader('Content-Type')[0]);
        $data = json_decode($response->getBody());
        $this->assertEquals('Hello RouterTest', $data->message);
    }
}
