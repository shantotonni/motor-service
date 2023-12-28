<?php

\Debugbar::disable();

Route::get('command', function () {
    \Artisan::call('config:cache');
    \Artisan::call('config:clear');
    \Artisan::call('cache:clear');
});

Route::get('/', function(){
   return redirect()->route('login');
});
Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();

//admin start
Auth::routes();
Route::resource('/admin', 'AdminController');
Route::get('/get-all-user', 'AdminController@getAllUser')->name('get.all.user');
Route::get('/admin/password-change/{id}', 'AdminController@changePassword');
Route::post('/admin/change-password-store', 'AdminController@changePasswordStore')->name('change.password.store');

Route::get('/user-manager-show', 'AdminController@usermanager');
Route::get('/user-menu-permission/{id}', 'AdminController@userMenuPermission');
Route::post('/user-menu-permission/store', 'AdminController@userMenuPermissionStore')->name('user.permission.store');

Route::resource('/menus', 'MenuController');
Route::get('/get-all-menus', 'MenuController@getAllMenu')->name('get.menus');

Route::get('/profile', 'AdminController@profile');
Route::get('/profile/reset_profile_password', 'AdminController@reset_profile_password_view');
Route::post('/profile/reset_profile_password', 'AdminController@reset_profile_password_update');
Route::get('/admin/access/{id}', 'AdminController@access_edit');
Route::post('/admin/access', 'AdminController@access_set');
Route::get('/admin/reset_password/{Id}', 'AdminController@reset_password_view');
Route::post('/admin/reset_password', 'AdminController@reset_password');
Route::resource('/feature', 'FeaturesController');
Route::get("/visitor_count", "VisitorCountController@index");
Route::get("/demonstration-list", "VisitorCountController@demonstrationList")->name('demonstration.list');
Route::get("/demonstration/details/{id}", "VisitorCountController@demonstrationDetails")->name('demonstration.details');
Route::get("/demonstration/delete/{id}", "VisitorCountController@demonstrationDelete")->name('demonstration.delete');
Route::post("/user-import", "AdminController@userImport")->name('user.import');
// admin end

Route::get('/home', 'HomeController@index')->name('home');

// settings 
Route::resource("group", "GroupController");
Route::resource("/company", "CompanyController");
Route::resource("/district", "DistrictController");
Route::resource("/upazila", "UpazilaController");
Route::get('/data-upazila', "UpazilaController@upazilaData")->name('upazila.data');

//This route created by shanto
Route::resource("/customers", "CustomerController");
Route::get("/customers", "CustomerController@index")->name('customers.index');
Route::post('/export-customers', 'CustomerController@exportCustomers')->name('customer.list.export');
Route::resource("/sections", "SectionController");
Route::resource("/topics", "TopicController");
Route::resource("/tractor-service-details", "TractorServiceDetailsController");
Route::get("/tractor-service-details-export", "TractorServiceDetailsController@exportData")->name('tractor.service.details.export');
Route::resource("/service-center", "ServiceCenterController");
Route::resource("/tractor_part", "TractorPartsController");
Route::resource("/tips", "ServiceTipsController");
Route::resource("/service_request", "ServiceRequestController");
Route::resource("/happy-customer", "HappyCustomerController");
Route::resource("/dealer-point", "DealerPointController");
Route::resource("/tractor-product", "TractorProductController");
Route::resource("/servicing_type", "ServicingTypeController");
Route::get("/chassis-number-wise-harvester", "ImportController@chassisNumberWiseHarvester")->name('import.chassis');
Route::post("/chassis-number-wise-harvester", "ImportController@chassisNumberWiseHarvesterStore")->name('import.chassis.store');
Route::resource("/showrooms", "ShowroomController");
Route::resource("/sales-manager-info", "SalesManagerInfoController");
Route::resource("/service-manager", "ServiceManagerController");
Route::resource("/service-income-category", "ServiceIncomeCategoryController");


Route::post("/job-card-export", "JobCardController@jobCardExport")->name('job.card.export');

Route::get('/json/get_upazilla_of_district','CommonSearchController@get_upazilla_of_district');
Route::get("/order-list", "OrderController@orderList")->name('order_list');
Route::get("/order/details/{id}", "OrderController@orderDetails")->name('order.details');
Route::delete("/order-delete/{id}", "OrderController@orderDelete")->name('order.delete');
Route::post("/order-status-change", "OrderController@orderStatusChange")->name('order.status.change');


