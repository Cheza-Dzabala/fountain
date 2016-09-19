<?php

namespace App\Http\Controllers;

use App\employers;
use Illuminate\Http\Request;
use App\Classes\websystem\employersClass;
use App\Http\Requests;

class employerController extends Controller
{
    //
    public function index()
    {
        $employers = employers::get();
        return view('employers.index', compact('employers'));
    }


    public function viewEmployer($name)
    {
        $employerClass = new employersClass();
        $viewEmployer = $employerClass->viewEmployer($name);
        return $viewEmployer;
    }

    public function editEmployer($name)
    {
        $employerClass = new employersClass();
        $editEmployer = $employerClass->edit($name);
        return $editEmployer;
    }


    public function newEmployer()
    {
        return view('employers.new');
    }

    public function saveNew(Requests\newEmployerRequest $request)
    {
        $employerClass = new employersClass();
        $saveEmployer = $employerClass->saveNewEmployer($request);
        return $saveEmployer;
    }


    public function updateEmployer(Request $request, $id)
    {
        $employerClass = new employersClass();
        $updateEmployer = $employerClass->updateEmployer($request, $id);
        return $updateEmployer;
    }

    public function deleteEmployer($id)
    {
        $employerClass = new employersClass();
        $deleteEmployer = $employerClass->delete($id);
        return $deleteEmployer;
    }
}
