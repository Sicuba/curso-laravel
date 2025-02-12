<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function index() {
        $companies = Company::all();
        return view('companies.index', compact('companies'));
    }
    
    public function create() {
        return view('companies.create');
    }
    
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
        ]);
    
        /* Company::create($request->all()); */
        $data = $request->except('_token');
        Company::create($data);
        return redirect()->route('companies.index');
    }
    
    public function edit(Company $company) {
        return view('companies.edit', compact('company'));
    }
    
    public function update(Request $request, Company $company) {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
        ]);
    
        $company->update($request->all());
        return redirect()->route('companies.index');
    }
    
    public function destroy(Company $company) {
        $company->delete();
        return redirect()->route('companies.index');
    }
    
}
