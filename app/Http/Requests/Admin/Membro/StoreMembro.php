<?php

namespace App\Http\Requests\Admin\Membro;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreMembro extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.membro.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'phone' => ['nullable', 'string'],
            'address' => ['nullable', 'string'],
            'marital_status' => ['required'],
            'personality' => ['nullable'],
            'description' => ['nullable', 'string'],
            'isBaptized' => ['required', 'boolean'],
            'isLeader' => ['required', 'boolean'],
            'isPastor' => ['required', 'boolean'],
            'status' => ['required'],
            'spouse_name' => ['nullable', 'string'],
            'wedding_date' => ['nullable', 'date'],
            'baptized_date' => ['nullable', 'date'],
            'discipler' => ['nullable', 'string'],

        ];
    }

    public function getStatusId()
    {
        if ($this->has('status')) {
            return $this->get('status')['id'];
        }
        return null;
    }

    public function getMinisterios(): array
    {
        if ($this->has('ministerios')) {
            $ministerios = $this->get('ministerios');
            return array_column($ministerios, 'id');
        }
        return [];
    }

    public function getCursos(): array
    {
        if ($this->has('cursos')) {
            $cursos = $this->get('cursos');
            return array_column($cursos, 'id');
        }
        return [];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();

        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
