<?php

header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of quadratic
 *
 * @author BORIS
 */
class Quadratic {
    //put your code here
    public function main() {
        $N = 20;		
        $this->createAllPairs($N);
    }

    public function createAllPairs($N) {
        $x = 0;
        $y = 0;
        while ($x < $N) {
            $y = 0;
            while ($y < $N) {                
                echo(sprintf("%.0f, %.0f  ", $x, $y));
                echo('<br/>');
                $y = $y + 1;
            }
            $x = $x + 1;
        }
    }
}


    $quadratic = new Quadratic();
    $quadratic->main(); 
    ob_flush();
    flush();