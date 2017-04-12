<?php
/**
 * Watchlater
 *
 * @package    Watchlater
 * @subpackage Api
 */

namespace Watchlater\Api;

use Slim\Http\Request;
use Slim\Http\Response;

/**
 * Controller to handle routes
 *
 * Each function is a callback which implements this signature
 * <code>
 *     public function callback(Request $request, Response $response, array $args): Response
 * </code>
 *
 * @package    Watchlater
 * @subpackage Api
 * @see        src/api/routes.php
 */
class Router
{
    /**
     * Logger
     *
     * @var Logger
     */
    private $logger;

    /**
     * Downloader
     *
     * @var Downloader
     */
    private $api;

    /**
     * Create a new Router controller
     *
     * @param \Interop\Container\ContainerInterface $container ContainerInterface
     */
    public function __construct(\Interop\Container\ContainerInterface $container)
    {
        $this->logger = $container->logger;
        $this->api = $container->api;
    }

    /**
     * [GET] Basic route to test the routing
     *
     * The Response is a json message "Hello $name" with the attribute 'name' of the request
     *
     * @param Request   $request  The current Request object
     * @param Response  $response The current Response object
     * @param Response  $args     The additional arguments
     * @return Response The updated Response object in (json)
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function hello(Request $request, Response $response, array $args): Response
    {
        // Sample log message
        $this->logger->info("Route '/' hello");

        $name = $request->getAttribute('name');

        $data = array('message' => "Hello $name");
        $response = $response->withJson($data);
        return $response;
    }
}
