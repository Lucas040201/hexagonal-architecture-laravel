<?php

namespace App\Http\Requests;

use App\Core\Application\User\DTO\UserDTO;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateUserRequestController extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'surname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ];
    }

    protected function failedValidation(Validator $validator)
	{
		$errors = (new ValidationException($validator))->errors();
		$errors = str_replace("\n", ". \n", implode("\n" , array_map(function ($arr) {
			return implode("\n" , $arr);
		}, $errors)));
		throw new HttpResponseException(
			response()->json(['Success' => false, 'message' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
		);
    }

    public function createDTO()
    {
        $data = $this->all();
        return new UserDTO(...$data);
    }
}
