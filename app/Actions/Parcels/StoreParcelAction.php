<?php

namespace App\Actions\Parcels;

use App\Models\Parcel;
use Lorisleiva\Actions\Concerns\AsAction;

class StoreParcelAction
{
    use AsAction;

    public function rules(): array
    {
        return [
            'pick_up' => 'required',
            'drop_off' => 'required',
        ];
    }
    public function handle(Parcel $model, array $data): Parcel
    {
        $model->pick_up = $data['pick_up'];
        $model->drop_off = $data['drop_off'];
        $model->sender_id = App\Helpers\Helper::user();
        $model->save();
        return $model;
    }
}
