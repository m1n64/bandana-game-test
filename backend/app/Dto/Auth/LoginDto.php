<?php
declare(strict_types=1);


namespace App\Dto\Auth;

use App\Infrastructure\Dto\ToArrayInterface;

class LoginDto implements ToArrayInterface
{
    /**
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public string $email,
        public string $password,
    )
    {
    }

    /**
     * @return array{email: string, password: string}
     */
    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
