<?php
declare(strict_types=1);

namespace App\Http\Composers;

use App\Assets\Logo;
use Illuminate\View\View;
use Spatie\SchemaOrg\Schema;

class JsonLdComposer implements ViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param \Illuminate\View\View $view
     *
     * @return void
     */
    public function compose(View $view): void
    {
        $business = Schema::educationalOrganization()
            ->name(nova_get_setting('branding.name', config('branding.name')))
            ->alternateName(nova_get_setting('branding.acronym', config('branding.acronym')))
            ->url(nova_get_setting('branding.url', config('branding.url')))
            ->email(nova_get_setting('branding.email', config('branding.email')))
            ->telephone(nova_get_setting('branding.phone', config('branding.phone')))
            ->address(
                Schema::postalAddress()
                    ->streetAddress(nova_get_setting('branding.street', config('branding.address.street')))
                    ->addressLocality(nova_get_setting('branding.locality', config('branding.address.locality')))
                    ->addressCountry(nova_get_setting('branding.country', config('branding.address.country')))
                    ->postalCode(nova_get_setting('branding.postal_code', config('branding.address.postal_code')))
            );

        $ldWebpage = Schema::webPage()
            ->url(config('app.url'))
            ->name(config('app.name'))
            ->publisher(
                Schema::organization()
                    ->name(config('branding.name'))
                    ->logo(
                        Schema::imageObject()
                            ->url(secure_url(Logo::banner()))
                            ->setProperty('height', 384)
                            ->setProperty('width', 649)
                    )
            );

        $view->with([
            'ldschema'  => $business->jsonSerialize(),
            'ldwebpage' => $ldWebpage->jsonSerialize(),
        ]);
    }
}
