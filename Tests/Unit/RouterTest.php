<?php

namespace Tests\Unit;

use Core\Router;
use PHPUnit\Framework\TestCase;

use function PHPUnit\Framework\assertEquals;

class RouterTest extends TestCase
{

    public function test_it_adds_a_route()
    {
        $router = new Router();
        $router->add('/', 'index.php', 'get');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'get',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_get_route()
    {
        $router = new Router();
        $router->get('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'GET',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_post_route()
    {
        $router = new Router();
        $router->post('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'POST',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_delete_route()
    {
        $router = new Router();
        $router->delete('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'DELETE',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_push_route()
    {
        $router = new Router();
        $router->push('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'PUSH',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_patch_route()
    {
        $router = new Router();
        $router->patch('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'PATCH',
            'middleware' => null
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }

    public function test_it_adds_only_middleware()
    {
        $router = new Router();
        $router->get('/', 'index.php')->only('Auth');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'GET',
            'middleware' => 'Auth'
        ];

        $this->assertEquals($expected, $router->getRoutes()[0]);
    }
}
