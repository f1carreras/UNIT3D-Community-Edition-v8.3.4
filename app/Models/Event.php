<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE.
 *
 * UNIT3D Community Edition is open-sourced software licensed under the GNU Affero General Public License v3.0
 * The details is bundled with this project in the file LICENSE.txt.
 *
 * @project    UNIT3D Community Edition
 *
 * @author     Roardom <roardom@protonmail.com>
 * @license    https://www.gnu.org/licenses/agpl-3.0.en.html/ GNU Affero General Public License v3.0
 */

namespace App\Models;

use App\Traits\Auditable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Event.
 *
 * @property int                             $id
 * @property string                          $name
 * @property string                          $icon
 * @property string                          $description
 * @property \Illuminate\Support\Carbon|null $starts_at
 * @property \Illuminate\Support\Carbon|null $ends_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 */
class Event extends Model
{
    use Auditable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

    /**
     * Get the attributes that should be cast.
     *
     * @return array{starts_at: 'datetime', ends_at: 'datetime'}
     */
    protected function casts(): array
    {
        return [
            'starts_at' => 'datetime',
            'ends_at'   => 'datetime',
        ];
    }

    /**
     * Has many claimed prizes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<ClaimedPrize, $this>
     */
    public function claimedPrizes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(ClaimedPrize::class);
    }

    /**
     * Has many prizes.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany<Prize, $this>
     */
    public function prizes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Prize::class);
    }
}
