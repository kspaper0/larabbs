<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Auth;

class UserRequest extends FormRequest
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
            'name' => 'required|between:3,25|regex:/^[A-Za-z0-9\-\_]+$/|unique:users,name,' . Auth::id(),
            'email' => 'required|email',
            'introduction' => 'max:80',
            'avatar' => 'mimes:jpeg,bmp,png,gif|dimensions:min_width=200,min_height=200',
        ];

        //regex:/^[A-Za-z0-9-_]+$/ —— 正则表达式，过滤只允许字母大小写、数字、横杆和下划线；
        //unique:users,name,' . Auth::id() —— unique 数据库唯一，在 users 数据表里，字段为 name，Auth::id() 指示将此 ID 排除在外。
        //格式为 unique:table,column,except,idColumn
    }

    public function messages()
    {
        return [
            'name.unique' => 'The username has been occupied',
            'name.regex' => 'The username only support English characters, Numbers, Dash and Underscore',
            'name.between' => 'The length of username mush be 3 - 25',
            'name.required' => 'The username must not be empty',
            'avatar.mimes' => 'The icon must be format: (.jpeg, .bmp, .png and .gif)',
            'avatar.dimensions' => 'The pixels must be at least 200 x 200',
        ];
    }
}
