<?php
namespace App\Library;

use \PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Spreadsheet{
    private $reader;

    public function __construct(string $type)
    {
        switch ($type) {
            case 'application/wps-office.xlsx':
                $this->reader = new Xlsx();                
                break;
            
            default:
                throw new Exception('Type invalid');
                break;
        }
    }

    public function load($path)
    {
        return $this->reader->load($path);
    }
}