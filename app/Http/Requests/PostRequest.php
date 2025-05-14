<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    // authorize メソッドはユーザー管理をして、機能の制限をしたい時に使うのですが、今回そういったことをしないので、その場合は、return true としておく必要があります。
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    // rules メソッドですが、こちらにバリデーションのルールを書いていきます
    public function rules(): array
    {
        return [
            //
            'title' => 'required',
            'body' => 'required|min:5',
        ];
    }
}
