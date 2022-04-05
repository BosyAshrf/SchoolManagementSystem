<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middleware' => ['guest']], function () {

	Route::get('/', function () {
		return view('auth.login');
	});
});

Route::group(
	[
		'prefix' => LaravelLocalization::setLocale(),
		'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath', 'auth']
	],
	function () {

		/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/

		Route::get('/dashboard', 'HomeController@index')->name('dashboard');

		//**************************************** Grades *********************************************
		//// عشان انشئ جدول فى الكنترولر namespace راوت حاطين 
		Route::group(['namespace' => 'Grades'], function () {
			Route::resource('Grades', 'GradeController');
		});

		//**************************************** Classrooms *********************************************
		//// عشان انشئ جدول فى الكنترولر namespace راوت حاطين 
		Route::group(['namespace' => 'Classrooms'], function () {
			Route::resource('Classrooms', 'ClassroomController');
			// لحذف الصفوف المختارة checkbox راوت 
			Route::post('Delete_all', 'ClassroomController@Delete_all')->name('Delete_all');
			//  راوت لعمليه الفلتر عشان تجيب الصفوف الدراسية 
			Route::post('Filter_Classes', 'ClassroomController@Filter_Classes')->name('Filter_Classes');
		});

		//**************************************** Sections ********************************************** 
		//// عشان انشئ جدول فى الكنترولر namespace راوت حاطين 
		Route::group(['namespace' => 'Sections'], function () {
			Route::resource('Sections', 'SectionController');
			// عشان اما تضغط على المراحل تجيب الصفوف Ajax راوت لعمليه 
			Route::get('/Classes/{id}', 'SectionController@getClasses');
		});

		//**************************************** Teachers ********************************************** 
		Route::group(['namespace' => 'Teachers'], function () {
			Route::resource('Teachers', 'TeacherController');
		});

		//**************************************** students ********************************************** 
		Route::group(['namespace' => 'Students'], function () {
			Route::resource('Students', 'StudentController');
			Route::resource('Promotions', 'PromotionController');
			Route::resource('Gratuated', 'GratuatedController');
			// كود الاجاكس عشان اما نضغط ع المراحل الدراسية يعبي الصفوف
			Route::get('/getClassrooms/{id}', 'StudentController@getClassrooms');
			// كود الاجاكس عشان اما نضغط ع الصفوف الدراسية يعبي الاقسام
			Route::get('/getSections/{id}', 'StudentController@getSections');
			//كود معرفة اولياء امر الطالب
			Route::get('/ParentsStudent/{id}', 'StudentController@Parents_Student');
			//كود رفع مرفقات الطالب
			Route::post('Upload_attachment', 'StudentController@Upload_attachment')->name('Upload_attachment');
			//كود تحميل مرفقات الطالب
			Route::get('Download_attachment/{studentname}/{filename}','StudentController@Download_attachment');
			//كود مسح مرفقات الطالب
			Route::post('Delete_attachment','StudentController@Delete_attachment')->name('Delete_attachment');

		});

			//**************************************** Fees ********************************************** 
			Route::group(['namespace' => 'Fees'], function () {
				Route::resource('Fees', 'FeesController');
				Route::resource('Fees_Invoices', 'FeesInvoicesController');
				Route::resource('ReceiptStudents', 'ReceiptStudentsController');
				Route::resource('ProcessingFees', 'ProcessingFeesController');
				Route::resource('Payments', 'PaymentsController');
			});

		//**************************************** Parents ********************************************** 
		// الراوت ده عشان يوديني ع صفحه معينه بدون ماانشئ كنترولر
		Route::view('Add_Parent', 'Livewire.Show_form');
	}
);
