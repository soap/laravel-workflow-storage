<?php

namespace Soap\WorkflowLoader\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Soap\WorkflowLoader\DatabaseLoader;
use Soap\WorkflowLoader\Enums\WorkflowTypeEnum;

class Workflow extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'supports' => 'array',
        'metadata' => 'array',
        'marking_store' => 'array',
        'type' => WorkflowTypeEnum::class,
    ];

    public function getTable(): string
    {
        return app(DatabaseLoader::class)->getWorkflowTableName();
    }

    public function states(): HasMany
    {
        return $this->hasMany(WorkflowState::class);
    }

    public function transitions(): HasMany
    {
        return $this->hasMany(WorkflowTransition::class);
    }
}
