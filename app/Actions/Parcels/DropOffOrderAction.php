<?php

namespace App\Actions\Parcels;

use App\Enums\ParcelStatus;
use App\Models\Parcel;
use App\Helpers\Helper;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class DropOffOrderAction
{
    use AsAction, WithAttributes;

    public function authorize()
    {
        return true;
    }


    /**
     * @param  Parcel $parcel
     * @param  array         $data
     * @return mixed
     */
    public function handle(Parcel $parcel, array $data): Parcel
    {
        $parcel->update([
            'status' => ParcelStatus::Fulfilling(),
            'drop_off' => now(),
        ]);

        return $parcel;
    }
}
