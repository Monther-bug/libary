<?php

namespace Tests\Feature\Admin;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Classification;
use App\Models\Type;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_dashboard_page_is_accessible()
    {
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.dashboard');
    }

    public function test_dashboard_displays_correct_stats_and_chart_data()
    {
        // Create dummy data
        Classification::factory()->count(3)->create();
        Type::factory()->count(5)->create();
        Book::factory()->count(10)->create();
        Category::factory()->count(2)->create();
        
        $response = $this->get(route('admin.dashboard'));

        $response->assertStatus(200);
        
        // Check if stats are present in the view
        $response->assertViewHas('stats', function ($stats) {
            return $stats['classifications'] === 3
                && $stats['types'] === 5
                && $stats['books'] === 10
                && $stats['categories'] === 2;
        });

        // Check if text is present in the response body
        $response->assertSee('Classifications');
        $response->assertSee('3');
        $response->assertSee('Types');
        $response->assertSee('5');
        $response->assertSee('Books');
        $response->assertSee('10');

        // Check if chart data is present
        $response->assertViewHas('chartData');
    }
}
