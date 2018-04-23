<?php

header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
/**
 * Description of Exponential
 *
 * @author BORIS
 */
include_once '../adicionales/StopWatch.php';


class Exponential {
    //put your code here
    public function fibonacci($n){
        if ($n < 0) {            
            echo 'N can not be less than zero';
            exit();
        }
        if ($n <= 2) {
            return 1;
        }
        return $this->fibonacci($n - 1) + $this->fibonacci($n - 2);
    }
    
    public function fibonacci2($n){
        if ($n < 0) {            
            echo 'N can not be less than zero';
            exit();
        }
        if ($n <= 2) {
            return 1;
        }
                       
        $fibonacci = 0;
        $previous = 1;
        $penultimate = 0;
        for($i =1; $i <= $n ;$i++ ){
            $penultimate= $fibonacci;
            $fibonacci = $previous + $fibonacci;
            $previous = $penultimate;
        }

        return $fibonacci;
    }
}



// start the timer
StopWatch::start();

$N = 40;
$exponential = new Exponential();		
for ($i = 1; $i <= $N; $i++) {			
    $fibonacci = $exponential->fibonacci($i);  
    echo(sprintf("%d => %.0f  ", $i, $fibonacci));
    echo '<br/>';
    //Hacer que escriba en pantalla sin esperar que termine el bucle
    ob_flush();
    flush();
     
}

echo(sprintf("Time elapsed: %d seconds ", StopWatch::elapsed() ."\n"));
    



