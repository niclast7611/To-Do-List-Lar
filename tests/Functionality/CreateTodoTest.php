<?php
declare(strict_types=1);

namespace Tests\Functionality;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Providers\RouteServiceProvider;
use App\Models\Todo;

class CreateTodoTest extends TestCase
{
    use RefreshDatabase;

    public function test_Should_Add_Todo_With_Success(): void
    {
        // $response = $this->get('/create');
        // $response->assertStatus(200);

        //Given
       

        $test_todo = new Todo([
                'task' => 'pass this test',
                'description'=> 'pretty please',
                'status'=> 1,
                'user'=> 'frank'
                ]
            );
            $test_todo->save();
            $test_todo_task = $test_todo->task;

            $db_todo = Todo::where('task','pass this test')->first();

        //When

        //Then
        self::assertSame($test_todo->task,$db_todo->task);
    }
}

 
//{ 
    // public function test_new_users_can_register()
    // {
    //     $response = $this->post('/register', [
    //         'name' => 'Test User',
    //         'email' => 'test@example.com',
    //         'password' => 'password',
    //         'password_confirmation' => 'password',
    //     ]);
 
    //     $this->assertAuthenticated();
    //     $response->assertRedirect(RouteServiceProvider::HOME);
    // }
//}


// public function testClassConstructor()
// {
//     $user = new User(18, 'John');

//     $this->assertSame('John', $user->name);
//     $this->assertSame(21, $user->age);
//     $this->assertEmpty($user->favorite_movies);
// } 