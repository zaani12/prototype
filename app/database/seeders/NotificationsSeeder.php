<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Symfony\Component\Uid\NilUuid;


use Database\Seeders\pkg_notifications\{
    NotificationSeeder,
};


class NotificationsSeeder extends Seeder
{

    public function run(): void
    {
        $this->call(NotificationsSeeder::Classes());
    }

    public static function Classes(): array
    {
        return [
            NotificationSeeder::class,
        ];
    }
}