<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ChoiseTest extends TestCase
{
    public function testList()
    {
        $this->get('/choise')
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'user_id',
                    'concert_id',
                    'song_id',
                    'date',
                ],
            ]);
    }

    public function testCreate()
    {
        $data_song = [
            'name' => 'song',
        ];
        $response_song = json_decode($this->post('/song/create', $data_song)
            ->getContent());

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

        $data_concert = [
            'name' => 'concert',
            'cost' => '1000',
            'count' => '500',
            'artist_id' => $response_artist->id,
            'place_id' => $response_place->id,
        ];
        $response_consert = json_decode($this->post('/concert/create', $data_concert)
            ->getContent());

        $user = factory('App\User')->create();
        
        $data = [
            'user_id' => $user->id,
            'concert_id' => $response_consert->id,
            'song_id' => $response_song->id,
            'date' => '2019-03-05',
        ];
        $this->post('/choise/create', $data)
            ->assertJson([
                'user_id' => $data['user_id'],
                'concert_id' => $data['concert_id'],
                'song_id' => $data['song_id'],
                'date' => $data['date'],
            ]);
    }
}
