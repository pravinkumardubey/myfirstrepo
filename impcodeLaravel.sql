=======================================================
@inject('roles', 'App\Services\RoleService')
@php
$userRoles = $roles->getRoles();
@endphp

<a href="{{ url('users/'.$userRoles['territory-licensee']) }}">
=====================================================
Route::current()->getParameter('id');
=========================================
$roleId = app('Illuminate\Http\Request')->user_type;
========================================
/**
	 * This function will return Lesson by SublavelId
	 * @param  [array] $subLevelId 
	 * @return              
	 */
	public static function getAllLesson($subLevelIds){
		$lessonData = [];
		$lessonData = PublishLesson::select('original_lesson_id as id', 'name','level_id','sublevel_id')->active();
		$lessonData->where(function($wquery) use ($subLevelIds){
			foreach ($subLevelIds as $ids) {
	            list($levelId,$subLevelId) = explode('-', $ids);
	            $wquery->orWhere(function($query) use ($levelId,$subLevelId){
	            	return $query->where('level_id', $levelId) 
	            			->where('sublevel_id', $subLevelId);;
	            });
	        }
	    });
       return $lessonData->orderBy('level_id','asc')
				       ->orderBy('sublevel_id','asc')
				       ->orderBy('priority','asc')
				       ->get()->toArray();
	}
=================================================================

->whereIn('level_id',$levelId)
		->when($sublevelId, function($query) use ($sublevelId){
			return $query->where('sublevel_id',$sublevelId);
		})
		->when($classId, function($classQuery) use ($classId){
			return $query->addSelect(DB::raw('1 as selected'));
		},function ($query) {
            return $query->addSelect(DB::raw('1 as selected'));
        })
		->orderBy('level_id','asc')->orderBy('sublevel_id','asc')->orderBy('name','asc')->get()->toArray();
==============================================
lessonList.column(1).nodes().each(function(node, index, dt){
                      lessonList.cell(node).data(schoolBudget*100/100);
                    });
=====================================================
public function getLessonDetalis(Request $schoolrequest){
    	$budgetValue = SchoolBudget::getSchoolLatestBudget($schoolrequest->schoolId);
		return PublishLesson::select('original_lesson_id as id', 'name','level_id','sublevel_id',DB::raw("$budgetValue as school_budget"))
		->active()
		->orderBy('level_id','asc')
		->orderBy('sublevel_id','asc')
		->orderBy('name','asc')->get()->toArray();
    }
=========================================================

admin' or '1'='1

Pravinkum@123

git config --local http.postBuffer 157286400

================================
php artisan tinker
use Cache
Cache::get('spatie.permission.cache');
================================
php dogblocker for php comments
php companion for php self import

=============================================================
Advance php connection code

/*$connection = new mysqli("localhost","root","","dbname");

$query = "SELECT * FROM table";

$result = $connection->query($query) or die("error" . $connection->error);
if ($result) {
	while ($row = $result->fetch_object()) {
		echo $row->name;
	}
}*/
ngrock for create https port :-

ngrok http 8080 -host-header="localhost:8080"
===============================================================
Laravel packages:-
Cashier
Passport
Sanctum
socialite
telescope
Laravel Notification Channels
maatwebsite
intervention
twilio/sdk
zircote/swagger-php
tenancy
aws/aws-sdk-php
thepinecode/i18n
doctrine/dbal :- for runnibg alter commands in laravel migration


------------------------
Laravel framework:-
Luman
=============================================================
php artisan view:clear && php artisan route:clear && php artisan config:clear && php artisan cache:clear && php artisan optimize:clear && composer dump-autoload

* PHP ka timeout 30 second ka hota hai


























==========================Resigining Letter============================
Dear Mam

I would like to inform you that I am resigning from my position

I was recently offered a new opportunity with a company and have decided to take their offer.

Thank you very much for the opportunities for professional and personal development that you have provided me during the last one years. I have enjoyed working for the company and appreciate the support provided me during my tenure with the company.

I cannot thank you enough for all of the opportunities and experiences you have provided me during my time with the company.

I appreciate your support and understanding, and I wish you all the very best.

Your Sincerely,

Pravin Kumar
