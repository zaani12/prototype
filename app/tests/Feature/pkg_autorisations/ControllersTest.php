<?php

namespace Tests\Feature\pkg_autorisations;

use Tests\TestCase;
use App\Models\pkg_autorisations\Controller;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ControllersTest extends TestCase
{
    use DatabaseTransactions;

    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new Controller;
    }

    public function test_paginate_controllers(): void
    {
        $controllers = $this->model->paginate(2);
        $this->assertNotNull($controllers);
        $this->assertNotEmpty($controllers);
    }

    public function test_create_controller(): void
    {
        $data = ['nom' => "TestController"];

        $this->model->create($data);
        $this->assertDatabaseHas('controllers', ['nom' => $data['nom']]);
    }


    public function test_update_controller(): void
    {
        $existingController = $this->model->create(['nom' => 'ExistingController']);

        $newName = 'UpdatedController';
        $existingController->update(['nom' => $newName]);

        $this->assertEquals($newName, $existingController->nom);
        $this->assertDatabaseHas('controllers', ['nom' => $newName]);

    }


    public function test_delete_controller(): void
    {
        $existingController = $this->model->create(['nom' => 'ExistingController']);

        $existingController->delete();

        $this->assertDatabaseMissing('controllers', ['id' => $existingController->id]);
    }


}
