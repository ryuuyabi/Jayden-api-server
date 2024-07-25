<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

final class Operator extends BaseModel
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'sub',
        'personal_name',
        'nickname',
        'email',
        'ip_address',
        'tmp_password',
        'role',
        'is_notion',
        'is_active',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'sub',
        'tmp_password',
        'ip_address',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'is_notion' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    public function createPersonalName(string $nickname): string
    {
        return "@{$nickname}";
    }

    public function scopeSelectIndex(Builder $query)
    {
        $query->select(['id', 'personal_name', 'nickname', 'email', 'role', 'is_notion', 'is_active']);
    }

    public function scopeSelectShow(Builder $query)
    {
        $query->select(['id', 'personal_name', 'nickname', 'email', 'role', 'is_notion', 'is_active']);
    }

    public function scopeWhereRequest(Builder $query, Request $request): void
    {
        if ($request->get('id')) {
            $query->where('id', $request->id);
        }
        if ($request->get('personal_name')) {
            $query->where('personal_name', $request->personal_name);
        }
        if ($request->get('email')) {
            $query->where('email', $request->email);
        }
    }
}
