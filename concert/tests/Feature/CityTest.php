<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CityTest extends TestCase
{
    public function testList()
    {
        $this->get('/city')
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                ],
            ]);
    }

    public function testCreate()
    {
        $data = [
            'name' => 'city',
        ];
        $this->post('/city/create', $data)
            ->assertJson([
                'name' => $data['name'],
            ]);
    }

    public function testUpdete()
    {
        $data = [
            'name' => 'city',
        ];
        $response = json_decode($this->post('/city/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new city',
        ];
        $this->post('/city/update', $data_new)
            ->assertJson([
                'name' => $data_new['name'],
            ]);
    }

    public function testDelete()
    {
        $data = [
            'name' => 'city',
        ];
        $response = json_decode($this->post('/city/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'city',
        ];
        $this->post('/city/delete', $data_new)
            ->assertJson([
                'status' => true,
            ]);
    }
}
