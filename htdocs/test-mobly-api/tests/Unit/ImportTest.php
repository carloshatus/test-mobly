<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Services\ImportService;

class ImportTest extends TestCase
{
    public $service;

    public function setUp(): void
    {
        parent::setUp();
        $this->service = new ImportService;
    }

    /**
     * @covers App\Services\ImportService::import
     */
    public function testImport()
    {
        $response = $this->service->import();
        $this->assertTrue($response);
    }
}
