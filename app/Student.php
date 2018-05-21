<?php
namespace App;

use App\Mark;
use Illuminate\Support\Facades\DB;

class Student
{
	protected $reg_no;

	protected $cgpa;

	protected $data=[];

	public function __construct($reg_no)
	{
		$this->ensureStudentExists($reg_no);

		$this->reg_no = $reg_no;

	}

	public function cgpa()
	{
		return $this->cgpa;
	}
	public function data()
	{
		return $this->data;
	}
	public function name()
	{
		
		return optional($this->data->first()["marks"][0])->student_name;
	}

	public function registrationNumber()
	{
		return $this->reg_no;
	}

	public function ensureStudentExists($reg_no)
	{
		if (!Mark::where(compact("reg_no"))->exists()) {
			throw new \Exception("Registrtion Number $reg_no does not exists");
		 	
		 } 
	}

	public function loadDetails()
	{
		$this->loadData();
		// dd($this->data);
		return $this;
	}

	protected function loadData()
	{
		$this->data=DB::table("marks")
			->where(["reg_no"=>$this->reg_no])
			->leftJoin("spread_sheets","spread_sheets.id","marks.spreadsheet_id")
			->orderBy("name")
			->get()
			->groupBy("name")
			->map([$this, "computeGPA"]);

	
		$this->computeCGPA();

	
	}

	public function computeGPA($data)
	{

		$data->map(function($all_data){
			$mark= new Mark(["final_mark"=>$all_data->final_mark]);
			$all_data->points=$mark->points;
			$all_data->grade=$mark->grade;
			$all_data->credit_units=3;
			$all_data->gpaProduct=$mark->points*$all_data->credit_units;
			return $all_data;
		});
		$total_cus= $data->sum("credit_units");
		

		$gpa=$data->sum("gpaProduct")/$total_cus ?? 0;

		return ["gpa"=>$gpa, "marks"=>$data->values()];
	}

	protected function computeCGPA()
	{

		$this->cgpa=$this->data->reduce(function($prev,$next){
			if ($prev==0) {
				return $next["gpa"];
			}
			return ($prev+  $next["gpa"])/2;

		},0);

	
	}
}