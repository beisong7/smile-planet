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

Route::group(['middleware'=> 'count'], function(){

//    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/', 'HomeController@index2')->name('home');

//    Route::get('/register', 'HomeController@lost');
    Route::get('/login', 'HomeController@lost')->name('login');

    Route::get('/location', 'HomeController@location')->name('home.location');

    Route::get('/info/{type}/{link}', 'HomeController@about')->name('home.about');
    Route::get('/vision', 'HomeController@vision')->name('home.vision');
    Route::get('/corevalues', 'HomeController@corevals')->name('home.corevals');

    Route::get('/ourteam/trustee', 'HomeController@team_trustee')->name('home.trustee');
    Route::get('/ourteam/exco', 'HomeController@team_exco')->name('home.exco');
    Route::get('/ourteam/fac', 'HomeController@team_fac')->name('home.fac');
    Route::get('/ourteam/vol', 'HomeController@team_vol')->name('home.vol');



    Route::get('/contact', 'HomeController@contact')->name('home.contact');


    Route::get('/volunteer', 'HomeController@volunteer')->name('home.volunteer');

    Route::get('/facilitator', 'HomeController@facilitator')->name('home.facilitator');

    Route::get('/policies', 'HomeController@policies')->name('home.policies');

    Route::get('/sponsorship', 'HomeController@sponsorship')->name('home.sponsorship');

    Route::get('/entrepreneur/focus/{name}', 'EntrepreneurController@focus_preview')->name('e.focus.preview');

    Route::post('/submitvol', 'VolunteerController@volunteerform')->name('form.volunteer');
    Route::post('/submitfac', 'FacilitatorController@applyfac')->name('form.facilitator');



    Route::get('/foundation', 'FoundationController@index')->name('foundation');

    Route::get('/foundation/ourwork/{topic}', 'FoundationController@ourwork')->name('foundation.ourwork');

    Route::get('/foundation/campaign/{topic}', 'FoundationController@campaign')->name('foundation.campaign');

    Route::get('/foundation/about', 'FoundationController@index')->name('foundation.about');

    Route::get('/entrepreneur', 'EntrepreneurController@index')->name('entrepreneur');

    Route::get('/entrepreneur/album/{title}', 'EntrepreneurController@album_view')->name('e.album_view');

    Route::get('/entrepreneur/albums', 'EntrepreneurController@albums')->name('e.albums');
    Route::get('/entrepreneur/course_list', 'EntrepreneurController@courselist')->name('e.courses');
    Route::get('/entrepreneur/course_list/{title}', 'EntrepreneurController@coursedetails')->name('e.courses.details');
    Route::get('/entrepreneur/course_reg/{title}', 'EntrepreneurController@coursereg')->name('e.course.reg');

    Route::get('/entrepreneur/reg/course/{link}/{type}', 'DetailController@coursereg')->name('detail.course.reg');

    Route::get('detail/elevate/make/featured/{link}', 'DetailController@makeFeatured')->name('detail.make.featured');
    Route::get('detail/elevate/make/main-featured/{link}', 'DetailController@makeMainFeatured')->name('detail.make.mainFeatured');

    Route::post('/entrepreneur/reg/save/course/{link}/{type}', 'DetailController@complete_course_reg')->name('complete.course.reg');

    Route::get('/foundation/album/{title}', 'FoundationController@album_view')->name('f.album_view');

    Route::get('/foundation/albums', 'FoundationController@albums')->name('f.albums');

    Route::get('/entrepreneur/about', 'EntrepreneurController@about')->name('entrepreneur.about');

    Route::get('/project', 'HomeController@project')->name('home.project');


    Route::get('/project/{title}', 'HomeController@project_show')->name('home.project.show');


    Route::get('/register/{title}', 'HomeController@eventreg')->name('eventreg');

    Route::get('/foundation/what_we_do', 'FoundationController@what_we_do')->name('foundation.wwd');

    Route::get('/foundation/aims_and_obj', 'FoundationController@objectives')->name('foundation.obj');

    Route::get('/validate/volunteer/{key}/', 'VolunteerController@validation');

    Route::get('/facilitator/form/form/complete', 'FacilitatorController@facformcomplete')->name('fac.form.complete');

    Route::get('/validate/facilitator/{key}/', 'FacilitatorController@validation');
    Route::get('/foundation/complete/facilitator/{key}/', 'FacilitatorController@completefform')->name('completefform');


    Route::post('/subscribe', 'SubscriberController@subscribe')->name('form.subscribe');
    Route::post('/facilitator/complete_form/{facilitator}', 'FacilitatorController@faccomform')->name('fac.complete.form');


    Route::get('/calender/{calender}/', 'HomeController@calenderview')->name('calender.front');

    Route::get('/calender/', 'HomeController@calenderall')->name('calender.front.all');

    Route::post('/calender/delete/{calender}', 'HomeController@calenderdelete')->name('calender.delete');

    Route::post('/registerevent', 'EntrepreneurController@registerevent')->name('event.register');

    Route::post('/registercourse', 'EntrepreneurController@registercourse')->name('course.register');

    Route::get('/entrepreneur/course_reg_success/{message}', 'EntrepreneurController@coursesuccess')->name('courseregsuc');

    Route::get('/entrepreneur/event_reg_success/{transmission}', 'EntrepreneurController@eventsuccess')->name('event_reg.success');


    Route::post('/delete/partner/{partner}', 'ConsoleController@removePartner')->name('delete.partner');

    Route::get('/home/blog', 'HomeController@blog')->name('blog.project');
    Route::get('/home/blog/read/{slug}', 'HomeController@blogread')->name('blog.read');
    Route::get('/home/blog/category/{name}', 'HomeController@blogcategory')->name('blog.category');

    Route::get('/home/staff/login', 'HomeController@stafflogin')->name('staff.login');

    Route::get('/p/faq/info', 'HomeController@faq')->name('faq');

    Route::get('list/courses/all', 'CourseController@allcourse')->name('all.course');



});

