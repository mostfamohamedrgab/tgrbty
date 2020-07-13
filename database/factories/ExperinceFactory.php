<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Experience as Exp;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Exp::class, function (Faker $faker) {
    return [
      'title' => 'تجربة ' . $faker->number,
      'slug' => Str::slug('تجربة'),
      'img' => '676372860ba7a055236f9028d03254ba26ed4.jpg',
      'content' => '<p>At Loram, the value we provide is measurable. Loram&rsquo;s Value Equation quantifies the ROI of your maintenance of way practices and the impact it delivers to your bottom line. We inherently understand your goals and the real challenges you face. Loram&rsquo;s powerful and unique advantage of designing, engineering, manufacturing and operating our equipment solutions allows our maintenance of way services to add extraordinary value to your business. Driving improved quality and productivity. Reducing your costs. Maximizing the value of your track assets. Loram delivers.</p>',
      'user_id' => 1,
      'section_id' => 1,
      'approved' => 1
    ];
});
