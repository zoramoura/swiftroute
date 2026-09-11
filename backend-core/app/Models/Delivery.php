<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class Delivery extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'uuid',
        'tracking_number',
        'sender_id',
        'receiver_id',
        'status',
        'notes',
    ];

    /**
     * Auto-generate UUID on model creation (ADR-004)
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->uuid)) {
                $model->uuid = (string) Str::uuid();
            }
        });
    }

    public function sender(): BelongsTo
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver(): BelongsTo
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }

    public function statusLogs(): HasMany
    {
        return $this->hasMany(StatusLog::class);
    }
}