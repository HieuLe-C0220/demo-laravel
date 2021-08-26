<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\rules\CauVanHoa;
use App\rules\QuanHopLe;

class StorePostRequest extends FormRequest
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
            'title' => [
                'required',
                'max:25',
                'min:2',
                new CauVanHoa
            ],
            'category_id' => 'required|exists:categories,id',
            'city_id' =>'required|number',
            'quan_id' =>[
                'required',
                'number',
                new QuanHopLe($this)
            ]
        ];
    }

    public function messages() {
        return[
            'title.max' => 'Tiêu đề không được dài quá'
        ];
    }
}
