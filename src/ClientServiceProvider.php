<?php

namespace Deviate\Clients;

use Illuminate\Support\ServiceProvider;

class ClientServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerUserClients();
        $this->registerOrganisationClients();
        $this->registerUsergroupClients();
        $this->registerActivityClients();
    }

    private function registerUserClients()
    {
        $this->app->bind(Users\Contracts\AuthenticatesUsersClientInterface::class, Users\AuthenticatesUsersClient::class);
        $this->app->bind(Users\Contracts\CreatesUsersClientInterface::class, Users\CreatesUsersClient::class);
        $this->app->bind(Users\Contracts\DeletesUsersClientInterface::class, Users\DeletesUsersClient::class);
        $this->app->bind(Users\Contracts\FetchesUsersClientInterface::class, Users\FetchesUsersClient::class);
        $this->app->bind(Users\Contracts\UpdatesUsersClientInterface::class, Users\UpdatesUsersClient::class);

        $this->app->bind(Users\Contracts\SearchClientInterface::class, Users\SearchClient::class);
        $this->app->bind(Users\Contracts\AvatarsClientInterface::class, Users\AvatarsClient::class);
    }

    private function registerOrganisationClients()
    {
        $this->app->bind(Organisations\Contracts\ClientInterface::class, Organisations\Client::class);
        $this->app->bind(Organisations\Contracts\SearchClientInterface::class, Organisations\SearchClient::class);
    }

    private function registerUsergroupClients()
    {
        $this->app->bind(Usergroups\Contracts\UsergroupsClientInterface::class, Usergroups\UsergroupsClient::class);
        $this->app->bind(Usergroups\Contracts\MembershipClientInterface::class, Usergroups\MembershipClient::class);
        $this->app->bind(Usergroups\Contracts\SearchClientInterface::class, Usergroups\SearchClient::class);
        $this->app->bind(Usergroups\Contracts\PermissionsClientInterface::class, Usergroups\PermissionsClient::class);
    }

    private function registerActivityClients()
    {
        $this->app->bind(Activities\Contracts\CollectionsClientInterface::class, Activities\CollectionsClient::class);
        $this->app->bind(Activities\Contracts\SearchClientInterface::class, Activities\SearchClient::class);
        $this->app->bind(Activities\Contracts\ActivitiesClientInterface::class, Activities\ActivitiesClient::class);
        $this->app->bind(Activities\Contracts\BookingsClientInterface::class, Clients\ActivityBookingsClient::class);
        $this->app->bind(Activities\Contracts\SearchBookingsClientInterface::class, Activities\SearchBookingsClient::class);
        $this->app->bind(Activities\Contracts\InvitationsClientInterface::class, Activities\InvitationsClient::class);
        $this->app->bind(Activities\Contracts\SearchInvitationsClientInterface::class, Activities\SearchInvitationsClient::class);
    }
}
