<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    protected $fillable=["final_mark"];
    public const GRADES=[
        "A"=>80,
        "B+"=>75,
        "B"=>70,
        "C+"=>65,
        "C"=>60,
        "D+"=>55,
        "D"=>50,
        "E"=>45,
        "F"=>0
    ];

    public const GRADE_POINTS=[
        "A"=>5,
        "B+"=>4.5,
        "B"=>4,
        "C+"=>3.5,
        "C"=>3,
        "D+"=>2.5,
        "D"=>2,
        "E"=>1,
        "F"=>0
    ];
    protected $casts=["assignments"=>"array","exam"=>"array"];



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

    public function getGradeAttribute()
    {
        foreach (self::GRADES as $grade=>$mark) {
            if ($this->final_mark>=$mark) {
                return $grade;
            }
            
        }
    }

    public function getPointsAttribute()
    {
        return self::GRADE_POINTS[$this->grade] ?? null;
    }

    public function spreadsheet()
    {
        return $this->belongsTo(SpreadSheet::class);
    }
}
