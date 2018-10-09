<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class HerokuControllerTest extends WebTestCase
{
    public function testMy()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/my');
    }

}
