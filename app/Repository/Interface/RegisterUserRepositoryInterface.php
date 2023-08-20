<?php

namespace App\Repository\Interface;

interface RegisterUserRepositoryInterface
{

    
    /**
     * 회원 등록
     * @param string $email
     * @param string $name
     * 
     * @return int
     */
    public function save(
        string $email,
        string $name
    ): int;
}