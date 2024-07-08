<?php

use Eudu4rdo\RandomPokemon\Pokemon;

it('should return a random pokemon', function(){
    $fakeClient = getResponseCliente();

    $PokemonClass = new Pokemon($fakeClient);
    $pokemon = $PokemonClass->getPokemon();

    expect($pokemon)->toBeArray();
});
