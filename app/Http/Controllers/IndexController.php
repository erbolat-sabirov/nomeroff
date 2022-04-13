<?php

namespace App\Http\Controllers;

use App\Services\Crud\WashingCrudService;
use App\ViewModels\Dashboard\IndexViewModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{

    public function __construct(private WashingCrudService $washingCrudService)
    {
    }

    public function index(Request $request)
    {
        return view('dashboard.index', new IndexViewModel(service:$this->washingCrudService, data:$request->all()));
    }

    public function list(Request $request)
    {
        return view('dashboard.list', new IndexViewModel(service:$this->washingCrudService, data:$request->all()));
    }
}