<?php

require_once __DIR__ . '/../utils.php'; 

use PHPUnit\Framework\TestCase;
use General\Utils;


class UtilsTest extends TestCase {
    public function testRandomNumberWithinRange() {
        $min = 100;
        $max = 100;
        for ($i = 0; $i < 1000; $i++) {
            $result = Utils::getSecureRandom($min, $max);
            $this->assertGreaterThanOrEqual($min, $result);
            $this->assertLessThanOrEqual($max, $result);
        }
    }

    public function testSmallRange() {
        $min = 5;
        $max = 6;
        for ($i = 0; $i < 100; $i++) {
            $result = Utils::getSecureRandom($min, $max);
            $this->assertContains($result, [$min, $max]);
        }
    }

    public function testDiversityOfRandomNumbers() {
        $min = 1;
        $max = 1000;
        $results = [];
    
        for ($i = 0; $i < 1000; $i++) {
            $results[$i] = Utils::getSecureRandom($min, $max);
        }
    
        $uniqueResults = array_unique($results);
    
        $this->assertGreaterThan(600, count($uniqueResults), "Expected at least 900 unique random numbers.");
    }
}
?>
