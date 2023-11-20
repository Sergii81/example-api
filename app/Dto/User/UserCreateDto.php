<?php

namespace App\Dto\User;

use Illuminate\Http\Request;

class UserCreateDto
{
    /**
     * @param string $uuid
     * @param string $username
     * @param string $password
     * @param int|null $role
     * @param string|null $token
     * @param int|null $status
     */
    public function __construct(
        private readonly string $uuid,
        private readonly string $username,
        private readonly string $password,
        private readonly ?int $role,
        private readonly ?string $token,
        private readonly ?int $status
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        return new static(
            uuid: $request->uuid,
            username: $request->username,
            password: md5($request->password),
            role: $request->role ?? null,
            token: md5($request->password.$request->username.$request->uuid),
            status: $request->status ?? 1
        );
    }

    /**
     * @return int|null
     */
    public function getStatus(): ?int
    {
        return $this->status;
    }

    /**
     * @return int|null
     */
    public function getRole(): ?int
    {
        return $this->role;
    }

    /**
     * @return string|null
     */
    public function getToken(): ?string
    {
        return $this->token;
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return md5($this->password);
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
