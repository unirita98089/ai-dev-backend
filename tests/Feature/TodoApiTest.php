<?php

namespace Tests\Feature;

use App\Repositories\Todo\TodoRepositoryInterface;
use Tests\TestCase;
use App\Models\Todo;


class TodoApiTest extends TestCase
{
    /**
     * @test
     */
    public function testGetAllTodos()
    {
        // モックデータの生成
        $todoList = Todo::factory()->count(5)->make();

        // TodoモデルをモックしてgetAllメソッドが呼ばれたらモックデータを返すように設定
        $this->mock(TodoRepositoryInterface::class, function ($mock) use ($todoList) {
            $mock->shouldReceive('all')->once()->andReturn($todoList);
        });

        // APIへのGETリクエストを送信
        $response = $this->get('/api/todos');

        // ステータスコードが200であることを確認
        $response->assertStatus(200);

        // レスポンスの詳細な内容を確認
        $response->assertJsonStructure([
            '*' => [
                'id',
                'title',
                'description',
                'date',
                'status',
                'created_at',
                'updated_at',
            ]
        ]);
    }
}
