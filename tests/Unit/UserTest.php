<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testSave()
    {
        $user = new User();
        $user->name = 'Osmairy123';
        $user->email = 'osmairy123@gmail.com';
        $user->email_verified_at = null;
        $user->password = '12345678';

        $result = $user->save();

        $this->assertEquals('Osmairy', $result);
    }
}
