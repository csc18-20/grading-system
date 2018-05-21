<?php

use Faker\Generator as Faker;


$factory->define(App\Mark::class, function (Faker $faker) {
	$min=$faker->numberBetween(10,75);
	$max=$min+20;
	$assignments=collect([
		"cw1"=>adjustedMark($faker,$min,$max),
		"cw2"=>adjustedMark($faker,$min,$max),
		"cw3"=>adjustedMark($faker,$min,$max),
	
	]);
	$exam=[];
	$qns=collect([1,2,3,4,5,6,7,8,9])->shuffle()->take(3);
	
	for ($i = 0; $i <3 ; $i++) {
		
		$exam["Q$qns[$i]"]=adjustedMark($faker,$min,$max)*0.2;
	}

    $exam=collect($exam);

    $exam["section_a"]=adjustedMark($faker,$min,$max)*0.4;

    $exam=$exam->toArray();

    krsort($exam);


	$final_course_work=$assignments->sortByDesc(null)->take(2)->average();
	$final_exam=array_sum($exam);
    return [
        "assignments"=>$assignments->toJson(),
        "final_exam"=>$final_exam,
        'exam'=>json_encode($exam),
        'final_mark'=>$final_course_work*0.4+ ($final_exam*0.6),
        "final_course_work"=>$final_course_work
    ];
});


function adjustedMark($faker,$min,$max){
	$mark=$faker->numberBetween($min,$max);
	if ($mark>80) {
		return round($mark);
		
	}

	return round($mark * $faker->numberBetween(1000,floor(80000/$mark))/1000);
}