<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    
    public function run()
    {    	collect(config("courseunits"))->map(function($data,$year){
    		collect($data)->map(function($courseUnits,$semester) use($year){
    			collect($courseUnits)->map(function($name,$code)use($semester,$year){

    				$spreadsheet=App\SpreadSheet::create([
    					"name"=>"{$year}: {$semester}",
    					"semester"=>$semester,
    					"course_name"=>$name,
    					"course_code"=>$code,
    					"lecturer"=>app(Faker\Generator::class)->name
    				]);
    				$data=app("fake_students")->map(function($student) use($spreadsheet){
    					return factory(App\Mark::class)->make(
    						$student+ [
    							"spreadsheet_id"=>$spreadsheet->id,
    							'created_at'=>now(),
    							'updated_at'=>now()
    						]
    					);
    				});



    				App\Mark::insert($data->toArray());
    			});


    		});
    	});

     factory(App\User::class)->create(['isAdmin'=> true]);
    }
}
