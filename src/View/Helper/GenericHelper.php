<?php
namespace App\View\Helper;

use Cake\View\Helper;

class GenericHelper extends Helper {
    
     
    public function userLabel($i) {
        switch ($i) {
            case 1: $status = 'Admin';
                break;
            case 2: $status = 'Project Manager';
                break;
            default: $status = 'Employee';
        }

        return $status;
    }
    
}
