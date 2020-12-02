<?php

namespace App\Http\Composers;

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
            ->name(config('branding.name'))
            ->alternateName(config('branding.acronym'))
            ->url(config('branding.url'))
            ->email(config('branding.email'))
            ->telephone(config('branding.phone'))
            ->address(
                Schema::postalAddress()
                ->streetAddress(config('branding.address.street'))
                ->addressLocality(config('branding.address.locality'))
                ->addressCountry(config('branding.address.country'))
                ->addressCountry(config('branding.address.country'))
            );

        $view->with([
            'ldschema' => $business->jsonSerialize(),
        ]);
    }
}
