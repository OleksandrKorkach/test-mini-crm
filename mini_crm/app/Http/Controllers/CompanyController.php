<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Models\Company;
use App\Services\CompanyService;
use Illuminate\View\View;

class CompanyController extends Controller
{
    protected $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }


    public function index(): View
    {
        $companies = $this->companyService->getCompanies();

        return view('companies', compact('companies'));
    }

    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->storeCompany($request);

        return redirect()->route('companies.index');
    }

    public function create(): View
    {
        return view('companies.create');
    }

    public function show(Company $company)
    {
        //
    }

    public function edit($companyId): View
    {
        $company = $this->companyService->getCompany($companyId);

        return view('companies.edit', compact('company'));
    }

    public function update(UpdateCompanyRequest $request, $companyId)
    {
        $company = $this->companyService->getCompany($companyId);
        $this->companyService->updateCompany($company, $request->validated());

        return redirect()->back();
    }

    public function destroy($companyId)
    {
        $this->companyService->deleteCompany($companyId);
        return redirect()->back();
    }
}
