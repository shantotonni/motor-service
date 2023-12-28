<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });



Route::middleware('api')->post('/auth/login', 'Api\V1\ApiAuthController@login');
Route::middleware('api')->post('/auth/registration', 'Api\V1\ApiAuthController@registration');
Route::middleware('api')->post('/auth/reset-password', 'Api\V1\ApiAuthController@resetPassword');
Route::middleware('api')->post('/auth/update-password', 'Api\V1\ApiAuthController@updatePassword');
Route::middleware('api')->post('/auth/logout','Api\V1\ApiAuthController@logout');


Route::apiResource("/area", "Api\V1\AreaController")->middleware("api");
Route::get("/get-all-areas", "Api\V1\AreaController@getAllAreas")->middleware("api");
Route::apiResource("/product", "Api\V1\ProductController")->middleware("api");
Route::apiResource("/service-type", "Api\V1\ServiceTypeController")->middleware("api");
Route::apiResource("/call-type", "Api\V1\CallTypeController")->middleware("api");
Route::apiResource("/target", "Api\V1\TargetController")->middleware("api");
Route::apiResource("/job-card", "Api\V1\JobCardController")->middleware("customAuth:api");
Route::apiResource("/operator-information", "Api\V1\OperatorInformationController")->middleware("customAuth:api");
Route::post("/filter-job-card", "Api\V1\JobCardController@filterJobCard")->middleware("customAuth:api");
Route::post("/job-card-by-date", "Api\V1\JobCardController@job_card_by_date");
Route::post("/service-income-update", "Api\V1\JobCardController@serviceIncomeUpdate");

//customer job list created shanto
Route::get("/customer-job-list", "Api\V1\CustomerJobCardController@customerJobList")->middleware("customAuth:api");

//Technician route created by shanto
Route::post("/job-card/technician-job-list", "Api\V1\JobCardController@technicianJobList");
Route::post("/job-card/technician-verify", "Api\V1\JobCardController@technicianVerify");
Route::post("/job-card/technician-verify-otp-to-start-work", "Api\V1\JobCardController@technicianVerifyOtpToStartWork");
Route::post("/job-card/send-otp-for-finish-job", "Api\V1\JobCardController@sendOtpForfinishJob");
Route::post("/job-card/send-otp-for-finish-job-verify", "Api\V1\JobCardController@sendOtpForfinishJobVerify");
Route::post("/job-card/send-otp-for-finish-job-verify-new", "Api\V1\JobCardController@sendOtpForfinishJobVerifyNew");
Route::post("/job-card/service-income-partial-payment", "Api\V1\JobCardController@serviceIncomePartialPayment");
Route::post("/job-card/technician-total-job-card", "Api\V1\JobCardController@totalJobCard");
Route::post("/job-card/job-card-delete", "Api\V1\JobCardController@jobCardDelete");

Route::post("/job-card/engineer-technician", "Api\V1\EngineerCreateRequestController@engineerTechnician");
Route::post("/job-card/engineer-service-request-list", "Api\V1\EngineerCreateRequestController@engineerServiceRequestList");
Route::post("/job-card/engineer-service-request-update", "Api\V1\EngineerCreateRequestController@engineerServiceRequestUpdate");
Route::get("/engineer-pending-service-request", "Api\V1\EngineerCreateRequestController@getPendingServiceRequests")->middleware("customAuth:api");
Route::post("/job-card/engineer-jod-list", "Api\V1\EngineerCreateRequestController@engineerJobList");
Route::post("/chassis-number-wise-harvester-search", "Api\V1\SearchController@chassisNumberWiseHarvesterSearch");
Route::post("/find-chassis-number", "Api\V1\SearchController@findChassisNumber");
Route::post("/job-card/engineer-jod-card-update", "Api\V1\EngineerCreateRequestController@engineerJobCardUpdate");

Route::get("/get-all", "Api\V1\GetAllController@index")->middleware("customAuth:api");
Route::get("/get-technitian-dashboard-info", "Api\V1\GetAllController@get_technitian_dashboard_info")->middleware("customAuth:api");
//customize api
Route::get("/get-technitian-dashboard-info-by-date", "Api\V1\DashboardController@get_technitian_dashboard_info_by_date");

//shanto api route ->middleware("customAuth:api");
Route::post("/find-service", "Api\V1\TractorServiceController@findService")->middleware("customAuth:api");
Route::get("/get-service-center", "Api\V1\ServiceCenterController@index")->middleware("customAuth:api");
Route::post("/get-parts-by-section", "Api\V1\GetAllDataController@getPartsBySection")->middleware("customAuth:api");
Route::post("/get-parts-by-product-model", "Api\V1\GetAllDataController@getPartsByModel")->middleware("customAuth:api");
Route::get("/get-area", "Api\V1\GetAllDataController@getArea");
Route::get("/get-section", "Api\V1\GetAllDataController@getSection");
Route::get("/get-service-tips", "Api\V1\GetAllDataController@getServiceTips")->middleware("customAuth:api");
Route::get("/get-product", "Api\V1\GetAllDataController@getProduct");
Route::get("/get-product-model", "Api\V1\GetAllDataController@getProductModel");
Route::get("/get-call-type", "Api\V1\GetAllDataController@getCallType");
Route::get("/get-service-type", "Api\V1\GetAllDataController@getServiceType");
Route::get("/get-territory", "Api\V1\GetAllDataController@getTerritory");
Route::get("/get-district", "Api\V1\GetAllDataController@getDistrict");
Route::get("/get-upazila", "Api\V1\GetAllDataController@getUpazila");
Route::get("/get-service-income-category", "Api\V1\GetAllDataController@getServiceIncomeCategory");

