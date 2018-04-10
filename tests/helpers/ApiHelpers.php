<?php
namespace Tests\Helpers;

trait ApiHelpers
{
    /**
     * Set required headers to request a JSON API endpoint.
     *
     * @param  User $user
     * @return array
     */
    protected function headers($user = null)
    {
        $headers = ['Accept' => 'application/json'];

        if (!is_null($user)) {
            $token                    = $user->createToken('test')->accessToken;
            $headers['Authorization'] = 'Bearer ' . $token;
        }
        return $headers;
    }

    /**
     * Set required headers to request an access token.
     *
     * @param  [type] $client
     * @param  User $user
     * @return array
     */
    protected function tokenHeaders($client, $user = null)
    {
        $headers                  = ['Accept' => 'application/json'];
        $headers['grant_type']    = 'password';
        $headers['client_id']     = $client->id;
        $headers['client_secret'] = $client->secret;
        $headers['username']      = '';
        $headers['password']      = '';

        if (!is_null($user)) {
            $headers['username'] = $user->email ?: $user->usuario;
            $headers['password'] = 'secret';
        }

        $headers['scope'] = '*';

        return $headers;
    }
}
