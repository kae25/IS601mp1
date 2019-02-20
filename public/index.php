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
        $table = html::generateTable($records);
        system::printPage($table);

    }

}

class csv {

    static public function getRecords($filename) {

        $file = fopen($filename,"r");

        $fieldNames = array();

        $count = 0;

        while(! feof($file))
        {
            $record = fgetcsv($file);

            if($count == 0) {
                $fieldNames = $record;
            } else {
                $records[] = recordFactory::create($fieldNames, $record);
            }
            $count++;
        }

        fclose($file);
        return $records;

    }
}

class html
{

    public static function generateTable($records)
    {

        $count = 0;

        foreach ($records as $record) {

            if ($count == 0) {

                $array = $record->returnArray();
                $fields = array_keys($array);
                $values = array_values($array);

                //print_r($fields);
                //print_r($values);

            } else {
                $array = $record->returnArray();
                $values = array_values($array);

                 //print_r($values);s

            }
            $count++;

        }

        if (($f = fopen("miniproj.csv", "r")) !== false) {

            $var = print_r("<table border='6'>\n\n");

            echo '<table border="5">';
        }

        while (($line = fgetcsv($f, 1000, ",")) !== false) {


            foreach ($fields as $fields) {
                echo ("<th>$fields</th>");
            }

            echo ("</tr>\n");

            foreach ($line as $cell) {

                    echo("<td>" . ($cell) . "</td>");

                for ($i=1; $i<count($result); $i++) {

                    echo ("<td>".implode("</td><td>",$result[$i])."</td>");

                }
            }
        }
        fclose($array);
        return ($var);
    }

}
class record {

    public function __construct(Array $fieldNames = null, $values = null )
    {
        $record = array_combine($fieldNames, $values);

        foreach ($record as $property => $value) {
            $this->createProperty($property, $value);
        }
    }

    public function returnArray() {
        $array = (array) $this;

        return $array;
    }

    public function createProperty($name = 'First', $value = 'Dean') {

        $this->{$name} = $value;
    }

}

class recordFactory {

    public static function create(Array $fieldNames = null, Array $values = null) {

        $record = new record($fieldNames, $values);

        return $record;

    }

}


