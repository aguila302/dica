<?php

namespace Tests\Helpers;

use Laravel\Passport\ClientRepository;
use Laravel\Passport\PersonalAccessClient;

trait ApiTokens
{
    protected function createPassportClients()
    {
        $this->afterApplicationCreated(function () {
            $this->artisan('passport:client', ['--personal' => true, '--name' => 'Testing Personal Grant Client']);
            $this->artisan('passport:client', ['--password' => true, '--name' => 'Testing Personal Grant Client']);
        });
    }

    /**
     * Create a new password grant client.
     *
     * @return \Laravel\Passport\Client
     */
    protected function createPasswordClient($user = null)
    {
        $userId = is_null($user) ?: $user->id;

        return (new ClientRepository)->createPasswordGrantClient(
            $userId, 'Testing Password Grant Client', $this->baseUrl
        );
    }

    /**
     * Create a new password grant client.
     *
     * @return \Laravel\Passport\Client
     */
    protected function createPersonalClient($user = null)
    {
        $userId = is_null($user) ?: $user->id;

        $client = (new ClientRepository)->createPersonalAccessClient(
            $userId, 'Testing Personal Grant Client', $this->baseUrl
        );

        $accessClient = new PersonalAccessClient();
        $accessClient->client_id = $client->id;
        $accessClient->save();

        return $client;
    }
}
