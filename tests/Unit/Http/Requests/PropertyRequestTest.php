<?php

namespace Tests\Unit\Http\Requests;

use App\Models\Property;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class PropertyRequestTest extends TestCase
{
    use RefreshDatabase;

    private string $routePrefix = 'api.properties.';

    /**
     * @test
     * @throws \Throwable
     */
    public function type_is_required()
    {
        $validatedField = 'type';
        $brokenRule = null;

        $property = Property::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $property->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function type_must_not_exceed_20_characters()
    {
        $validatedField = 'type';
        $brokenRule = Str::random(21);

        $property = Property::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $property->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function price_is_required()
    {
        $validatedField = 'price';
        $brokenRule = null;

        $property = Property::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $property->toArray()
        )->assertJsonValidationErrors($validatedField);
    }

    /**
     * @test
     * @throws \Throwable
     */
    public function price_must_be_an_integer()
    {
        $validatedField = 'price';
        $brokenRule = 'not-integer';

        $property = Property::factory()->make([
            $validatedField => $brokenRule
        ]);

        $this->postJson(
            route($this->routePrefix . 'store'),
            $property->toArray()
        )->assertJsonValidationErrors($validatedField);
    }
}
