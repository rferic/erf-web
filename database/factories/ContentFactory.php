<?php

use Faker\Generator as Faker;
use Faker\Provider\HtmlLorem;

$factory->define(App\Content::class, function (Faker $faker) {
    return [
        'key' => $faker->word,
        'id_html' => $faker->word,
        'class_html' => $faker->word,
        'text' => $faker->randomHtml(2, 5),
        'styles' => $faker->url,
        'css_inject' => $faker->word,
        'js_inject' => 'console.log("' . $faker->word . '")',
        'priority' => $faker->numberBetween(0, 10)
    ];
});
