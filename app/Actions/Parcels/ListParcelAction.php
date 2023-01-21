<?php

namespace App\Actions\Parcels;

use App\Models\Parcel;
use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Lorisleiva\Actions\Concerns\AsAction;
use Lorisleiva\Actions\Concerns\WithAttributes;

class ListParcelAction
{
    use AsAction, WithAttributes;

    /**
     * Determine if the user is authorized to make this action.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the action.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id'     => 'sometimes',
            'action' => 'sometimes|in:query,get,count,paginate,first,firstOrFail',
        ];
    }

    /**
     * Execute the action and return a result.
     *
     * @return Collection
     */
    public function handle($attributes = [])
    {
        $this->fill($attributes);
        $this->validateAttributes();

        $query = Parcel::query();

        $query = (new QueryBuilder($query))
            ->defaultSort('-created_at')
            ->allowedIncludes(['redeemable'])
            ->allowedFilters([
                AllowedFilter::scope('search'),
            ])
            ->allowedSorts(['id', 'created_at', 'updated_at']);

        if ($this->has('id')) {
            $query->whereId($this->get('id'));
        }

        if ($this->get('action') == 'paginate' || !$this->has('action')) {
            return $query->paginate($attributes['paginate'] ?? null);
        }

        if ($this->get('action') == 'query') {
            return $query;
        }

        return $query->{$this->action}();
    }
}
