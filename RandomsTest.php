<?php

include_once('Randoms.php');

class Vendini_Model_SalesDataTest extends PHPUnit_Framework_TestCase {

	/**
	 * Test to see that our random class is working
	 * Not a heck of a lot we can test here.
	 */
	function test_random(){
		$random = new Randoms();
		$one = $random->popNext();
		$two = $random->popNext();

		$this->assertTrue(is_integer($one));
		$this->assertTrue(is_integer($two));

		// Likelihood of producing the same number twice in a row should be very low
		$this->assertNotEquals($one,$two);
	}

	function test_isPrime(){
		$primes = new Primes();

		$this->assertTrue($primes->isPrime(2));
		$this->assertTrue($primes->isPrime(3));
		$this->assertTrue($primes->isPrime(5));
		$this->assertTrue($primes->isPrime(7));
		$this->assertTrue($primes->isPrime(179));
		$this->assertTrue($primes->isPrime(993319));
		$this->assertFalse($primes->isPrime(4));
		$this->assertFalse($primes->isPrime(144));
		$this->assertFalse($primes->isPrime(24336));
	}


	function test_primes(){
		$primes = new Primes();

		$this->assertEquals($primes->popNext(),2);
		$this->assertEquals($primes->popNext(),3);
		$this->assertEquals($primes->popNext(),5);
		$this->assertEquals($primes->popNext(),7);
		$this->assertEquals($primes->popNext(),11);
		$this->assertEquals($primes->popNext(),13);
		$this->assertEquals($primes->popNext(),17);
	}

	function test_primeFactors(){

		//Prime number have no prime factors so we should return the number itself?
		$primeFactors = new PrimeFactors(993319);
		$this->assertEquals($primeFactors->popNext(),993319);

		$primeFactors = new PrimeFactors(10);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),5 );

		$primeFactors = new PrimeFactors(144);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),3);
		$this->assertEquals($primeFactors->popNext(),3);

		$primeFactors = new PrimeFactors(24336);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),2);
		$this->assertEquals($primeFactors->popNext(),3);
		$this->assertEquals($primeFactors->popNext(),3);
		$this->assertEquals($primeFactors->popNext(),13);
		$this->assertEquals($primeFactors->popNext(),13);

	}

}