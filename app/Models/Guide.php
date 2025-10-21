<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * @property-read int $id
 * @property string $name
 * @property int $experience_years
 * @property bool $is_active
 */
final class Guide extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function huntingTours(): HasMany
    {
        return $this->hasMany(HuntingBooking::class);
    }
}
