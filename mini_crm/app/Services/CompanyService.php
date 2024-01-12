<?php

namespace App\Services;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Models\Company;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;

class CompanyService
{
    public function getCompanies(): LengthAwarePaginator
    {
        return Company::paginate(10);
    }

    public function storeCompany(StoreCompanyRequest $request): void
    {
        $logoPath = $request->file('logo')->store('public');
        $logoPath = str_replace('public/', '', $logoPath);

        Company::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'website' => $request->input('website'),
            'logo' => $logoPath,
        ]);
    }

    public function getCompany($companyId)
    {
        return Company::query()->findOrFail($companyId);
    }

    public function updateCompany($company, array $data): void
    {
        $company->update($data);
    }

    public function deleteCompany($companyId): void
    {
        Company::query()->find($companyId)->delete();
    }

}
