<?php

header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
/**
 * Description of Exponential
 *
 * @author BORIS
 */
include_once '../adicionales/StopWatch.php';

//Complexity: O(N)
abstract class LinealExampleType {
	const Loop = 'Loop';
        const Search = 'Search';
        const Factorial = 'Factorial';
        const Fibonacci = 'Fibonacci';
        const FibonacciCache = 'FibonacciCache';
}


class Lineal {
    const N = 200;
    private $fibonacciCache;
   
    function __construct() {
        $this->fibonacciCache = array_fill(0,  self::N +1 ,0);        
    }


    public function loop($N) {
    	$counter = 0;
        echo("**********************loop**********************");
        echo("<br/>");
        while ($counter < $N) {
            echo($counter);
            echo('<br/>');
            $counter = $counter + 1;
        }
    }
    
    public function search($needle) {
    	 $valueList = [2, 4, 4, 5, 7, 10, 23, 25, 64];
		$found = $this->containsNeedle($needle, $valueList);
		echo('**********************search**********************');
                echo('<br/>');
		echo($found);
                echo('<br/>');
    }
    
      public function containsNeedle($needle, $valueList) {
        foreach ( $valueList as $value) {
            if ($value == $needle) {
                return 'TRUE';
            }
        }
        return 'FALSE';
    }

  
    
    public function printFactorial($N) {
    	$factorial = $this->getFactorial($N);
    	echo("**********************factorial**********************");
        echo('<br/>');    	
        echo(sprintf("%.0f",$factorial));
        echo('<br/>');
    }
    
     public function getFactorial($N) {
        if ($N == 1) {
            return 1;
        }
        if ($N > 20) { 
            echo($N . " is out of range"); 
            exit();
            
        }
        return ($N * $this->getFactorial($N - 1));
    }
    
    public function printFibonacci($N, $linealExampleType) {
    	//Stopwatch stopwatch = Stopwatch.createStarted();
        // start the timer
        StopWatch::start();
    	for ($i = 1; $i <= $N; $i++) {
            $fibonacci = 0;
            switch ($linealExampleType) {
                    case 'Fibonacci': $fibonacci = $this->fibonacci($i); break;
                    case 'FibonacciCache': $fibonacci = $this->fibonacciCache($i); break;
                    default: $fibonacci = $this->fibonacci($i); break;
            }				
            echo(sprintf("%d => %.0f  ", $i, $fibonacci));
            echo '<br/>';

        }    	
        echo(sprintf("Time elapsed: %d milliseconds ", StopWatch::elapsedMilliSeconds() ."\n"));
    }
    
    public function fibonacci($N){
        if ($N < 0) {
            echo 'N can not be less than zero';
            exit();
        }
        if ($N <= 2) {
            return 1;
        }
        $fibonacci = 0;
        $previous = 1;
        $penultimate = 0;
        for ($i = 1; $i <= $N; $i++) {
             $penultimate = $fibonacci;
             $fibonacci = $previous + $fibonacci;
             $previous = $penultimate;
        }
        return $fibonacci;
    }
    
    public function fibonacciCache($N){
        if ($N < 0) {
            echo("N can not be less than zero");
            exit();
        }
        if ($N <= 2) {
            $this->fibonacciCache[$N] = 1;
        }
        if ($this->fibonacciCache[$N] == 0) {
            $this->fibonacciCache[$N] = $this->fibonacciCache($N - 1) + $this->fibonacciCache($N - 2);
        }
        return $this->fibonacciCache[$N];
    }
    
   
}




    $NEEDLE = 20;
    $lineal = new Lineal();

    switch (LinealExampleType::FibonacciCache) {
            case 'Loop': $lineal->loop(Lineal::N); break;
            case 'Search': $lineal->search($NEEDLE); break;
            case 'Factorial': $lineal->printFactorial(Lineal::N); break;
            case 'Fibonacci': $lineal->printFibonacci(Lineal::N, LinealExampleType::Fibonacci); break;
            case 'FibonacciCache': $lineal->printFibonacci(Lineal::N, LinealExampleType::FibonacciCache); break;
    }
 
    ob_flush();
    flush();




