<?php

namespace App\Dto\Pwa;

use App\Models\Application;
use Illuminate\Http\Request;

class PwaUpdateDto
{

    /**
     * @param string|null $sub
     * @param string|null $app_lang
     * @param string|null $geo
     * @param string|null $pixel_id
     * @param string|null $pixel_key
     * @param string|null $link
     * @param string|null $whitepage
     * @param string|null $status
     */
    public function __construct(
        //private string $domain,
        private ?string $sub,
        //private string $template,
        private ?string $app_lang,
        private ?string $geo,
        private ?string $pixel_id,
        private ?string $pixel_key,
        private ?string $link,
        private ?string $whitepage,
        private ?string $status
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        /** @var Application $pwa */
        $pwa = Application::query()->where('id', $request->id)->first();

        return new static(
            //domain: self::getDomainName($request->domain_id),
            sub: $request->subdomain ?: $pwa->sub,
            //template: $request->template,
            app_lang: $request->app_lang ?: $pwa->app_lang,
            geo: $request->geo ?: $pwa->geo,
            pixel_id: $request->pixel_id ?: $pwa->pixel_id,
            pixel_key: $request->pixel_key ?: $pwa->pixel_key,
            link: $request->link ?: $pwa->link,
            whitepage: $request->whitepage ?: $pwa->whitepage,
            status: $request->status ?: $pwa->status,
        );
    }

    /**
     * @return string|null
     */
    public function getPixelKey(): ?string
    {
        return $this->pixel_key;
    }

    /**
     * @return string|null
     */
    public function getPixelId(): ?string
    {
        return $this->pixel_id;
    }

    /**
     * @return string|null
     */
    public function getAppLang(): ?string
    {
        return $this->app_lang;
    }

    /**
     * @return string|null
     */
    public function getGeo(): ?string
    {
        return $this->geo;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @return string|null
     */
    public function getSub(): ?string
    {
        return $this->sub;
    }

    /**
     * @return string|null
     */
    public function getWhitepage(): ?string
    {
        return $this->whitepage;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
