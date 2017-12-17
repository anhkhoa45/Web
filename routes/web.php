<?php

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

Route::get('/', 'IndexController@index')->name('index');

Auth::routes();

Route::middleware(['auth'])->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('profile', 'HomeController@profile')->name('profile');
        Route::put('update-info', 'HomeController@updateInfo')->name('user.update_info');
        Route::put('update-ava', 'HomeController@updateAvatar')->name('user.update_ava');
        Route::put('update-balance', 'HomeController@updateBalance')->name('user.update_balance');
        Route::put('change-password', 'HomeController@changePassword')->name('user.change_password');
        Route::get('enroll-course/{course}', 'HomeController@enrollCourse')->name('enroll-course');
        Route::get('enrolled-courses', 'HomeController@enrolledCourses')->name('user.enrolled_courses');

        Route::get('create-course', 'TeachingController@getCreateCoursePage')->name('user.get_create_course');
        Route::post('create-course', 'TeachingController@createCourse')->name('user.create_course');
        Route::get('update-course-info/{course}', 'TeachingController@getUpdateCourseInfo')
            ->name('user.get_update_course_info');
        Route::put('update-course-info/{course}', 'TeachingController@postUpdateCourseInfo')
            ->name('user.post_update_course_info');
        Route::get('teaching-course/{course}', 'TeachingController@teachingCourseDetail')
            ->name('user.teaching_course_detail');

        Route::middleware(['enrolled'])->group(function() {
            Route::get('learn-course/{course}', 'LearningController@learnCourse')->name('user.learn_course');
            Route::post('rate-course/{course}', 'LearningController@rateCourse')->name('user.rate_course');
            Route::get('{course}/watch-video/{video}', 'LearningController@watchVideo')->name('user.watch_video');
            Route::get('{course}/earn-video-score/{video}', 'LearningController@earnVideoScore')
                ->name('user.earn_video_score');
        });
    });
});

Route::get('course-info/{id}', 'IndexController@showCourseInfo')->name('course-info');
Route::get('teacherinfo/{id}', 'IndexController@showTeacherInfo')->name('teacher-info');
Route::get('category/{id}','IndexController@showCategoryCourse')->name('category');
Route::get('all-course','IndexController@showAllCourse')->name('all-course');
