<?php

namespace Tests\Feature;

use App\Models\Notebook;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NotebookTest extends TestCase
{
    public function testGetNotebooks()
    {
        $response = $this->get('/api/v1/notebook/');
        $response->assertStatus(200);

        $response = $this->get('/api/v1/something_else/');
        $response->assertStatus(404);
    }

    public function testStoreNotebook()
    {
        $response = $this->post('/api/v1/notebook/', []);
        $response->assertStatus(302);

        $response = $this->post('/api/v1/notebook/', [
            'fio' => 'test',
            'company' => 'test company',
            'phone' => '12345',
            'email' => 'valid@mail.ru',
            ]);

        $response->assertStatus(201);
    }

    public function testUpdateNotebook() {
        $lastNotebookId = $this->getLastNotebookId();

        $request = $this->patch('/api/v1/notebook/' . $lastNotebookId);
        $request->assertStatus(200);
    }

    public function testDeleteNotebook()
    {
        $response = $this->post('/api/v1/notebook/', [
            'fio' => 'test',
            'company' => 'test company',
            'phone' => '12345',
            'email' => 'valid@mail.ru',
        ]);

        $response->assertStatus(201);

        $lastNotebookId = $this->getLastNotebookId();

        $response = $this->delete('/api/v1/notebook/' . $lastNotebookId);
        $response->assertStatus(204);

        $response = $this->delete('/api/v1/notebook/' . $lastNotebookId);
        $response->assertStatus(404);
    }

    private function getLastNotebookId() {

        $lastNotebookId = Notebook::latest()->first()->id;

        return $lastNotebookId;
    }
}