//Auth::routes();

//Route::get('/events', 'ApirouteController@event');

Route::get('/send_test_email', function(){
    \Illuminate\Support\Facades\Mail::raw('testing the email. this should come to your email', function($message)
    {
        $message->to('mails@smileplanetltd.com');
    });
});

Route::get('/send_email', 'MailController@testmail');

Route::get('/smileconsole', 'ConsoleController@login')->name('console.login')->middleware('active');

Route::post('/adminlogin', 'ConsoleController@adminlogin')->name('adminlogin');

Route::get('/console/fixdb', 'ConsoleController@fixdb');

Route::post('/staff_login', 'ConsoleController@stafflogin')->name('stafflogin');

Route::group(['middleware'=> 'admin'], function(){

    Route::post('/upload' , 'ConsoleController@upload')->name('upload');

    Route::get('/console/dashboard', 'ConsoleController@dashboard')->name('console.home');

    Route::get('/console/dashboard/memo', 'MemoController@makemail')->name('console.makemail');

    Route::post('/console/dashboard/memo/create', 'MemoController@store')->name('newmail.send');

    Route::get('console/courses', 'CourseController@index')->name('console.courses');

    Route::get('console/courses/new', 'CourseController@create')->name('console.courses.new');
    Route::post('console/course/store', 'CourseController@store')->name('course.store');
    Route::post('console/course/{course}/update', 'CourseController@update')->name('course.update');
    Route::get('console/course/{course}/preview', 'CourseController@edit')->name('course.edit');


    Route::get('/console/banner', 'ConsoleController@banner')->name('console.banner');

    Route::get('/console/visitors', 'ConsoleController@visitors')->name('console.visitors');

    Route::get('/console/visitor/{counter}', 'ConsoleController@visitor')->name('console.visitor');

    Route::get('/console/gallery', 'ConsoleController@gallery')->name('console.gallery');

    Route::get('/console/programs', 'ProgramController@index')->name('console.event');

    Route::get('/console/programs/{program}/resend-mails', 'ProgramController@mailresend')->name('console.event.reemail');

    Route::get('/console/programs/{program}/custom_mails', 'ProgramController@custommail')->name('console.event.c_email');

    Route::post('console/programs/{program}/customMailSender', 'ProgramController@sendCustomMail')->name('eventmail.send');

    Route::get('/console/partners', 'PartnerController@index')->name('console.partner');

    Route::get('/console/partners/new', 'PartnerController@create')->name('console.partner.new');

    Route::get('/console/programs/new', 'ProgramController@newevent')->name('console.event.new');

    Route::post('/pushgallery', 'ConsoleController@allgallery')->name('console.allgallery');

    Route::post('/fetchgallery', 'ConsoleController@getimggallery')->name('console.fetch.gallery');

    Route::post('/bannersave', 'BannerController@store')->name('banner.store');

    Route::post('/console/programs/new', 'ProgramController@store')->name('event.store');

    Route::post('/console/partner/new', 'PartnerController@store')->name('partner.store');

    Route::post('/slidessave', 'BannerController@storeslide');

    Route::post('/removeimage', 'BannerController@remover');

    Route::post('/getimage', 'BannerController@getimage');

    Route::get('/console/content', 'ConsoleController@content')->name('console.content');

    Route::get('/console/content/about', 'ConsoleController@about')->name('console.content.about');

    Route::get('/console/content/vision', 'ConsoleController@vision')->name('console.content.vision');

    Route::get('/console/content/mission', 'ConsoleController@mission')->name('console.content.mission');

    Route::get('/console/content/eabout', 'ConsoleController@eabout')->name('console.content.eabout');

    Route::get('/console/content/corevals', 'ConsoleController@corevals')->name('console.content.corevals');

    Route::get('/console/content/what_we_do', 'ConsoleController@swwd')->name('console.content.swwd');

    Route::get('/console/content/aims_obj', 'ConsoleController@aimnobj')->name('console.content.obj');

    Route::get('/console/content/presence', 'ConsoleController@reach')->name('console.content.reach');

    Route::get('/console/content/e_ourfocus', 'ConsoleController@e_ourFocus')->name('console.content.efocus');
    Route::get('/console/content/e_tech', 'ConsoleController@e_tech')->name('console.focus.tech');
    Route::get('/console/content/e_mentor', 'ConsoleController@e_mentor')->name('console.focus.mentor');
    Route::get('/console/content/e_coach', 'ConsoleController@e_coach')->name('console.focus.coach');
    Route::get('/console/content/e_vocation', 'ConsoleController@e_vocation')->name('console.focus.vocation');
    Route::get('/console/content/e_entrep', 'ConsoleController@e_entrep')->name('console.focus.entrep');
    Route::get('/console/content/e_leader', 'ConsoleController@e_leader')->name('console.focus.leader');
    Route::get('/console/content/e_mind', 'ConsoleController@e_mind')->name('console.focus.mind');

    Route::resource('/category', 'CategoryController');

    Route::resource('/people', 'PeopleController');

    Route::get('/console/ads', 'AdsController@manage')->name('ads.manage');

    Route::get('/console/content/v2', 'DetailController@index')->name('content.v2');
    Route::get('/console/content/v2/new', 'DetailController@create')->name('new.detail');
    Route::get('/console/content/v2/edit/{link}', 'DetailController@show')->name('edit.detail');
    Route::get('/console/content/v2/delete/{link}', 'DetailController@delete')->name('edit.delete');
    Route::get('/console/content/v2/toggle/{link}', 'DetailController@toggle')->name('edit.detail.toggle');
    Route::post('/console/content/v2/save', 'DetailController@store')->name('new.detail.save');
    Route::post('/console/content/v2/update/{link}', 'DetailController@update')->name('new.detail.update');

    Route::get('/console/ads/create', 'AdsController@create')->name('ads.create');
    Route::get('/console/ads/show/{id}', 'AdsController@create')->name('ads.show');
    Route::post('/console/ads/store', 'AdsController@store')->name('ads.store');
    Route::get('/console/ads/activate/{ads}', 'AdsController@activate')->name('ads.activate');
    Route::get('/console/ads/deactivate/{ads}', 'AdsController@deactivate')->name('ads.deactivate');

    Route::get('/console/gallery/add', 'GalleryController@create')->name('console.gallery.add');

    Route::post('/savecontent', 'ContentController@save')->name('console.content.save');

    Route::post('/savefocusz', 'FocusController@save')->name('console.focus.save');

    Route::post('/console/logout', 'ConsoleController@logout')->name('console.logout');

    Route::get('/console/application/facilitators', 'ConsoleController@facilitator')->name('console.app.fac');

    Route::get('/console/application/volunteer', 'ConsoleController@volunteer')->name('console.app.vol');

    Route::get('/console/application/enrollments', 'ConsoleController@enrollments')->name('console.enrollment');

    Route::get('/console/application/sponsorship', 'ConsoleController@sponsorship')->name('console.app.spo');

    Route::get('/console/application/eventreg', 'ConsoleController@eventreg')->name('console.app.event');

    Route::get('/console/application/courseReg', 'ConsoleController@courseRegis')->name('console.courseRegister');

    Route::get('/console/application/courseReg/student/{course}', 'ConsoleController@courseSrudents')->name('course.app.regstudent');

    Route::get('/console/application/{program}/event_registration', 'ConsoleController@deventreg')->name('event.showreg');

    Route::get('/console/application/courseapp/view/{coursereg}', 'ConsoleController@courseappshow')->name('console.app.courseapp.show');
    Route::get('/console/application/enrollment/view/{enrollment}', 'PformController@enrollmentInfo')->name('console.app.enrollment.info');

    Route::post('/console/application/courseapp/delete/{coursereg}', 'ConsoleController@courseappdel')->name('del.courseapp');

    Route::get('/console/application/eventreg/view/{eventreg}', 'ConsoleController@eventregshow')->name('console.app.event.show');

    Route::get('/console/admin', 'ConsoleController@admins')->name('console.admins');

    Route::get('/console/admin/show/{user}', 'ConsoleController@ashowadmin')->name('admin.showing');

    Route::post('/console/admin/info/{user}', 'ConsoleController@updateadmin')->name('admin.update');


    Route::get('/console/programs/edit/{program}', 'ProgramController@edit')->name('console.event.edit');

    Route::post('/console/programs/update/{program}', 'ProgramController@update')->name('event.update');

    Route::post('/console/programs/{program}', 'ProgramController@destroy')->name('event.remove');

    Route::post('/saveAlbumPics', 'AlbumController@saveAlbumPics');

    Route::resource('/people', 'PeopleController');

    Route::resource('/album', 'AlbumController');

    Route::get('console/album/{album}/add', 'AlbumController@addpic')->name('album.pic.add');
    Route::get('console/album/delete/{id}', 'AlbumController@removePic')->name('ablum.pic.delete');

    Route::get('console/application/preview/{volunteer}', 'VolunteerController@preview')->name('volunteer.preview');


    Route::post('console/application/volunteer/{volunteer}', 'VolunteerController@destroy')->name('volunteer.delete');

    Route::get('console/application_fac/preview/{facilitator}', 'FacilitatorController@preview')->name('facilitator.preview');


    Route::post('console/application_fac/fac/{facilitator}', 'FacilitatorController@destroy')->name('facilitator.delete');


    Route::get('console/calender', 'CalenderController@index')->name('console.calender');
    Route::get('console/calender/new', 'CalenderController@create')->name('console.calender.new');
    Route::get('console/calender/{calender}', 'CalenderController@preview')->name('console.calender.edit');
    Route::post('console/calender/store', 'CalenderController@store')->name('calender.store');
    Route::post('console/calender/update/{calender}', 'CalenderController@update')->name('calender.update');
    Route::post('console/admin/store', 'ConsoleController@storeadmin')->name('admin.store');
    Route::post('console/admin/delete/{admin}', 'ConsoleController@deladmin')->name('admin.delete');
    Route::get('console/admin/new', 'ConsoleController@newadmin')->name('admin.new');

    Route::get('console/tube', 'ConsoleController@youtube')->name('console.tube');
    Route::post('console/tube/store', 'ConsoleController@storetube')->name('tube.store');
    Route::post('console/tube/update/{tube}/', 'ConsoleController@updatetube')->name('tube.update');
    Route::get('console/tubedel/{tube}', 'ConsoleController@deltube')->name('tube.delete');
    Route::get('console/tube/{tube}', 'ConsoleController@showtube')->name('tube.show');
    Route::get('console/tubenewvideo/', 'ConsoleController@newtubevideo')->name('tube.new');

    Route::get('console/ticket-checker/', 'ConsoleController@ticketer')->name('ticketer');
    Route::get('console/ticket-confirmation/{eventreg}', 'ConsoleController@ticketConfirm')->name('ticket.confirm');

    Route::post('console/ticket-validate', 'ConsoleController@ticketCheck')->name('ticket.check');

    Route::post('console/eventreg/delete/{eventreg}', 'ConsoleController@removeEvent')->name('del.eventreg');



    Route::get('console/eventreg/toexcel/{program}', 'ConsoleController@exportExcel')->name('get.excel.event');

    Route::get('console/course/registry/{course}', 'ConsoleController@exportCourseExcel')->name('get.excel.course');

    Route::get('console/others/toexcel/{name}', 'ConsoleController@othersExcel')->name('get.excel.others');

    Route::resource('blog','BlogController');

    Route::post('blog/delete/{blog}','BlogController@destroy')->name('blog.delete');

    Route::get('console/blog/category/add', 'BlogController@addblogcat')->name('blogcat.create');

    Route::post('console/category/blog/store', 'BlogController@blogcat')->name('blogcat.store');

    Route::get('console/category/blog/publish/{blog}', 'BlogController@publish')->name('blog.publish');
    Route::get('console/category/blog/unpublish/{blog}', 'BlogController@unpublish')->name('blog.unpublish');

    Route::resource('slider', 'SliderController');

    Route::get('slider/del/{slider}', 'SliderController@destroy')->name('delete.slider');

    Route::resource('faq', 'FaqController');
    Route::get('disable/faq/{unid}', 'FaqController@disable')->name('faq.disable');
    Route::get('enable/faq/{unid}', 'FaqController@enable')->name('faq.enable');


});
//Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
//    \UniSharp\LaravelFilemanager\Lfm::routes();
//});


//simple api for giving images
Route::get('/api/get/image/{id}/token', 'GalleryController@apiRequest');