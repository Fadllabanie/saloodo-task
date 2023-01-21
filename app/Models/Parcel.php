<?php

namespace App\Models;

use App\Helpers\Helper;
use App\Enums\ParcelStatus;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Parcel extends Model
{
    use HasFactory;

    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => ParcelStatus::class,
    ];


    protected $fillable = [
        'uuid',
        'sender_id',
        'biker_id',
        'name',
        'pick_up',
        'drop_off',
        'pick_up_at',
        'drop_off_at',
        'status',
    ];

    public function scopeNew($query)
    {
       return $query->whereNull('biker_id')->where('status',ParcelStatus::New());
    } 
    public function scopeMine($query)
    {
     //  return $query->where('biker_id',Helper::user('biker')->id);
       return $query->where('sender_id',Helper::user()->id);
    } 
    public function scopeMineAsBiker($query)
    {
      return $query->where('biker_id',Helper::user()->id);
    }
     public function scopeFinished($query)
    {
       return $query->where('status',ParcelStatus::Fulfilling());
    } 
    public function scopeProcessing($query)
    {
       return $query->where('status',ParcelStatus::Processing());
    }

    public function biker()
    {
        return $this->BelongsTo(User::class,'biker_id');
    }
    public function sender()
    {
        return $this->BelongsTo(User::class,'sender_id');
    }
}
