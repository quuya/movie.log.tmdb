<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'movie_title'=>'required',
            'main_character'=>'required',

        ];
    }

public function messages(){
    return [
        'movie_title'=>'タイトルを入力してください。',
        'main_character'=>'主演を入力してください。',
    ];
}

}
