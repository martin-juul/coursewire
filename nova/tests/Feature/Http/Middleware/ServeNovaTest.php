<?php

namespace Laravel\Nova\Tests\Feature\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Laravel\Nova\Events\NovaServiceProviderRegistered;
use Laravel\Nova\Http\Middleware\ServeNova;
use Laravel\Nova\Tests\IntegrationTest;

class ServeNovaTest extends IntegrationTest
{
    public function setUp(): void
    {
        parent::setUp();

        $this->authenticate();
    }

    /**
     * Uses default path environment setup.
     */
    protected function usesDefaultPath($app)
    {
        $app['config']->set([
            'nova.domain' => 'http://localhost',
            'nova.path' => '/nova',
        ]);
    }

    /**
     * Uses custom subdomain with root path environment setup.
     */
    protected function usesCustomSubdomainWithRootPath($app)
    {
        $app['config']->set([
            'nova.domain' => 'http://nova.local',
            'nova.path' => '/',
        ]);
    }

    /**
     * @environment-setup usesDefaultPath
     */
    public function test_it_can_serve_from_default_path_will_trigger_service_provider_registered()
    {
        Event::fake();

        $this->get('/nova-api/users')->assertOk();

        Event::assertDispatched(NovaServiceProviderRegistered::class);
    }

    /**
     * @environment-setup usesCustomSubdomainWithRootPath
     */
    public function test_it_can_serve_from_subdomain_will_trigger_service_provider_registered()
    {
        Event::fake();

        $request = Request::create('http://nova.local/nova-api/users');

        $serveNova = new ServeNova();

        $response = $serveNova->handle($request, function (Request $request) {
            return 'OK';
        });

        $this->assertSame('OK', $response);

        Event::assertDispatched(NovaServiceProviderRegistered::class);
    }

    /**
     * @environment-setup usesDefaultPath
     */
    public function test_it_can_serve_from_default_path_will_not_trigger_service_provider_registered()
    {
        Event::fake();

        $this->app['router']->get('test', function (Request $request) {
            return 'OK';
        });

        $this->get('test')->assertOk();

        Event::assertNotDispatched(NovaServiceProviderRegistered::class);
    }

    /**
     * @environment-setup usesCustomSubdomainWithRootPath
     */
    public function test_it_can_serve_from_subdomain_will_not_trigger_service_provider_registered()
    {
        Event::fake();

        $this->app['router']->get('test', function (Request $request) {
            return 'OK';
        });

        $this->get('test')->assertOk();

        Event::assertNotDispatched(NovaServiceProviderRegistered::class);
    }
}
