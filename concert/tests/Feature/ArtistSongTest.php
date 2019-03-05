<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtistSongTest extends TestCase
{
    public function testList()
    {
        $this->get('/artistsong')
            ->assertJsonStructure([
                '*' => [
                    'id',
                    'artist_id',
                    'song_id'
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

        $data_song = [
            'name' => 'song',
        ];
        $response_song = json_decode($this->post('/song/create', $data_song)
            ->getContent());

        $data = [
            'artist_id' => $response_artist->id,
            'song_id' => $response_song->id,
        ];
        $this->post('/artistsong/create', $data)
            ->assertJson([
                'artist_id' => $data['artist_id'],
                'song_id' => $data['song_id'], 
            ]);
    }

    public function testDelete()
    {
        $data_artist = [
            'name' => 'artist',
        ];
        $response_artist = json_decode($this->post('/artist/create', $data_artist)
            ->getContent());

        $data_song = [
            'name' => 'song',
        ];
        $response_song = json_decode($this->post('/song/create', $data_song)
            ->getContent());

        $data = [
            'artist_id' => $response_artist->id,
            'song_id' => $response_song->id,
        ];
        $response = json_decode($this->post('/artistsong/create', $data)
            ->getContent());

        $data = [
            'id' => $response->id,
            'artist_id' => $response_artist->id,
            'song_id' => $response_song->id,
        ];
        $this->post('/artistsong/delete', $data)
            ->assertJson([
                'status' => true,
            ]);
    }
}
