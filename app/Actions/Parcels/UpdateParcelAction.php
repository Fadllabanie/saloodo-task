<?php

namespace App\Actions\Parcels;

use App\Models\Parcel;
use Illuminate\Http\Client\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class UpdateParcelAction
{
    use AsAction, WithAttributes;

    public function rules(): array
    {
        return [
            'pick_up' => 'required',
            'drop_off' => 'required',
        ];
    }
    public function handle(Parcel $model, Request $request): Parcel
    {

        $model->update([
            'pick_up' => $request->get('pick_up'),
            'drop_off' => $request->get('drop_off'),
        ]);
        return $model;
    }
}
