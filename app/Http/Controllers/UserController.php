<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserListRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    //SHOWING LIST OF USERS
    public function index(UserListRequest $request)
    {
        //RETRIEVE THE PARAMS
        $sortField = $request->input('sort_field', 'id');
        $sortOrder = $request->input('sort_order', 'asc');
        $keyword = $request->input('keyword');
        $perPage = !is_null($request->input('per_page')) ? $request->input('per_page') : config('constant.CRUD.PER_PAGE');
        $page = !is_null($request->input('page')) ? $request->input('page') : config('constant.CRUD.PAGE');

        //RETRIEVE THE DATA
        $users = $this->userService->listAllUser($perPage, $sortField, $sortOrder, $keyword);

        //BREAD CRUMBS
        $breadcrumbs = [
            'Admin'             => route('admin.user.index'), // Replace 'admin.dashboard' with your actual admin route
            'User Management'   => route('admin.user.index'), // Replace 'user.index' with your actual user index route
            'Detail'            => null, // Replace null with your actual detail URL if available
        ];

        //DISPLAY THE VIEW
        return view('admin.pages.user.index', compact('users', 'breadcrumbs', 'sortField', 'sortOrder', 'perPage', 'page', 'keyword'));
    }

    public function create(Request $request)
    {
        $breadcrumb = [
            "level1text"   => "Admin",
            "level2text"   => "User Management",
            "level3text"   => "Add",
        ];

        dd("hello sam");

        return view('admin.pages.user.add', compact('breadcrumb'));
    }

    public function detail(UserListRequest $request)
    {
        $userId = $request->id;


        $data = $this->userService->getUserDetail($userId);

         //BREAD CRUMBS
         $breadcrumbs = [
            'Admin'             => route('admin.user.index'), // Replace 'admin.dashboard' with your actual admin route
            'User Management'   => route('admin.user.index'), // Replace 'user.index' with your actual user index route
            'Detail'            => null, // Replace null with your actual detail URL if available
        ];

        return view('admin.pages.user.detail', compact('breadcrumbs', 'data'));
    }

    public function userDemoPage(Request $request)
    {
        return view('admin.pages.user.useronlypage', [
            'message' => "Hello User, Thanks for using our products",
        ]);
    }
}
