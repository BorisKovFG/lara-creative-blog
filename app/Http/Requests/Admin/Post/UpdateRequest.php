<?php

namespace App\Http\Requests\Admin\Post;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $minLengthOfContent = 50;

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
            'content' => 'required|string|min:' . $this->minLengthOfContent,
            'preview_image' => 'nullable|file',
            'main_image' => 'nullable|file',
            'category_id' => 'required|exists:categories,id',
            'tag_ids' => 'nullable|array',
            'tag_ids.*' => 'nullable|integer|exists:tags,id'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Заполните поле title',
            'title.string' => 'В поле title можно ввести только строку',
            'content.required' => 'Заполните поле content',
            'content.min' => 'Поле content минимум ' . $this->minLengthOfContent .' символов',
            'preview_image.required' => 'Добавьте preview',
            'preview_image.file' => 'В поле должен быть file',
            'main_image.file' => 'В поле должен быть file',
            'main_image.required' => 'Добавьте главный рисунок',
            'category_id.required' => 'Выберите категорию'
        ];
    }
}
