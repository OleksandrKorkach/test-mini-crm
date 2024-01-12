<?php

namespace App\Services;

use app\Http\Requests\Employee\StoreEmployeeRequest;
use app\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Models\Employee;

class EmployeeService
{
    public function getEmployees()
    {
        return Employee::paginate(10);
    }

    public function getEmployee($employeeId)
    {
        return Employee::query()->findOrFail($employeeId);
    }

    public function storeEmployee(StoreEmployeeRequest $request, $companyId)
    {
        $employeeData = [
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'company_id' => $companyId,
        ];

        Employee::create($employeeData);
    }

    public function updateEmployee(UpdateEmployeeRequest $request, $employeeId)
    {
        $employee = Employee::find($employeeId);
        $employee->update($request->validated());

        $companyId = $employee->company_id;

        return "/companies/edit/{$companyId}";
    }

    public function deleteEmployee($employeeId): void
    {
        Employee::query()->find($employeeId)->delete();
    }
}
