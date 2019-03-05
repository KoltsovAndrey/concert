<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SongTest extends TestCase
{
    public function list()
    {
        $this->get('/song')
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
            'name' => 'song',
        ];

        $this->post('/song/create', $data)
            ->assertJson([
                'name' => $data['name'],
            ]);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'song',
        ];

        $response = json_decode($this->post('/song/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new song',
        ];

        $this->post('/song/update', $data_new)
            ->assertJson([
                'name' => $data_new['name'],
            ]);
    }

    public function testDelete()
    {
        $data = [
            'name' => 'song',
        ];

        $response = json_decode($this->post('/song/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'song',
        ];

        $this->post('/song/delete', $data_new)
            ->assertJson([
                'status' => true,
            ]);
    }
}
