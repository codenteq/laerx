<?php

namespace Tests\Unit;

use Tests\TestCase;

class QuestionTest extends TestCase
{
    public function test_user_can_login()
    {
        $credential = [
            'tc' => 11111111111,
            'password' => 'password',
        ];

        $response = $this->post('login', $credential);

        $response->assertSessionHasErrors();
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_question_create()
    {
        auth()->loginUsingId(1);
        $this->post(route('admin.question.store'), [
            'title' => 'test'.rand(1, 100),
            'languageId' => 1,
            'typeId' => 1,
            'choice_text_1' => rand(),
            'choice_text_2' => rand(),
            'choice_text_3' => rand(),
            'choice_text_4' => rand(),
            'correct_choice' => rand(1, 4),
        ])->assertStatus(200);
    }
}
