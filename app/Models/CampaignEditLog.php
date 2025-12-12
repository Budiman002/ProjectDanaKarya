<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CampaignEditLog extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'campaign_id',
        'user_id',
        'field_name',
        'old_value',
        'new_value',
        'edit_reason',
        'created_at',
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
