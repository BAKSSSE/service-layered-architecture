<?php
namespace App\Http\Controllers\Users;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Symfony\Component\HttpFoundation\Response;

class UserController
{
    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index(Request $request)
    {
        return view('user.index', [
        ]);
    }
    public function store(Request $request)
    {
        if ($this->userService->exists($this->email)) {
            return redirect('/users');
            // return response('', Response::HTTP_OK);
        }   

        $id = $this->userService->store($request->email, $request->name);
        return response('',Response::HTTP_CREATED)
                ->header('Location', '/');
    }

}