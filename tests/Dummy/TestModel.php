<?php

namespace RingleSoft\LaravelProcessApproval\Tests\Dummy;

use RingleSoft\LaravelProcessApproval\Traits\Approvable;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static static create(array $extra = [])
 * @method static|\Illuminate\Database\Eloquent\Builder whereNotState(string $fieldNames, $states)
 * @method static|\Illuminate\Database\Eloquent\Builder whereState(string $fieldNames, $states)
 * @method static static query()
 * @method static self find(int $id)
 * @property string|null message
 * @property int id
 */
class TestModel extends Model
{
    use Approvable;

    protected $guarded = [];

    protected $dispatchesEvents = [
        //'updating' => TestModelUpdatingEvent::class,
    ];

    public function getTable()
    {
        return 'test_models';
    }
}
