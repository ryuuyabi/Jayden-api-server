<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent Model Class
 *
 * @method static \Illuminate\Database\Eloquent\Builder|static query()
 * @method static \Illuminate\Database\Eloquent\Builder|static create(array $attributes = [])
 * @method static \Illuminate\Database\Eloquent\Builder|static find(mixed $id, array $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|static findOrFail(mixed $id, array $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|static first(array $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|static firstOrFail(array $columns = ['*'])
 * @method static \Illuminate\Database\Eloquent\Builder|static firstOrCreate(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|static firstOrNew(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|static updateOrCreate(array $attributes, array $values = [])
 * @method static \Illuminate\Database\Eloquent\Builder|static where(string $column, mixed $operator = null, mixed $value = null, string $boolean = 'and')
 * @method static \Illuminate\Database\Eloquent\Builder|static orWhere(string $column, mixed $operator = null, mixed $value = null)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereIn(string $column, mixed $values)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereNotIn(string $column, mixed $values)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereNull(string $column)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereNotNull(string $column)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereBetween(string $column, array $values)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereNotBetween(string $column, array $values)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereDate(string $column, string $operator, mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereMonth(string $column, string $operator, mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereDay(string $column, string $operator, mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereYear(string $column, string $operator, mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|static whereTime(string $column, string $operator, mixed $value)
 * @method static \Illuminate\Database\Eloquent\Builder|static orderBy(string $column, string $direction = 'asc')
 * @method static \Illuminate\Database\Eloquent\Builder|static latest(string $column = null)
 * @method static \Illuminate\Database\Eloquent\Builder|static oldest(string $column = null)
 * @method static \Illuminate\Database\Eloquent\Builder|static with(array|string $relations)
 * @method static \Illuminate\Database\Eloquent\Builder|static has(string $relation)
 * @method static \Illuminate\Database\Eloquent\Builder|static doesntHave(string $relation)
 * @method static \Illuminate\Database\Eloquent\Builder|static withCount(array|string $relations)
 * @method static \Illuminate\Database\Eloquent\Collection|static[] get(array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static|null first(array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static firstOrNew(array $attributes, array $values = [])
 * @method \Illuminate\Database\Eloquent\Model|static firstOrCreate(array $attributes, array $values = [])
 * @method \Illuminate\Database\Eloquent\Model|static updateOrCreate(array $attributes, array $values = [])
 * @method \Illuminate\Database\Eloquent\Model|static|static[] all(array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static|static[] findMany(array|Arrayable $ids, array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static|null find(mixed $id, array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static findOrFail(mixed $id, array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static|static[] findOrNew(mixed $id, array $columns = ['*'])
 * @method \Illuminate\Database\Eloquent\Model|static forceCreate(array $attributes)
 * @method \Illuminate\Database\Eloquent\Model|static forceFill(array $attributes)
 * @method \Illuminate\Database\Eloquent\Model|static|int|mixed increment(string $column, float|int $amount = 1, array $extra = [])
 * @method \Illuminate\Database\Eloquent\Model|static|int|mixed decrement(string $column, float|int $amount = 1, array $extra = [])
 * @method \Illuminate\Database\Eloquent\Model|static|bool insert(array $values)
 * @method \Illuminate\Database\Eloquent\Model|static|int update(array $values)
 * @method \Illuminate\Database\Eloquent\Model|static updateOrInsert(array $attributes, array $values = [])
 * @method \Illuminate\Database\Eloquent\Model|static delete()
 * @method \Illuminate\Database\Eloquent\Model|static forceDelete()
 * @method \Illuminate\Database\Eloquent\Model|static restore()
 * @method \Illuminate\Database\Eloquent\Model|static fresh(array $with = [])
 * @method \Illuminate\Database\Eloquent\Model|static repopulate()
 * @method \Illuminate\Database\Eloquent\Model|static replicate(array $except = null)
 * @method \Illuminate\Database\Eloquent\Model|static fill(array $attributes)
 * @method \Illuminate\Database\Eloquent\Model|static save(array $options = [])
 * @method \Illuminate\Database\Eloquent\Model|static touch()
 * @method \Illuminate\Database\Eloquent\Model|static softDelete()
 * @method \Illuminate\Database\Eloquent\Model|static|null getKey()
 * @method \Illuminate\Database\Eloquent\Model|static|null getKeyName()
 * @method \Illuminate\Database\Eloquent\Model|static|null getTable()
 * @method \Illuminate\Database\Eloquent\Model|static|null getConnectionName()
 */
abstract class BaseModel extends Model
{
    protected const SELECT_INDEX = [];
    protected const SELECT_SHOW = [];
}
