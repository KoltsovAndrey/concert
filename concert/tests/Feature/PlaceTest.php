<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use function GuzzleHttp\json_decode;

class PlaceTest extends TestCase
{
    public function testList()
    {
        $this->get('/place')
            ->assertJsonStructure([
                '*' => [
                    'name',
                    'city_id'
                ],
            ]);
    }

    public function testCreate()
    {
        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $this->post('place/create', $data)
            ->assertJson([
                'name' => $data['name'],
                'city_id' => $data['city_id'],
            ]);
    }

    public function testUpdate()
    {
        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $response = json_decode($this->post('place/create', $data)->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new place',
            'city_id' => $response->city_id,
        ];
        $this->post('place/update', $data_new)
            ->assertJson([
                'name' => $data_new['name'],
                'city_id' => $data_new['city_id'],
            ]);
    }

    public function testDelete()
    {
        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $response = json_decode($this->post('place/create', $data)->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'place',
            'city_id' => $response->city_id,
        ];
        $this->post('place/delete', $data_new)
            ->assertJson([
                'status' => true,
            ]);
    }
}
