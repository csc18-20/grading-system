<?php

namespace App;

use App\Services\SpreadSheetParser;
use App\User;
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
        $users =[];

        $parsed = collect($spreadsheet->marks())->map(function ($mark) {
            $mark['spreadsheet_id'] = $this->id;
            return $mark;
        });
        $usernames=$parsed->map(function($detail){
            return["username"=>$detail["reg_no"]];
        });
       
        $existingUsers= User::where($usernames)->pluck("username");

        $uncreated_users=$parsed->reject(function($detail) use($existingUsers){
            return $existingUsers->where("username",$detail["reg_no"])->isNotEmpty();
        })->map(function($detail){

            return [
                "name"=>$detail["student_name"],
                "username"=>$detail['reg_no'],
                "password"=>config("app.default_password")
            ];
        })->toArray();
        
        DB::table("users")->insert($uncreated_users);


        dd($new_users);
        //ensure that alls uses are in the system
        //get all the users whose marks are being uploaded
        //attach user ids to the respective marks and then save the marks

        Mark::insert($marks);
    }

    public function marks()
    {
        return $this->hasMany(Mark::class, 'spreadsheet_id');
    }
}
