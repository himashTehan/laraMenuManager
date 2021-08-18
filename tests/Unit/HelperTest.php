<?php

namespace Tests\Unit;

use App\Http\Controllers\Menu\MenuController;
use App\Utility\Helper;
use Illuminate\Http\Client\Request;
use PHPUnit\Framework\TestCase;

class HelperTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_sum()
    {
        $data = [1,2,3]; //Arrange
        $result = Helper::sum($data); //Act
        $this->assertEquals(6, $result);//Assert
    }

}
