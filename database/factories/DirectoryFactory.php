<?php

use Faker\Generator as Faker;

$factory->define(App\Model\directory::class, function (Faker $faker) {
    return [
            'name' => $faker->jobTitle,
            'description' => $faker->realText($maxNbChars = 200, $indexSize = 2),
            'website' => $faker->url,
            'email' => $faker->freeEmail,
            'phone_no' => $faker->tollFreePhoneNumber,
            'address' => $faker->address,
            'filename' => $faker->imageUrl($width = 640, $height = 480),
    ];
});
