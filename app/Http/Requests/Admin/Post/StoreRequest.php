<?php

namespace App\Http\Requests\Admin\Post;

use App\Models\Post;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|string',
            'content' => 'required|string',
            'main_image' => 'required|file',
            'preview_image' => 'required|file',
            'category_id' => 'required|integer|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Это поле необходимо для заполнения',
            'title.string' => 'Только строковый параметр',
            'content.required' => 'Это поле необходимо для заполнения',
            'content.string' => 'Только строковый параметр',
            'main_image.required' => 'Вы не добавили обложку',
            'main_image.file' => 'Недопустимое значение',
            'preview_image.required' => 'Вы не добавили превью',
            'preview_image.file' => 'Недопустимое значение',
            'category_id.required' => 'нет ID категории',
            'category_id.integer' => 'ID категории должен быть числом',
            'category_id.exists' => 'В базе нет этого ID для категории',
            'tag_ids.array' => 'Необходимо отправить массив данных',

        ];
    }
}

