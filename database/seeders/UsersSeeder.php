<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    private $santas;
    private $recipients;

    public function run()
    {
        $this->createUsers(50);
        $this->generateRoles();
    }

    private function createUsers(int $count): void
    {
        $faker = Factory::create();

        for ($i=0; $i<$count; $i++) {
            $user = User::create([
                'first_name' => $faker->firstName,
                'last_name' => $faker->lastName,
            ]);

            $this->santas[] = $user->id;
            $this->recipients[] = $user->id;
        }
    }

    private function generateRoles(): void
    {
        foreach ($this->santas as $key => $santa) {
            do {
                $recipient = array_rand($this->recipients);
            } while($recipient == $key);

            User::where('id', $santa)
            ->update(['recipient_id' => $this->recipients[$recipient]]);

            unset($this->recipients[$recipient]);
        }
    }
}
