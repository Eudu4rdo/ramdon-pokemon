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

    public function getPokemon($identifier = null): array
    {
        if(is_null($identifier)) {
            $identifier = $this->randomizeId();
        }
        $response = $this->client->get(self::BASE_ENDPOINT.$identifier)->getBody()->getContents();
        return json_decode($response, true);
    }

    public function getAllPokemons()
    {
        $response = $this->client->get(self::BASE_ENDPOINT.'?limit='.self::TOTAL_POKEMON)->getBody()->getContents();
        return json_decode($response, true);
    }
}