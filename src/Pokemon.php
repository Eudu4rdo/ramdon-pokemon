<?php

namespace Eudu4rdo\RandomPokemon;

use GuzzleHttp\Client;

class Pokemon
{
    const BASE_ENDPOINT = 'https://pokeapi.co/api/v2/pokemon/';
    const TOTAL_POKEMON = 1015;
    public function __construct(private Client $client = new Client())
    {
    }

    public function randomizeId(): int
    {
        return rand(1, self::TOTAL_POKEMON);
    }

    public function getPokemon(int $id = null): array
    {
        if(is_null($id)) {
            $id = $this->randomizeId();
        }
        $response = $this->client->get(self::BASE_ENDPOINT.$id)->getBody()->getContents();
        return json_decode($response, true);
    }

}