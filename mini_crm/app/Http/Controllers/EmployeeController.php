<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;
use App\Services\EmployeeService;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    private $employeeService;

    public function __construct(EmployeeService $employeeService)
    {
        $this->employeeService = $employeeService;
    }

    public function index(): View
    {
        $employees = $this->employeeService->getEmployees();
        return view('employees', compact('employees'));
    }

    public function store(StoreEmployeeRequest $request, $companyId)
    {
        $this->employeeService->storeEmployee($request, $companyId);

        return redirect()->back();
    }

    public function edit($employeeId)
    {
        $employee = $this->employeeService->getEmployee($employeeId);
        return view('employees.edit', compact('employee'));
    }

    public function update(UpdateEmployeeRequest $request, $employeeId)
    {
        $redirectUrl = $this->employeeService->updateEmployee($request, $employeeId);

        return redirect()->to($redirectUrl);
    }

    public function destroy($employeeId)
    {
        $this->employeeService->deleteEmployee($employeeId);
        return redirect()->back();
    }
}
