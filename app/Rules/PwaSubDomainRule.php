<?php

namespace App\Rules;

use App\Actions\Domain\DomainGetAction;
use App\Models\Application;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class PwaSubDomainRule implements ValidationRule
{
    private DomainGetAction $domainGetAction;

    public function __construct(private int $domain_id)
    {
        $this->domainGetAction =  app()->make(DomainGetAction::class);
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $domain = $this->domainGetAction->getById($this->domain_id);
        $pwa = Application::where('sub', $attribute)
            ->where('domain', $domain->domain)
            ->first();

        if ($pwa) {
            $fail('Subdomain and Domain already registered');
        }
    }
}
