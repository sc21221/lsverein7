<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\Pivot;

class MemberSection extends Pivot
{
    use HasFactory;

    protected $table = "member_section";
    public $incrementing = true;

    protected $guarded = [];

    protected $casts = [
        'from' => 'date',
        'to' => 'date',
    ];

    protected $appends = ['age'];
    public static ?Carbon $_keyDate = null;

    public static function getKeyDate(): Carbon
    {
        if (static::$_keyDate === null)
            static::$_keyDate = now()->endOfDay();
        return static::$_keyDate->copy();
    }

    public function member():BelongsTo
    {
        return $this->belongsTo(Member::class);
    }

    public function section(): BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function range(): string
    {
        return getRange($this->from, $this->to, 'm.Y');
    }

    public function gone()
    {
        return inRange($this->to, null, self::getKeyDate());
    }

    public function age(): int
    {
        $keyDate = $this->gone() ? $this->to : self::getKeyDate() ?? now();
        return (int)$this->from->diffInYears($keyDate);
    }


}
