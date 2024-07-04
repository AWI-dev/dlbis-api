<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Auth\EmployeeInformationModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\ResponseBuilderHelper;
use App\Helpers\ResponseMessageHelper;

class CredentialController extends Controller
{
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
}
