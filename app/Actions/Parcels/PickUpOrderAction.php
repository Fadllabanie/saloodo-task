<?php

namespace App\Actions\Parcels;

use App\Enums\ParcelStatus;
use App\Models\Parcel;
use App\Helpers\Helper;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class PickUpOrderAction
{
    use AsAction, WithAttributes;

    public function authorize()
    {
        return true;
    }

    /**
     * @param  Parcel $parcel
     * @param  array   $data
     * @return mixed
     */
    public function handle(Parcel $parcel, array $data): Parcel
    {
        throw_if($parcel->biker_id != null ,'This parcel have biker');

        $parcel->update([
            'biker_id' => Helper::user()->id,
            'status' => ParcelStatus::Processing(),
            'pick_up_at' => now(),
        ]);

        return $parcel;
    }
}
