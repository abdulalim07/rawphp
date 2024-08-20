<?php

require 'vendor/autoload.php';

use Faker\Factory;

$faker = Factory::create();

$pdo = new PDO('mysql:host=localhost;dbname=pettycash', 'pettycash', 'pettycash');

for ($i = 0; $i <= 100; $i++) {
    $account_name = $faker->numberBetween(1, 47);
    $account_type = $faker->randomElement([1, 2]);
    $trans_amount = $faker->numberBetween(10, 9999);
    $trans_details = $faker->sentence();
    $created_at = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');
    $updated_at = $faker->dateTimeThisMonth()->format('Y-m-d H:i:s');

    $stmt = $pdo->prepare("INSERT INTO trans_history (account_name, account_type, trans_amount, trans_details, created_at, updated_at) VALUES (:account_name, :account_type, :trans_amount, :trans_details, :created_at, :updated_at)");
    $stmt->bindParam(':account_name', $account_name);
    $stmt->bindParam(':account_type', $account_type);
    $stmt->bindParam(':trans_amount', $trans_amount);
    $stmt->bindParam(':trans_details', $trans_details);
    $stmt->bindParam(':created_at', $created_at);
    $stmt->bindParam(':updated_at', $updated_at);
    $stmt->execute();
}

// var_dump($stmt->execute());
