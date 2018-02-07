<?php

namespace App;

use App\Services\SpreadSheetParser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SpreadSheet extends Model
{
    protected $fillable = ['name', 'lecturer', 'course_code', 'course_name', 'semester'];

    public static function store($fields)
    {
        $file = $fields['file'];

        return DB::transaction(function () use ($file) {
            // we will store the excel file on the file system

            $spreadSheet = new SpreadSheetParser(
                storage_path('app/'.$file->store('spreadsheets'))
            );

            static::create($spreadSheet->details())->saveMarks($spreadSheet);

            //create a record in the database that matches this file
        });
    }

    public function extractDetails()
    {
        return (new SpreadSheetParser($this))->parse();
    }

    public function marksLink()
    {
        return "/spreadsheets/$this->id/marks";
    }

    public function saveMarks($spreadsheet)
    {
        $marks = collect($spreadsheet->marks())->map(function ($mark) {
            $mark['spreadsheet_id'] = $this->id;

            return $mark;
        })->toArray();

        Mark::insert($marks);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'spreadsheet_id');
    }
}
