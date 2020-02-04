<?php

namespace App\Http\Controllers;

use App\Services\EmployeesService;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    private $employeesService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(EmployeesService $employeesService)
    {
        $this->employeesService = $employeesService;
    }

    public function index()
    {
        return $this->employeesService->getAll();
    }

    public function show($id)
    {
        return $id;
    }

    public function store(Request $request)
    {
        $this->employeesService->store($request->all());
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy(Request $request, $id)
    {

    }
}
