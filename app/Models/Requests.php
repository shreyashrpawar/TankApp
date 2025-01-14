<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class Requests extends Model
{
    protected $table = 'requests';
        /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'GST_number',
        'transactionType',
        'hashTag',
        'points',
        'date'
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
