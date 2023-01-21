<?php

namespace App\Http\Requests;

use App\Helpers\Helper;
use App\Models\Parcel;
use Illuminate\Foundation\Http\FormRequest;

class ParcelRequest extends FormRequest
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
            'name' => 'required',
            'pick_up' => 'required',
            'drop_off' => 'required',
        ];
    }

    public function add()
    {
       Parcel::create([
        'name' => $this['name'],
        'pick_up' => $this['pick_up'],
        'drop_off' => $this['drop_off'],
        'sender_id' => Helper::user()->id,
       ]);
    }
}
