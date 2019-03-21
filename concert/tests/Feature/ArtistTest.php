<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtistTest extends TestCase
{
    public function testList()
    {
        $this->get('/artist')
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
            'name' => 'artist',
        ];
        $this->post('/artist/create', $data)
            ->assertJson([
                'name' => $data['name'],
            ]);
    }

    public function testUpdate()
    {
        $data = [
            'name' => 'артист',
        ];

        $response = json_decode($this->json('post', '/artist/create', $data)->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new артист',
        ];

        $this->post('/artist/update', $data_new)
            ->assertJson([
                'name' => $data_new['name'],
        ]);
    }

    public function testDelete()
    {
        $data = [
            'name' => 'артист',
        ];

        $response = json_decode($this->json('post', '/artist/create', $data)->getContent());

        $data_del = [
            'id' => $response->id,
            'name' => 'new',
        ];

        $this->post('/artist/delete', $data_del)
            ->assertJson([
                'status' => true,
        ]);
    }
}