Route::resource("/role", "RoleController");
Route::resource("/area", "AreaController");
Route::resource("/territory", "TerritoryController");
Route::resource("/user_area", "UserAreaController");
Route::resource("/user_territory", "UserTerritoryController");
Route::get("/json/user-of-territory/{id}", "CommonSearchController@user_of_territory");
Route::resource("/product", "ProductController");
Route::resource("/product_model", "ProductModelController");
Route::resource("/service_type", "ServiceTypeController");
Route::resource("/call_type", "CallTypeController");
Route::resource("/target", "TargetController");
Route::get("/json/user-of-area/{id}", "CommonSearchController@user_of_area");
Route::get("/json/user-of-territory-by-area/{id}", "CommonSearchController@user_of_territory_by_area");
Route::post("/target/get-all-input-data","TargetController@getAllInputData")->name("target.get.all.input.data");
Route::resource("/job_card", "JobCardController");
//new
Route::get("/pending_job_card", "JobCardController@pendingJobCard");
Route::get("/approve_job_card", "JobCardController@approveJobCard");

Route::post("/job_card/approve", "JobCardController@approve")->name('job.card.approve');
Route::resource("/job_card_detail", "JobCardDetailController");
Route::post('job_card/job-card-chassis-update','JobCardController@jobCardChassisUpdate');

Route::resource("/sales-product-category", "SalesProductCategoryController");
Route::resource("/sales-products", "SalesProductsController");

Route::get('/engineer_team','EngineerTeamController@engineer_team');
Route::get('/operator-list','OperatorController@operatorList');
Route::get('/operator/edit/{id?}','OperatorController@operatorEdit')->name('operator.edit');
Route::post('/operator/update','OperatorController@operatorUpdate')->name('operator.update');
Route::get('/operator/{id?}','OperatorController@operatorDelete')->name('operator.destroy');
Route::post("/operator-list-export", "OperatorController@OperatorInformationExport")->name('operator.list.export');

// Report 
Route::get("/report", "ReportController@index");
Route::get("/report/area_wise_report","ReportController@area_wise_report");
Route::get("/report/territory_wise_report","ReportController@territory_wise_report");
Route::get("/report/technitian_wise_monthly_report","ReportController@technitian_wise_monthly_report");
Route::get("/report/technitian_wise_daily_report","ReportController@technitian_wise_daily_report");
Route::get("/report/technitian_wise_monthly_csi","ReportController@technitian_wise_monthly_csi");
Route::get("/report/technitian_wise_monthly_csi_for_harvester","ReportController@technitian_wise_monthly_csi_for_harvester");
Route::get("/report/technitian_wise_monthly_six_hours","ReportController@technitian_wise_monthly_six_hours");
Route::get("/report/technitian_job_card_list","ReportController@technitian_job_card_list");
Route::get("/report/area_wise_job_card_list","ReportController@area_wise_job_card_list");
Route::get("/report/technician_wise_timely_harvester_service","ReportController@technicianWiseTimelyHarvesterService");
Route::get("/json/get_csi_of_job_card","ReportController@get_csi_of_job_card");

Route::get("/admin_dashboard", "AdminDashboardController@index");
Route::resource("/service_master", "ServiceMasterController");

// Kpi 
Route::resource("/kpi_type", "KpiTypeController");
Route::resource("/kpi_type", "KpiTypeController");
Route::resource("/kpi_group", "KpiGroupController");
Route::resource("/user_kpi_code", "UserKpiCodeController");
Route::resource("/kpi_topic", "KpiTopicController");
Route::resource("/user_kpi", "UserKpiController");
Route::resource("/user_kpi_detail", "UserKpiDetailController");

Route::resource("/designation", "DesignationController");


Route::get("/kpi_report", "KpiReportController@index");
Route::get("/technician_kpi_process", "KpiProcessController@technician_kpi_process");
Route::get("/kpi_report_show", "KpiReportController@kpi_report_show");

