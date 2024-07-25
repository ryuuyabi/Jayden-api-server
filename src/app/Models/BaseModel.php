<?php

namespace App\Models;

use App\Enums\IsActive;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    protected const SELECT_INDEX = [];
    protected const SELECT_SHOW = [];

    public function bulkSave(array $data): void
    {
        $this->fill($data)->save();
    }

    /**
     *  scope
     */

    public function isTrashed(): bool
    {
        return $this->whereNotNull('deleted_at')->exists();
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', IsActive::ON);
    }

    public function scopeDeleted(Builder $query): void
    {
        $query->whereNotNull('deleted_at');
    }

    public function scopeNotDeleted(Builder $query): void
    {
        $query->whereNull('deleted_at');
    }

    /**
     * attribute
     */

    public function getCreatedAtSlashAttribute(): string
    {
        return $this->created_at->format('Y/m/d');
    }

    public function getUpdatedAtSlashAttribute(): string
    {
        return $this->updated_at->format('Y/m/d');
    }
}
