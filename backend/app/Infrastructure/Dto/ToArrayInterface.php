<?php
declare(strict_types=1);


namespace App\Infrastructure\Dto;

interface ToArrayInterface
{
    /**
     * @return array
     */
    public function toArray(): array;
}