Route::get('/kpi-master', 'KpiMasterController@index')->name('kpi_master');
Route::post('/kpi-master-import', 'KpiMasterController@import')->name('kpi_master_import');
//Route::get('/kpi-master/detail/{id}', 'KpiMasterController@pending_job_card')->name('kpi_master_detail');
Route::get('/kpi-master/detail/{id}', 'KpiMasterController@details')->name('kpi_master_detail');
Route::post('/kpi-master/get-sorted-data', 'KpiMasterController@getSortedData')->name('kpi_master.sort');
Route::get('/kpi-master/get-filtered-data', 'KpiMasterController@getFilteredData')->name('kpi_master.filter');
Route::get('/month-wise-kpi-report', 'KpiMasterController@monthWiseKpiReport')->name('month-wise-kpi-report');
Route::get('/kpi-master/search', 'KpiMasterController@search')->name('kpi_master_search');
Route::get('/kpi-summary-view', 'KpiMasterController@kpiSummary')->name('kpi_summary');
Route::post('/kpi-summary/get-monthwise-data', 'KpiMasterController@kpiSummarySortedData')->name('kpi_summary.sort');

// Kpi end
Route::resource("/incentive_factor", "IncentiveFactorController");
Route::resource("/base_line", "BaseLineController");
Route::resource("/user_kpi_base_line", "UserKpiBaseLineController");

// Route::resource("/kpia", "KpiaController");
// Route::resource("/kpia_detail", "KpiaDetailController");

// Kpi 1 start 

// kpi 1 report-
Route::get("/kpi_1_process_index", "Kpi1ProcessController@kpi_1_process_index");
Route::get("/kpi_1_process", "Kpi1ProcessController@kpi_1_process");
// kpi 1 process
Route::get("/kpi_1_report", "Kpi1ReportController@index");
Route::get("/kpi_1_report_show", "Kpi1ReportController@kpi_1_report_show");
Route::get("/kpi_1_report_user_wise_show","Kpi1ReportController@kpi_1_report_user_wise_show");
Route::get("/kpi_1_area_wise_ty_wise_show", "Kpi1ReportController@kpi_1_area_wise_ty_wise_show");
// kpi 1 end


Route::resource("/weight", "WeightController");
Route::resource("/kpia_incentive", "KpiaIncentiveController");
Route::resource("/engineer_report_com", "EngineerReportComController");
Route::resource("/cpl_leave_add", "CplLeaveAddController");
Route::resource("/technician_kpi_adjust", "TechnicianKpiAdjustController");

//push notification
Route::get('push-notification', 'PushNotificationController@index')->name('create.notification');
Route::post('send-notification', 'PushNotificationController@sendNotification')->name('send.notification');

//recovery route
Route::get('visit-result', 'RecoveryController@visitResult')->name('visit.result');
Route::get('recovery', 'RecoveryController@recovery')->name('recovery');
Route::post('visit-result-export', 'RecoveryController@export')->name('visit.result.export');
Route::get('sales-inquiry', 'SalesInquiryController@list')->name('sales.inquiry');
Route::get('get-sales-inquiry', 'SalesInquiryController@getSalesInquiry')->name('get.sales.inquiry');
Route::post('sales-inquiry-export', 'SalesInquiryController@salesInquiryExport')->name('sales.inquiry.export');
Route::get('ssr-expense', 'SalesInquiryController@ssrExpense')->name('ssr.expense');
Route::get('create-ssr-expense', 'SalesInquiryController@createSsrExpense')->name('create.ssr.expense');
Route::post('store-ssr-expense', 'SalesInquiryController@storeSsrExpense')->name('store.ssr.expense');
Route::get('edit-ssr-expense/{id}', 'SalesInquiryController@editSsrExpense')->name('edit.ssr.expense');
Route::post('update-ssr-expense', 'SalesInquiryController@updateSsrExpense')->name('update.ssr.expense');
Route::get('export-ssr-expense', 'SalesInquiryController@exportSsrExpense')->name('export.ssr.expense');

