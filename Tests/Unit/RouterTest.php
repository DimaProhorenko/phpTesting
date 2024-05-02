<?php

namespace Tests\Unit;

use app\Core\Exceptions\RouteException;
use app\Core\Router;
use PHPUnit\Framework\TestCase;


class RouterTest extends TestCase
{
    private Router $router;

    protected function setUp(): void
    {
        parent::setUp();
        $this->router = new Router();
    }

    public function test_it_adds_a_route()
    {

        $this->router->add('/', 'index.php', 'get');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'get',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_get_route()
    {

        $this->router->get('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'GET',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_post_route()
    {

        $this->router->post('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'POST',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_delete_route()
    {

        $this->router->delete('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'DELETE',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_push_route()
    {

        $this->router->push('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'PUSH',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_patch_route()
    {

        $this->router->patch('/', 'index.php');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'PATCH',
            'middleware' => null
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_it_adds_only_middleware()
    {

        $this->router->get('/', 'index.php')->only('Auth');
        $expected = [
            'uri' => '/',
            'controller' => 'index.php',
            'method' => 'GET',
            'middleware' => 'Auth'
        ];

        $this->assertEquals($expected, $this->router->getRoutes()[0]);
    }

    public function test_there_are_no_routes()
    {
        $this->router = new Router();
        $this->assertEmpty($this->router->getRoutes());
    }

    /** @dataProvider routeNotFoundCases */
    public function test_it_throws_route_not_found_exception($uri, $method)
    {
        $this->router->get('/users', 'users.php');
        $this->router->post('/help', 'help.php');

        $this->expectException(RouteException::class);
        $this->router->route($uri, $method);
    }

    public static function routeNotFoundCases(): array
    {
        return [
            ['/users', 'post'],
            ['/help', 'patch'],
            ['/user', 'get'],
            ['/help', 'get']
        ];
    }
}
