<?php

namespace Database\Factories;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $senderId = fake()->randomElement([0, 1]);
        if ($senderId === 0) {
            $senderId = fake()->randomElement(User::where('id', '!=', 1)->pluck('id')->toArray());
            $receiverId = 1;
        } else {
            $receiverId = fake()->randomElement(User::pluck('id')->toArray());
        }

        $groupId = null;

        if (fake()->boolean(50)) {
            $groupId = fake()->randomElement(Group::pluck('id')->toArray());
            $group = Group::find($groupId);
            $senderId = fake()->randomElement($group->users->pluck('id')->toArray());
        }

        return [
            'message' => fake()->realText(),
            'sender_id' => $senderId,
            'receiver_id' => $receiverId,
            'group_id' => $groupId,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
