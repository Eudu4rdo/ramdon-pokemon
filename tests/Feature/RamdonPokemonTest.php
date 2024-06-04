<?php

use Eudu4rdo\RandomPokemon\Pokemon;

it('should return a ramdon pokemon', function(){
    $fakeClient = getResponseCliente();

    $PokemonClass = new Pokemon($fakeClient);
    $pokemon = $PokemonClass->getPokemon();

    expect($pokemon)->toBeArray();
});
