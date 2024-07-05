<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\CredentialModel;
use App\Models\Auth\EmployeeInformationModel;
use App\Traits\ResponseTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseBuilderHelper;
use App\Helpers\ResponseMessageHelper;
use DB;

class CredentialController extends Controller
{
    use ResponseTrait;
    public function onLogin(Request $request)
    {
        $fields = $request->validate([
            'employee_id' => 'required',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt(['employee_id' => $fields['employee_id'], 'password' => $fields['password']])) {
            $token = auth()->user()->createToken('appToken')->plainTextToken;
            $employeeDetailsModel = EmployeeInformationModel::find(auth()->user()->id);
            $fullName = trim(
                ($employeeDetailsModel->prefix ? $employeeDetailsModel->prefix . ' ' : '') .
                $employeeDetailsModel->first_name . ' ' .
                ($employeeDetailsModel->middle_name ? $employeeDetailsModel->middle_name . ' ' : '') .
                $employeeDetailsModel->last_name .
                ($employeeDetailsModel->suffix ? ' ' . $employeeDetailsModel->suffix : '')
            );
            $employeeDetails = [
                'employee_id' => $employeeDetailsModel->employee_id,
                'prefix' => $employeeDetailsModel->prefix,
                'first_name' => $employeeDetailsModel->first_name,
                'middle_name' => $employeeDetailsModel->middle_name,
                'last_name' => $employeeDetailsModel->last_name,
                'suffix' => $employeeDetailsModel->suffix,
                'company_email' => $employeeDetailsModel->company_email,
                'full_name' => $fullName
            ];

            $data = [
                'token' => $token,
                'employee_details' => $employeeDetails,
            ];
            return ResponseBuilderHelper::dataResponse('success', 200, ResponseMessageHelper::onAuthenticate('Login', 1), $data);
        } else {
            return ResponseBuilderHelper::dataResponse('error', 404, ResponseMessageHelper::onAuthenticate('Login', 0), null);
        }
    }

    public function onLogout(Request $request)
    {
        try {
            auth()->user()->tokens()->delete();
            return ResponseBuilderHelper::dataResponse('success', 200, ResponseMessageHelper::onAuthenticate('Logout', 1), null);
        } catch (Exception $exception) {
            $response = [
                'message' => 'Logout unsuccessful',
                'errors' => $exception->getMessage()
            ];
            return ResponseBuilderHelper::dataResponse('error', 400, ResponseMessageHelper::onAuthenticate('Logout', 0), null);
        }
    }

    public function onCreate(Request $request)
    {
        $fields = $request->validate([
            'employee_id' => 'required|unique:credentials,employee_id',
            'password' => 'required|min:6',
            'prefix' => 'nullable|string',
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'suffix' => 'nullable|string',
            'role' => 'required',
            'company_email' => 'required|email|unique:credential_employee_informations,company_email',
            'created_by_id' => 'required'
        ]);
        try {
            DB::beginTransaction();
            $credential = new CredentialModel();
            $credential->fill($fields);
            $credential->save();

            $employeeInformation = new EmployeeInformationModel();
            $employeeInformation->fill($fields);
            $employeeInformation->save();
            DB::commit();
            return $this->dataResponse('success', 201, 'Credentials ' . __('msg.create_success'));
        } catch (Exception $exception) {
            DB::rollBack();
            return $this->dataResponse('error', 400, $exception->getMessage());
        }
    }
}
