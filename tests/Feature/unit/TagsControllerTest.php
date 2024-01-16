<?php

namespace Tests\Feature\unit;

use Mockery;
use Tests\TestCase;
use App\Http\Controllers\TagsController;
use App\Models\Tag;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TagsControllerTest extends TestCase
{
   
    protected function tearDown(): void
    {
        Mockery::close();
    }

    public function testTagsIndex(): void
    {
       
        $tagController = new TagsController;
       
        $tag = Mockery::mock('App\Models\Tag');        

        $tag->shouldReceive('all')->once();
        
        $tagController->index();

       
    }
}
