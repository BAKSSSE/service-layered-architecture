<?php

namespace App\Services;
use App\Repository\Interface\RegisterUserRepositoryInterface;

class UserService
{

    private $registerUserRepository;

    public function __construct(RegisterUserRepositoryInterface $registerUserRepository)
    {

        $this->registerUserRepository = $registerUserRepository;
    }

    public function exists(string $email): bool
    {


    }

    public function store(string $email, string $name): int
    {
        $id = $this->registerUserRepository->save($email, $name);

        // 메일 전송, 관리자 로그 etc
        return $id;
    }
}