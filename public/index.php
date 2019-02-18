<?php
/**
 * Created by PhpStorm.
 * User: kae25
 * Date: 2/14/19
 * Time: 7:21 PM
 */


$fileName = 'miniproj.csv';
main::start($fileName);

class main {

    static public function start($fileName) {
        $records = csv::getRecords($fileName);
        $table = html::generateTable($records);
        system::printPage($table);
    }

}

class csv {

    static public function getRecords($fileName) {

        $file = fopen($fileName, "r");
        while(! feof($file))
        {
            $record = fgetcsv($file);

            $records[] = $record;
        }

        fclose($file);
        return $records;

    }
}

class html{

    static public function generateTable() {}
}

class system {

    static public function printPage($page) {}

echo $page;
}


COMMIT 1: Feature: Adding readable csv file

<?php
/**
 * Created by PhpStorm.
 * User: kae25
 * Date: 2/14/19
 * Time: 7:21 PM
 */


main::start("miniproj.csv");

class main {

    static public function start($filename) {

        $records = csv::getRecords($filename);

    }

}

class csv {

    static public function getRecords($filename) {

        $file = fopen($filename, "r");

        while(! feof($file))
        {
            $record = fgetcsv($file);

            $records[] = recordFactory::create($record);
        }

        fclose($file);
        return $records;

    }
}

class record {


    public function __construct(Array $record = null)
    {
        $this->createProperty();

        print_r($this);
    }

    public function createProperty($name, $value) {

        $this->{$name} = $value

    }
}

class recordFactory {

public static create(Array $array = null)

{
$record = new record($array);

return $record;
}

}