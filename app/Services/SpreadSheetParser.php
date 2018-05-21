<?php

namespace App\Services;

use App\Mark;
use SpreadsheetReader;

class SpreadSheetParser
{
    protected $path;

    protected $marks = [];

    protected $details = [];

    protected $fileIsRead = false;

    public function __construct(string $path)
    {
        $this->path = $path;

        $this->details['name'] = $path;
    }

    public function parse()
    {
        $this->read();
    }

    protected function store()
    {
    }

    protected function read()
    {
        if ($this->fileIsRead) {
            return $this;
        }
        $rows = new SpreadsheetReader($this->path);

        foreach ($rows as $row) {
            $this->addToRows($row);
        }

        $this->fileIsRead = true;

        return $this;
    }

    protected function addToRows($row)
    {
        if (!$this->hasReadAllDetails()) {
            $lookups = [
                'Course Code:',
                'Course Name:',
                 'Semester:',
                 'Lecturer:',
             ];
            foreach ($lookups as $name) {
                $this->addDetail($row, $name);
            }
            $this->hasReadDetails = true;
        }

        $this->addStudentMark($row);
    }

    public function details()
    {
        $this->read();

        return $this->read()->details;
    }

    public function addDetail($row, $name)
    {
        $name = trim($name);

        $row = array_values(array_filter($row));
        $index = array_search($name, $row);

        if (is_bool($index)) {
            return false;
        }
        $next_index = $index + 1;
        if (!isset($row[$next_index])) {
            return false;
        }
        $database_key = snake_case(str_replace(':', '', $name));
        $this->details[$database_key] = $row[$next_index];
    }

    public function addStudentMark($row)
    {
        if (!isset($row[1])) {
            return false;
        }

        preg_match('/\d{2}\/U\/(?:\d{4}|\d{3})(?:\/(PS|EVE))?/', strtoupper($row[1]), $matched);

        if (1 != count($matched)) {
            return;
        }
        $this->marks[] = Mark::prepareRaw($row);
    }

    public function hasReadAllDetails()
    {
        return 5 == count($this->details);
    }

    public function marks()
    {
        $this->read();

        return $this->marks;
    }
}
