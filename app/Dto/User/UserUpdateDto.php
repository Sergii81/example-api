<?php

namespace App\Dto\User;


use Illuminate\Http\Request;

class UserUpdateDto
{
    /**
     * @param string|null $username
     * @param string|null $password
     * @param int|null $role
     * @param int|null $status
     * @param string|null $token
     */
    public function __construct(
        private readonly ?string $username,
        private readonly ?string $password,
        private readonly ?int $role,
        private readonly ?int $status,
        private readonly ?string $token
    ) {
    }

    /**
     * @param Request $request
     * @return static
     */
    public static function fromRequest(Request $request): static
    {
        return new static(
            username: $request->username ?? null,
            password: $request->new_password ? md5($request->new_password) : null,
            role: $request->role ?? null,
            status: $request->status ?? 0,
            token: md5($request->password.$request->username.$request->uuid),
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
     * @return string|null
     */
    public function getUsername(): ?string
    {
        return $this->username;
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
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
