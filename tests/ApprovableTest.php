<?php

use RingleSoft\LaravelProcessApproval\Facades\ProcessApproval;
use RingleSoft\LaravelProcessApproval\Tests\Dummy\TestModel;

it('can define a Process Approval Flow', function () {
    $testInstance = TestModel::create();

    $this->assertDatabaseHas($testInstance->getTable(), [
        'id' => $testInstance->id,
    ]);

    $flow = ProcessApproval::createFlow('Test Flow', TestModel::class);

    $this->assertDatabaseHas($flow->getTable(), [
        'id' => $flow->id,
        'name' => 'Test Flow',
    ]);

    ProcessApproval::createStep($flow->id, 1, 'APPROVE');
    ProcessApproval::createStep($flow->id, 2, 'APPROVE');
    ProcessApproval::createStep($flow->id, 3, 'APPROVE');

    $this->assertDatabaseHas($flow->steps()->getRelated()->getTable(), [
        'process_approval_flow_id' => $flow->id,
        'role_id' => 1,
        'action' => 'APPROVE',
        'active' => 1,
    ]);

    $this->assertDatabaseHas($flow->steps()->getRelated()->getTable(), [
        'process_approval_flow_id' => $flow->id,
        'role_id' => 2,
        'action' => 'APPROVE',
        'active' => 1,
    ]);

    $this->assertDatabaseHas($flow->steps()->getRelated()->getTable(), [
        'process_approval_flow_id' => $flow->id,
        'role_id' => 3,
        'action' => 'APPROVE',
        'active' => 1,
    ]);
});
