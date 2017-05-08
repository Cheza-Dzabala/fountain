<?php
    namespace App\Classes\websystem;

    use App\employers;
    use App\Http\Requests\newEmployerRequest;
    use App\Http\Requests\updateEmployerRequest;
    use App\User;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class employersClass {

        public function saveNewEmployer(newEmployerRequest $request)
        {
            $this->createEmployer($request);
            return redirect()->route('employers');
        }

        public function viewEmployer($name)
        {
            $employer = employers::whereName($name)->first();

            $user = User::whereId($employer->createdBy)->first();

            $employer = array_add($employer, 'user', $user->name);

            return view('employers.view', compact('employer'));
        }

        public function edit($name)
        {
            $employer = employers::whereName($name)->first();
            return view('employers.update', compact('employer'));
        }

        public function delete($id)
        {
            $employer = employers::whereId($id)->first();
            $employer->delete();
            return redirect()->route('employers');
        }

        public function updateEmployer(Request $request, $id)
        {
            $input = $request->all();
            $employer = employers::whereId($id)->first();
            $employer->fill($input);
            $employer->save();
            return redirect()->route('employers');
        }

        /**
         * @param newEmployerRequest $request
         */
        private function createEmployer(newEmployerRequest $request)
        {
            $newEmployer = employers::create([
                'name' => $request->name,
                'contactPerson' => $request->contactPerson,
                'primaryContactNumber' => $request->primaryContactNumber,
                'secondaryContactNumber' => $request->secondaryContactNumber,
                'physicalAddress' => $request->physicalAddress,
                'postalAddress' => $request->postalAddress,
                'emailAddress' => $request->emailAddress,

                'createdBy' => Auth::user()['id']
            ]);
        }

    }
?>