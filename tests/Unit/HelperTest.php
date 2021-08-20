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
        $this->assertEquals(6, $result); //Assert
    } 
    
    public function test_get_full_name()
    {
        $firstName = "Himash"; //Arrange
        $lastName = "Tehan"; //Arrange
        $result = Helper::getFullName($firstName, $lastName); //Act
        $this->assertEquals("Himash Tehan", $result); //Assert
    } 

}
