<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of LogLine
 *
 * @author BORIS
 */
class LogLine {
    private $counter;

    public function LogLine($counter) {
        $this->counter = $counter;
    }

    public function getIP() {
        return "ip-" . $counter;
    }
}