Route::get("/get-sales-product-category", "Api\V1\GetAllDataController@getSalesProductCategory")->middleware("customAuth:api");
Route::get("/get-sales-product-by-category/{category_id?}", "Api\V1\GetAllDataController@getSalesProductByCategory")->middleware("customAuth:api");
Route::get("/get-all-push-notifications", "Api\V1\GetAllDataController@getAllPushNotification")->middleware("customAuth:api");
Route::get("/get-showroom-centre", "Api\V1\GetAllDataController@getShowroomCentre")->middleware("customAuth:api");
Route::get("/get-sales-manager-info/{area_id?}", "Api\V1\GetAllDataController@getSalesManagerInfo")->middleware("customAuth:api");
Route::get("/get-service-manager/{area_id?}", "Api\V1\GetAllDataController@getServiceManager")->middleware("customAuth:api");
Route::post("/customer-create-request", "Api\V1\CustomerRequestCreateController@store")->middleware("customAuth:api");
Route::post("/get-technician-by-area", "Api\V1\GetAllDataController@getTechnicianByArea");
Route::get("/get-happy-customer-feedback", "Api\V1\GetAllDataController@getHappyCustomerFeedback")->middleware("customAuth:api");
Route::get("/get-all-technician", "Api\V1\GetAllDataController@getAllTechnician");
Route::post("/near-by-dealer-point", "Api\V1\GetAllDataController@nearByDealerPoint")->middleware("customAuth:api");
Route::post("/order", "Api\V1\OrderController@order")->middleware("customAuth:api");
Route::get("/customer-order-list", "Api\V1\OrderController@customerOrderList")->middleware("customAuth:api");
Route::post("/engineer-create-request", "Api\V1\EngineerCreateRequestController@createRequest");
Route::post("/engineer-resend-otp", "Api\V1\EngineerCreateRequestController@resendOTP");

//harvester spare part route
Route::post("/harvester-spare-parts", "Api\V1\HarvesterSparePartsController@sparePartsList");
Route::post("/harvester-spare-parts-details", "Api\V1\HarvesterSparePartsController@sparePartsDetails");

//recovery route
Route::post("/recovery", "Api\V1\RecoveryController@recovery");
Route::get("/get-all-sales-inquiry", "Api\V1\GetAllController@getAllSalesInquiry")->middleware("customAuth:api");

//sales inquiry api
Route::post("/store-sales-inquiry", "Api\V1\SalesInquiryController@storeSalesInquiry")->middleware("customAuth:api");
Route::post("/get-sales-inquiry-by-upazilla-code", "Api\V1\SalesInquiryController@getSalesInquiryByUpazillaCode");
Route::post("/update-sales-inquiry-by-reference-number", "Api\V1\SalesInquiryController@updateSalesInquiryByReferenceNumber");
Route::post("/ssr-expense", "Api\V1\SalesInquiryController@ssrExpense");
Route::post("/get-ssr-expense-by-user-and-period", "Api\V1\SalesInquiryController@getSSRExpenseByUserAndPeriod");
Route::get("/get-all-ssr-sales-inquiry-list", "Api\V1\SalesInquiryController@getAllSSRSalesInquiryList")->middleware("customAuth:api");

//visit route
Route::get("/get-visit-and-result-data", "Api\V1\VisitController@getVisitResultData")->middleware("customAuth:api");
Route::get("/visit-list", "Api\V1\VisitController@visitList")->middleware("customAuth:api");
Route::post("/visit-store", "Api\V1\VisitController@visitStore")->middleware("customAuth:api");

//customer list motors-invoice-mirror-customer-list
Route::get("/motors-invoice-mirror-customer-list", "Api\V1\VisitController@customerList")->middleware("customAuth:api");

//tractor demonstration
Route::get("/get-all-tractor-model", "Api\V1\GetAllDataController@getAllTractorModel")->middleware("customAuth:api");
Route::get("/get-all-territory", "Api\V1\GetAllDataController@getAllTerritory")->middleware("customAuth:api");
Route::post("/tractor-demonstration", "Api\V1\TractorDemonstration@tractorDemonstration")->middleware("customAuth:api");
Route::get("/tractor-demonstration-list", "Api\V1\TractorDemonstration@tractorDemonstrationList")->middleware("customAuth:api");