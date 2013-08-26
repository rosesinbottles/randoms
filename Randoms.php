<?php

class Randoms{

    public function popNext(){
         return mt_rand();
    }
}

class Primes{
    private $_last = 1;

    function popNext(){
        $test = $this->_last;
        while(true){
             $test++;
						 if($this->isPrime($test)){
                $this->_last = $test;
                return $this->_last;
             }

        }
		}

    function isPrime($test){
			for($i = 2; $i <= sqrt($test); $i++){
        if($test % $i == 0){
          return false;
        }
			}
      return true;
		}
}

class PrimeFactors{

    private $_toFactor;

    private $_last;

    function __construct($toFactor){
        $this->_toFactor = $toFactor;
    }

    function popNext(){
        $primes = new Primes();
				$prime = $primes->popNext();
        while( $prime <= sqrt($this->_toFactor)){
            if($this->_toFactor % $prime == 0){
                $this->_toFactor = $this->_toFactor / $prime;
                return $prime;
            }
						$prime = $primes->popNext();
        }
        return $this->_toFactor;

				}
}