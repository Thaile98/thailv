<?php
namespace Tests\Feature;
use Tests\TestCase;
use App\Repositories\Decorators\CachingUserRepository;
use Mockery as m;
class UserTest extends TestCase
{
    /**
     * Test fetching all items
     *
     * @return void
     */
    public function testFetchingAll()
    {
        // Create mock of decorated repository
        $repo = m::mock('App\Repositories\Interfaces\UserRepositoryInterface');
        // dd($repo->shouldReceive('all')->andReturn([]));
        $repo->shouldReceive('all')->andReturnUsing(function($agrument) {
            dd($agrument);
        });
        // Create mock of cache
        $cache = m::mock('Illuminate\Contracts\Cache\Repository');
        $cache->shouldReceive('tags')->with('users')->andReturn($cache);
        $cache->shouldReceive('remember')->andReturn([]);
        // Instantiate the repository
        $repository = new CachingUserRepository($repo, $cache);
        // Get all
        $items = $repository->all();
        $this->assertCount(0, $items);
    }
    /**
     * Test fetching a single item
     *
     * @return void
     */
    public function testFindOrFail()
    {
        // Create mock of decorated repository
        $repo = m::mock('App\Repositories\Interfaces\UserRepositoryInterface');
        $repo->shouldReceive('findOrFail')->with(1)->andReturn(null);
        // Create mock of cache
        $cache = m::mock('Illuminate\Contracts\Cache\Repository');
        $cache->shouldReceive('tags')->with('users')->andReturn($cache);
        $cache->shouldReceive('remember')->andReturn(null);
        // Instantiate the repository
        $repository = new CachingUserRepository($repo, $cache);
        // Get all
        $item = $repository->findOrFail(1);
        $this->assertNull($item);
    }
    /**
     * Test creating a single item
     *
     * @return void
     */
    public function testCreate()
    {
        // Create mock of decorated repository
        $repo = m::mock('App\Repositories\Interfaces\UserRepositoryInterface');
        $repo->shouldReceive('create')->with(['email' => 'bob@example.com'])->andReturn(true);
        // Create mock of cache
        $cache = m::mock('Illuminate\Contracts\Cache\Repository');
        $cache->shouldReceive('tags')->with('users')->andReturn($cache);
        $cache->shouldReceive('flush')->andReturn(true);
        // Instantiate the repository
        $repository = new CachingUserRepository($repo, $cache);
        // Get all
        $item = $repository->create(['email' => 'bob@example.com']);
        $this->assertTrue($item);
    }
    public function tearDown()
    {
        m::close();
        parent::tearDown();
    }
}