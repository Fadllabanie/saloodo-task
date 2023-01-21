<?php

namespace App\Actions\Parcels;

use App\Models\Parcel;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteParcelAction
{
    use AsAction;

    public function handle($parcel)
    {
        return Parcel::find($parcel)->delete();
    }
}
