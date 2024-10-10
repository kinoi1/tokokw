<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;
use Illuminate\Database\QueryException;
use Mockery;

class ProductControllerTest extends TestCase
{
    public function testSaveProductSuccessfully()
    {
        // Mock Request
        $request = new Request([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100
        ]);

        // Mock the Product model and its method
        $mockProduct = Mockery::mock('alias:App\Models\Product');
        $mockProduct->shouldReceive('createProduct')
                    ->once()
                    ->with($request->all())
                    ->andReturn([
                        'id' => 1,
                        'name' => 'Test Product',
                        'description' => 'Test Description',
                        'price' => 100,
                    ]);

        // Call the controller method
        $controller = new ProductController();
        $response = $controller->save($request);

        // Assert the response
        $this->assertEquals(201, $response->status());
        $this->assertJson($response->getContent());

        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals('Product created successfully', $responseData['message']);
        $this->assertEquals('Test Product', $responseData['product']['name']);
    }

    public function testSaveProductFailed()
    {
        // Mock Request
        $request = new Request([
            'name' => 'Test Product',
            'description' => 'Test Description',
            'price' => 100
        ]);

        // Mock the Product model and force it to throw QueryException
        $mockProduct = Mockery::mock('alias:App\Models\Product');
        $mockProduct->shouldReceive('createProduct')
                    ->once()
                    ->with($request->all())
                    ->andThrow(new QueryException('SQLSTATE[23000]', [], new \Exception('Error inserting product')));

        // Call the controller method
        $controller = new ProductController();
        $response = $controller->save($request);

        // Assert the response
        $this->assertEquals(500, $response->status());
        $this->assertJson($response->getContent());

        $responseData = json_decode($response->getContent(), true);
        $this->assertEquals('Failed to create product', $responseData['message']);
        $this->assertStringContainsString('Error inserting product', $responseData['error']);
    }
}
