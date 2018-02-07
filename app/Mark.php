<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public static function prepareRaw($row)
    {
        return [
                'reg_no' => $row[1],
                'student_name' => $row[3],
                'final_mark' => $row[4],
                'assignments' => static::extractAssignmets($row),
                'final_course_work' => $row[9],
                'exam' => static::extractExam($row),
                'final_exam' => $row[20],
        ];
    }

    public static function extractKeys($row, $keys)
    {
        return json_encode(array_filter(array_only($row, $keys)));
    }

    public static function extractAssignmets($row)
    {
        $marks = [];
        $keys = [1 => 6, 2 => 7, 3 => 8];
        foreach ($keys as $courseUnit => $rowIndex) {
            $marks["cw$courseUnit"] = $row[$rowIndex];
        }

        return json_encode(array_filter($marks));
    }

    public static function extractExam($row)
    {
        $exam = [];
        $exam['section_a'] = $row[10];
        for ($i = 1; $i <= 9; ++$i) {
            $exam["Q$i"] = $row[$i + 10];
        }

        return json_encode(array_filter($exam));
    }
}
