<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ConcertTest extends TestCase
{
    public function testList()
    {
        $this->get('/concert')
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'name',
                    'cost',
                    'count',
                    'artist_id',
                    'place_id',
                ],
            ]);
    }

    public function testCreate()
    {
        $data_artist = [
            'name' => 'artist',
        ];
        $response_artist = json_decode($this->post('/artist/create', $data_artist)
            ->getContent());

        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data_place = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $response_place = json_decode($this->post('place/create', $data_place)
            ->getContent());

        $data = [
            'name' => 'concert',
            'cost' => '1000',
            'count' => '500',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $this->post('/concert/create', $data)
            ->assertJson([ 
                'name' => $data['name'],
                'cost'=> $data['cost'],
                'count' => $data['count'],
                'artist_id' => $data['artist_id'],
                'place_id' => $data['place_id'],
            ]);
    }

    public function testUpdate()
    {
        $data_artist = [
            'name' => 'artist',
        ];
        $response_artist = json_decode($this->post('/artist/create', $data_artist)
            ->getContent());

        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data_place = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $response_place = json_decode($this->post('place/create', $data_place)
            ->getContent());

        $data = [
            'name' => 'concert',
            'cost' => '1000',
            'count' => '500',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $response = json_decode($this->post('/concert/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new concert',
            'cost' => '1001',
            'count' => '501',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $this->post('/concert/update', $data_new)
            ->assertJson([
                'name' => $data_new['name'],
                'cost' => $data_new['cost'],
                'count' => $data_new['count'],
                'artist_id' => $data_new['artist_id'],
                'place_id' => $data_new['place_id'],
            ]);
    }

    public function testDelete()
    {
        $data_artist = [
            'name' => 'artist',
        ];
        $response_artist = json_decode($this->post('/artist/create', $data_artist)
            ->getContent());

        $data_city = [
            'name' => 'city',
        ];
        $response_city = json_decode($this->post('/city/create', $data_city)->getContent());

        $data_place = [
            'name' => 'place',
            'city_id' => $response_city->id,
        ];
        $response_place = json_decode($this->post('place/create', $data_place)
            ->getContent());

        $data = [
            'name' => 'concert',
            'cost' => '1000',
            'count' => '500',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $response = json_decode($this->post('/concert/create', $data)
            ->getContent());

        $data_new = [
            'id' => $response->id,
            'name' => 'new concert',
            'cost' => '1001',
            'count' => '501',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $this->post('/concert/delete', $data_new)
            ->assertJson([
                'status' => true,
            ]);
    }
}
