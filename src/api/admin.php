<?php
/**
 * Watchlater
 *
 * @package    Watchlater
 * @subpackage Api
 */

namespace Watchlater\Api;

use Ramsey\Uuid\Uuid;
use Firebase\JWT\JWT;
use Tuupola\Base62;

/**
 * Controller to handle JWT tokens
 *
 * @package    Watchlater
 * @subpackage Api
 */
class Admin
{
    /**
     * JWT secret
     *
     * @var string
     */
    private $jwt_secret;

    /**
     * JWT algorithm
     *
     * @var string
     */
    private $jwt_algorithm;

    /**
     * JWT authorized applications
     *
     * @var array
     */
    private $jwt_applications;

    /**
     * Create a new Admin
     *
     * @param string $jwt_algorithm     Algorithm use for the token generation
     * @param string $jwt_secret        Secret use for the token generation
     * @param array  $jwt_applications  Available applications for the token
     */
    public function __construct(string $jwt_secret, string $jwt_algorithm, array $jwt_applications)
    {
        $this->jwt_secret = $jwt_secret;
        $this->jwt_algorithm = $jwt_algorithm;
        $this->jwt_applications = $jwt_applications;
    }

    /**
     * Generate a JWT token
     *
     * @param string username use in the payload
     * @param array  authorized applications for the token
     * @return array [token, expires] JWT token, expiration date
     */
    public function token(string $username, array $applications): array
    {
        $apps = array_filter($applications, function ($needle) {
            return in_array($needle, $this->jwt_applications);
        });
        $now = new \DateTime();
        $future = new \DateTime("now +2 hours");
        $jti = (new Base62)->encode(random_bytes(16));
        $payload = [
            'iat' => $now->getTimeStamp(),
            'exp' => $future->getTimeStamp(),
            'jti' => $jti,
            //'sub' => $id_user,
            'usr' => $username,
            'app' => $apps
        ];
        $token = JWT::encode($payload, $this->jwt_secret, $this->jwt_algorithm);
        $data = array(
            'token' => $token,
            'expires' => $future->getTimeStamp());
        return $data;
    }
}
