<?php

require 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

$kernel->bootstrap();

$users = App\Models\User::all();

echo "Total users: " . count($users) . "\n";

foreach ($users as $user) {
    echo "- {$user->email} ({$user->role})\n";
}
