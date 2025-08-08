<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\Category;
use Tests\TestCase;

class CategoryApiTest extends TestCase
{
    protected function authenticateAdmin()
    {
        $admin = User::factory()->create([
            'role' => 'admin',
        ]);

        $this->actingAs($admin);

        return $admin;
    }

    /** @test */
    public function admin_can_create_category()
    {
        $this->authenticateAdmin();

        $categoryName = 'Unique Category ' . uniqid();

        $response = $this->postJson('/api/categories', [
            'name' => $categoryName,
        ]);

        $response->assertStatus(201)
                 ->assertJsonFragment(['name' => $categoryName]);

        $this->assertDatabaseHas('categories', ['name' => $categoryName]);
    }

    /** @test */
    public function admin_can_update_category()
    {
        $this->authenticateAdmin();

        $category = Category::factory()->create([
            'name' => 'Old Name ' . uniqid(),
        ]);

        $newName = 'Updated Name ' . uniqid();

        $response = $this->putJson("/api/categories/{$category->id}", [
            'name' => $newName,
        ]);

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $newName]);

        $this->assertDatabaseHas('categories', ['name' => $newName]);
    }

    /** @test */
    public function admin_can_delete_category()
    {
        $this->authenticateAdmin();

        $category = Category::factory()->create([
            'name' => 'To Be Deleted ' . uniqid(),
        ]);

        $response = $this->deleteJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJson([
                     'message' => 'Delete category successfully',
                 ]);

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }

    /** @test */
    public function admin_can_list_categories()
    {
        $this->authenticateAdmin();

        Category::factory()->count(3)->create();

        $response = $this->getJson('/api/categories');

        $response->assertStatus(200)
                 ->assertJsonCount(3);
    }

    /** @test */
    public function admin_can_view_single_category()
    {
        $this->authenticateAdmin();

        $category = Category::factory()->create([
            'name' => 'View Test ' . uniqid(),
        ]);

        $response = $this->getJson("/api/categories/{$category->id}");

        $response->assertStatus(200)
                 ->assertJsonFragment(['name' => $category->name]);
    }
}
