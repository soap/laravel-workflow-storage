<?php

namespace Soap\WorkflowLoader\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Soap\WorkflowLoader\Models\Workflow;

class WorkflowFactory extends Factory
{
    protected $model = Workflow::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'type' => 'workflow',
            'description' => $this->faker->sentence,
            'supports' => [],
            'metadata' => [],
        ];
    }

    public function workflowType()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'workflow',
            ];
        });
    }

    public function stateMachineType()
    {
        return $this->state(function (array $attributes) {
            return [
                'type' => 'state_machine',
            ];
        });
    }

    public function supports(array $supports)
    {
        return $this->state(function (array $attributes) use ($supports) {
            return [
                'supports' => $supports,
            ];
        });
    }
}
