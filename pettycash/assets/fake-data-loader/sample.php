<?php

require 'vendor/autoload.php'; // Include the Composer autoloader

use Faker\Factory;

$faker = Factory::create();

// Example: Generate and print a fake name
echo $faker->name;

// You can use other methods to generate different types of data
// For example:
// echo $faker->address;
// echo $faker->email;
// echo $faker->phoneNumber;

// Adjust the code based on your specific needs

