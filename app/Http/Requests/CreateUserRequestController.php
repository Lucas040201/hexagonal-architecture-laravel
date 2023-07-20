<?php

namespace App\Http\Requests;

use App\Http\Requests\interface\RequestInterface;
use Core\Application\Users\CreateUser\CreateUserDTO;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

class CreateUserRequestController extends FormRequest implements RequestInterface
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

    public function createDTO(): CreateUserDTO
    {
        $data = $this->all();
        return new CreateUserDTO(
            $data['name'],
            $data['surname'],
            $data['email'],
            $data['password'],
        );
    }
}
