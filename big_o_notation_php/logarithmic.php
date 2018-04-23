<?php

header('Cache-Control: no-cache'); // recommended to prevent caching of event data.
/**
 * Description of Exponential
 *
 * @author BORIS
 */



// Complexity: O(log2 N)
class Logarithmic {
   

    	public function main() {
		$NEEDLE = 64;
		
		$valueList = [2, 4, 4, 5, 7, 10, 23, 25, 64];
		try {
			$position = $this->binarySearch($valueList, $NEEDLE, 0, count($valueList) - 1);
			echo($position == null ? "Not found" : "Found at position: " . $position);
                        echo('<br/>');
		} catch (Exception $e) {
			echo $e->getMessage() .'\n';
		}
	}
    
    public function binarySearch($valueList, $needle, $min, $max) {
        $midpoint = floor (($max + $min) / 2);
        if (count($valueList) > 0 && $valueList[$midpoint] == $needle) {
            return $midpoint;
        }
        if ($min >= $max) {
            return null;
        }
        if ($valueList[$midpoint] > $needle) {
            return $this->binarySearch($valueList, $needle, $min, $midpoint - 1);
        }
        return $this->binarySearch($valueList, $needle, $midpoint + 1, $max);
    }

   
}


    $logarithmic = new Logarithmic();
    $logarithmic->main(); 
    ob_flush();
    flush();




