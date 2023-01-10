<?php

namespace Tests\Unit;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_pivot_id_bug()
    {
        $order = Order::create([]);
        $product = Product::create([]);

        $order->products()->sync([$product->id]);

        $this->assertIsNumeric($order->products->first()->pivot->id);
    }
}
