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
     * Admin
     *
     * @var Admin
     */
    private $api;

    /**
     * Token
     *
     * @var Token
     */
    private $token;

    /**
     * Create a new Router controller
     *
     * @param \Interop\Container\ContainerInterface $container ContainerInterface
     */
    public function __construct(\Interop\Container\ContainerInterface $container)
    {
        $this->logger = $container->logger;
        $this->api = $container->api;
        $this->token = $container->token->decoded;
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

    /**
     * [POST] Claim a JWT token
     *
     * The Response is a json message including the 'token'
     *
     * @param Request   $request  The current Request object
     * @param Response  $response The current Response object
     * @param Response  $args     The additional arguments
     * @return Response The updated Response object in (json)
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function token(Request $request, Response $response, array $args): Response
    {
        $this->logger->info("Route '/' token");

        $username = $request->getParsedBodyParam('username');
        $applications = $request->getParsedBodyParam('applications');
        $data = $this->api->token($username, $applications);

        return $response->withJson($data, 201);
    }

    /**
     * [GET] Ping the server in a restricted area
     *
     * The Response is a json message including the 'token'
     *
     * @param Request   $request  The current Request object
     * @param Response  $response The current Response object
     * @param Response  $args     The additional arguments
     * @return Response The updated Response object in (json)
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function adminPing(Request $request, Response $response, array $args): Response
    {
        $this->logger->info("Route '/' adminPing");

        if (in_array('Watchlater', $this->token->app)) {
            $data = array('message' => 'success!');
            $response = $response->withJson($data);
            return $response;
        } else {
            /* No scope so respond with 401 Unauthorized */
            return $response->withStatus(401);
        }
    }
}