Route::get('ssr-expense-show/{id}', 'SalesInquiryController@ssrExpenseShow')->name('ssr.expense.show');
Route::get('/ssr-salary-list', 'SalesInquiryController@ssrSalaryList')->name('ssr.salary.list');
Route::get('/ssr-salary-module', 'SalesInquiryController@ssrSalaryModule')->name('ssr.salary.module');
Route::post('/ssr-salary-export', 'SalesInquiryController@ssrSalaryExport')->name('ssr.salary.export');
Route::post('/ssr-salary-print-pdf', 'SalesInquiryController@ssrSalaryListPrintPdf')->name('ssr.salary.print.pdf');
Route::post('/ssr-salary-list-print-all-pdf', 'SalesInquiryController@ssrSalaryPrintAllPdf')->name('ssr.salary.all.pdf.print');
Route::get('/ssr-salary-details/{Period}/{userid}/{staffid}', 'SalesInquiryController@ssrSalaryDetails')->name('ssr.salary.details');
Route::get('/ssr-salary-approve-disapprove/{Period}/{userid}/{staffid}', 'SalesInquiryController@ssrSalaryApprovedDisapproved')->name('ssr.salary.approve.disapprove');
Route::get('/ssr-salary-all-verified/{Period}', 'SalesInquiryController@ssrSalaryAllVerified')->name('ssr.salary.all.verified');
Route::get('/ssr-salary-all-approved/{Period}', 'SalesInquiryController@ssrSalaryAllApproved')->name('ssr.salary.all.approved');

//Privacy and Terms
Route::get('motor/privacy-policy', 'TermsAndPrivacyController@privacyPolicy');
Route::get('motor/terms-and-conditions', 'TermsAndPrivacyController@termsAndConditions');

//Periodic service
Route::get('/periodic-service-list', 'PeriodicServiceController@index')->name('periodic-service.list');
Route::get('/add-periodic-service/{chassis?}', 'PeriodicServiceController@create')->name('periodic-service.create');
Route::post('/store-service-info','PeriodicServiceController@store')->name('store.service.info');
Route::get('/sysc-periodic-customer-list', 'PeriodicServiceController@syncCustomer')->name("sysc.periodic.customer.list");
Route::get('/show-periodic-service-history','PeriodicServiceController@showPeriodicServicePage')->name('show.periodic.service.page');
Route::get('/show-periodic-report','PeriodicServiceController@showPeriodicReport')->name('show.periodic.report');
Route::post('/periodic-service-histories','PeriodicServiceController@serviceList')->name('post.periodic.service.history');
Route::post('/search-by-chassis-number','PeriodicServiceController@searchByChassisNumber')->name('search.by.chassis');
Route::get('/show-edit-page/{id?}','PeriodicServiceController@edit')->name('show.edit.page');
Route::post('/update-service-info','PeriodicServiceController@update')->name('update.service.info');
Route::post('/delete-service-history','PeriodicServiceController@destroy')->name('delete.service.history');
Route::get('/show-customer-service-info','PeriodicServiceController@showCustomerInfoPage')->name('show.customer.info.page');
Route::post('/post-customer-info','PeriodicServiceController@postCustomerInfo')->name('post.customer.info');
Route::get('/show-next-service-info-page','PeriodicServiceController@showNextServiceInfoPage')->name('show.next.service.info.page');
Route::post('/search-by-chassis-in-invcustomerlist','PeriodicServiceController@searchByChassisNumInvCustomList')->name('search.by.chassis.in.invcustomlist');
Route::get('/search-next-service-by-date','PeriodicServiceController@searchNextServiceByDate')->name('search.next.service.by.date');
Route::get('/search-service-by-address','PeriodicServiceController@searchServiceByAddress')->name('search.service.by.address');
Route::post('/export-periodic-service','PeriodicServiceController@exportPeriodicService')->name('export.periodic.service');
Route::post('/export-periodic-report','PeriodicServiceController@exportPeriodicReport')->name('export.periodic.report');
Route::get('/search-service-by-status','PeriodicServiceController@searchServiceByStatus')->name('search.service.by.status');
Route::get('/customer-search-by-code','PeriodicServiceController@customerSearchByCode')->name('customer.search.by.code');
Route::post('/get-customer-info-by-code','PeriodicServiceController@getCustomerInfoByCode')->name('get.customer.info.by.code');
Route::get('/periodic-service-dashboard','PeriodicServiceController@dashboard')->name('periodic-service.dashboard');
Route::post('/tractor-captured-sold','PeriodicServiceController@tractorCaptured')->name('tractor.captured.sold');


Route::get('/test-insert','PeriodicServiceController@testInsert');