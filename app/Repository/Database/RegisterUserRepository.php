<?php

namespace App\Repository\Database;
use App\Repository\Interface\RegisterUserRepositoryInterface;
use Illuminate\Database\DatabaseManager;
// use Illuminate\Support\Facades\DB;

class RegisterUserRepository implements RegisterUserRepositoryInterface
{
    protected $db;

    public function __construct(
        DatabaseManager $db
    ) {
        //쿼리 빌터 사용시 컨스트럭터 인젝션으로 외부에서 제공함으로써 확장성, 테스트 용이성을 유지
        $this->db = $db;
    }

    public function save(
        string $email,
        string $name
    ): int {

        $query = $this->db->connection();
        // beginTransction()
        $result = $query->table('user')
        ->insertGetId([
            'email' => $email, 
            'name' => $name
        ]);
        //commit()

        return $result; 
    }
}