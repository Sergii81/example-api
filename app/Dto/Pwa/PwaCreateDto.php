<?php

namespace App\Dto\Pwa;

use App\Actions\Domain\DomainGetAction;
use App\Actions\Onesignal\OnesignalCreateAppAction;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Ramsey\Uuid\UuidInterface;

class PwaCreateDto
{
    /**
     * @param string $app_uuid
     * @param string $domain
     * @param string $sub
     * @param string $template
     * @param string|null $app_lang
     * @param string $owner_id
     * @param string $geo
     * @param string|null $pixel_id
     * @param string|null $pixel_key
     * @param string|null $link
     * @param string $onesignal
     * @param string $whitepage
     * @param string|null $status
     */
    public function __construct(
        private string $app_uuid,
        private string $domain,
        private string $sub,
        private string $template,
        private ?string $app_lang,
        private string $owner_id,
        private string $geo,
        private ?string $pixel_id,
        private ?string $pixel_key,
        private ?string $link,
        private string $onesignal,
        private string $whitepage,
        private ?string $status
    ) {
    }

    /**
     * @param Request $request
     * @return static
     * @throws BindingResolutionException
     */
    public static function fromRequest(Request $request): static
    {
        return new static(
            app_uuid: self::generateUuid(),
            domain: self::getDomainName($request->domain_id),
            sub: $request->subdomain,
            template: $request->template,
            app_lang: $request->app_lang,
            owner_id: $request->owner_id,
            geo: $request->geo,
            pixel_id: $request->pixel_id,
            pixel_key: $request->pixel_key,
            link: $request->link,
            onesignal: self::getOnesignalId(self::getDomainName($request->domain_id), $request->subdomain),
            whitepage: $request->whitepage,
            status: 1
        );
    }

    /**
     * @return UuidInterface
     */
    private static function generateUuid(): UuidInterface
    {
        return Str::orderedUuid();
    }

    /**
     * @param string $domain
     * @param string $subdomain
     * @return mixed
     * @throws BindingResolutionException
     */
    private static function getOnesignalId(string $domain, string $subdomain): mixed
    {
        $onesignalCreateAppAction = app()->make(OnesignalCreateAppAction::class);
        $data = [
            'domain' => $domain,
            'subdomain' => $subdomain
        ];
        $onesignal = $onesignalCreateAppAction->execute($data);

        if ($onesignal) {

            return $onesignal->id;
        } else {

            throw new \Exception('Opensignal received error, see log');
        }
    }

    private static function getDomainName(int $domainId)
    {
        $domainGetAction = app()->make(DomainGetAction::class);
        $domain = $domainGetAction->getById($domainId);

        return $domain->domain;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @return string
     */
    public function getDomain(): string
    {
        return $this->domain;
    }

    /**
     * @return string
     */
    public function getWhitepage(): string
    {
        return $this->whitepage;
    }

    /**
     * @return string
     */
    public function getTemplate(): string
    {
        return $this->template;
    }

    /**
     * @return string
     */
    public function getSub(): string
    {
        return $this->sub;
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
    public function getPixelKey(): ?string
    {
        return $this->pixel_key;
    }

    /**
     * @return string|null
     */
    public function getLink(): ?string
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getGeo(): string
    {
        return $this->geo;
    }

    /**
     * @return string|null
     */
    public function getAppLang(): ?string
    {
        return $this->app_lang;
    }

    /**
     * @return string
     */
    public function getAppUuid(): string
    {
        return $this->app_uuid;
    }

    /**
     * @return string
     */
    public function getOnesignal(): string
    {
        return $this->onesignal;
    }

    /**
     * @return string
     */
    public function getOwnerId(): string
    {
        return $this->owner_id;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
