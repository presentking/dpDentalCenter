<?php

namespace Tests\Unit;

use App\Models\Specialization;
use PHPUnit\Framework\TestCase;

class SpecializationTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_example(): void
    {
        $spec = Specialization::factoty()->create(['name' => 'test1', 'description' => 'testTest']);
        $this->assertEquals('test1', $spec->name);
    }
}
