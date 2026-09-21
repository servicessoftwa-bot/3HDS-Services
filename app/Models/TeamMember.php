<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class TeamMember extends Model
{
    protected $fillable = [
        'name',
        'role',
        'other_roles',
        'location',
        'photo',
        'order',
        'is_visible',
    ];

    protected $casts = [
        'is_visible' => 'boolean',
        'order' => 'integer',
    ];

    public function scopeVisible($query)
    {
        return $query->where('is_visible', true)->orderBy('order')->orderBy('id');
    }

    /**
     * Initials shown when there is no photo, e.g. "Ashiq Hussein Maither" -> "AM".
     */
    public function getInitialsAttribute(): string
    {
        $parts = preg_split('/\s+/', trim($this->name)) ?: [];
        $first = $parts[0] ?? '';
        $last = count($parts) > 1 ? end($parts) : '';

        return Str::upper(Str::substr($first, 0, 1).Str::substr($last, 0, 1));
    }

    /**
     * Extra roles, one per line in the admin form.
     */
    public function getOtherRolesListAttribute(): array
    {
        return array_values(array_filter(array_map('trim', preg_split('/\r\n|\r|\n/', (string) $this->other_roles))));
    }
}
