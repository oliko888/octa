<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{

    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);

        return view('company.index', ['companies' => $companies]);
    }


    public function create()
    {
        return view('company.create');
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'max:255|unique:companies,email',
            'logoUpload' => 'dimensions:min_width=100,min_height=100'
        ]);

        $company = new Company;
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logoUpload')) {
            $path = $request->file('logoUpload')->store(
                'logos', 'public'
            );
            $company->logo = $path;
        }

        $company->save();

        return redirect()->route('company.index')->with(['success' => 'Record has been stored!']);
    }


    public function show($id)
    {
        $company = Company::find($id);

        return view('company.show', ['company' => $company]);
    }


    public function edit($id)
    {
        $company = Company::find($id);

        return view('company.edit', ['company' => $company]);
    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => ['max:255', 'email', Rule::unique('companies')->ignore($id)],
            'logoUpload' => 'dimensions:min_width=100,min_height=100'
        ]);

        $company = Company::find($id);
        $company->name = $request->name;
        $company->email = $request->email;
        $company->website = $request->website;

        if ($request->hasFile('logoUpload')) {
            $path = $request->file('logoUpload')->store(
                'logos', 'public'
            );
            $company->logo = $path;
        }

        $company->save();

        return redirect()->route('company.index')->with(['success' => 'Record has been updated!']);
    }


    public function destroy($id)
    {
        Company::find($id)->delete();

        return redirect(route('company.index'));
    }
}
