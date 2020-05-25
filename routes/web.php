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
//Route::get('/', function () { return view('front.template');});
Route::get('/try', function () {
    return view('welcome');
});
Route::get('/','PagesController@displayHome');
Route::get('/login-register', function () { return view('front.login-register');});
Route::get('/history','AboutController@displayOurHistory');
Route::get('/about','AboutController@displayOurCompany');
Route::get('/career','AboutController@dispayCareer');
Route::get('/award','AboutController@displayHonorAward');
Route::get('/team','AboutController@displayOurTeam');
Route::get('/faq','AboutController@displayFaq');
Route::post('/save-history','AboutController@createHistory');
Route::get('/display-history','AboutController@displayHistory')->name('History Table');
Route::get('/delete-history/{id}','AboutController@deleteHistory');
Route::get('/add-history','AboutController@addHistoryForm')->name('Add History Form');
Route::get('/display-award-form','AboutController@addAwardsForm')->name('Award Form');
Route::post('/save-award','AboutController@createAwards');
Route::get('/display-awards','AboutController@displayAwrds')->name('Award Table');
Route::get('/edit-award/{id}','AboutController@editAwardForm')->name('Edi Award Form');
Route::post('/save-award/{id}','AboutController@updateAwardsInformation');
Route::get('/delete-award/{id}','AboutController@deleteAward');
//services
Route::get('/front-account','ServicesController@displayAccount');
Route::get('/front-loan','ServicesController@displayLoans');
Route::get('/front-benefit','ServicesController@displayBenefits');
Route::get('/bss-planning','ServicesController@displayBusinessPlanning');
Route::get('/risk','ServicesController@displayRiskManagement');
Route::get('/front-saving','ServicesController@displaySaving');
Route::get('/our-services','ServicesController@displayServices');
//Messages
Route::post('/save-message','MessagesController@createMessage');
Route::get('/display-message','MessagesController@displayMessages')->name('Message Table');
Route::get('/delete-message/{id}','MessagesController@deleteMessage');
Route::post('/save-subscription','MessagesController@createSubscription');
Route::get('/display-subscription','MessagesController@displaySubscription')->name('Subscription Table');
Route::get('/delete-subscription/{id}','MessagesController@deleteSubscription');

Route::get('/display-coming-soon','MessagesController@displayComing')->name('Coming soon Table');
Route::post('/save-coming-soon','MessagesController@createComingSoon');
Route::get('/display-coming-soon-form','MessagesController@ComingSoonForm')->name('Coming Soon Form');
Route::post('/save-edited-soon/{id}','MessagesController@updateComingSoon');
Route::get('/display-coming-soon-edit-form/{id}','MessagesController@editComingSoonForm')->name('Edit Coming Soon');
Route::get('/delete-coming-soon/{id}','MessagesController@deleteComingSoon');
//Projects
Route::get('/project','ProjectController@displayProjects');
Route::get('/home-project','ProjectController@displayProjectsOnHome');
//Pages
Route::get('/contact','PagesController@displayContactUs');
Route::get('/maintenance','PagesController@displayMaintenance');
Route::get('/coming-soon','PagesController@displaycomingSoon');
Route::post('/save-call-back','PagesController@createCallBack');
Route::get('/display-callback','PagesController@displayCallBack')->name('Call Backs Table');
Route::get('/approve-calback/{id}','PagesController@approveCallBackResponded');
//Laws
Route::get('/laws','LawsController@displayLaws');

//Shop
Route::get('/shop','ShopController@displayCartShop');
Route::get('/cart','ShopController@displayCart');
Route::get('/checkout','ShopController@displayCheckout');
Route::get('/display','ShopController@displayProductInShop');
//Testimony
Route::post('/save-testimony','TestimonyController@createTestimony');
Route::get('/testify','TestimonyController@displayTestimony');
Route::get('/display-unappoved','TestimonyController@displayNotApprovedMessages')->name('UnApproved Testimonies');
Route::get('/approve-testimony/{id}','TestimonyController@approveTestimony');
Route::get('/delete-testimony/{id}','TestimonyController@deleteTestimony');
use Illuminate\Support\Facades\Route;
Route::group(['middleware' => ['auth']], function (){
//Mails
Route::get('/topbar','MailsController@displayMailBarMessage');
Route::get('/display-mailbox','MailsController@displayMailBox')->name('Mailbox');
Route::get('/display-compose','MailsController@displayCompose')->name('Compose');
Route::get('/display-readmail/{id}','MailsController@displayReadMail')->name('Read Mail');
Route::get('/display-sent','MailsController@displaySentMail')->name('Sent Mail');
Route::get('/display-draft','MailsController@displayDraftMail')->name('DraftMail');
Route::get('/display-junk','MailsController@displayJunkMail')->name('Junk Mail');
Route::get('/display-trash','MailsController@displayTrashMail')->name('Trash Mail');
Route::post('/send-mail','MailsController@createMail');
Route::post('/save-unsent-mails','MailsController@saveMail');
Route::get('/send-mail/{id}','MailsController@sendMail');
Route::get('/delete-mail/{id}','MailsController@deleteMail');
Route::get('/display-reply-form/{id}','MailsController@replyMailForm')->name('Reply Form');
Route::post('/save-reply','MailsController@createReplyMail');
Route::get('/display-reply','MailsController@displayReplyMail')->name('Replies Form');
Route::get('/display-reply','MailsController@displayReplyMails')->name('Replies Table');


Route::get('/home-dash','HomeController@index')->name(('Home'));
//Auth::routes();

//About
Route::post('/save-history','AboutController@createHistory');
Route::get('/display-history','AboutController@displayHistory')->name('History Table');
Route::get('/delete-history/{id}','AboutController@deleteHistory');
Route::get('/add-history','AboutController@addHistoryForm')->name('Add History Form');
Route::post('/save-user','UserController@registerUsers');
//Members details
Route::get('/capture-user','Member_detailController@registerUser')->name('Register User');
Route::get('add-members-details','Member_detailController@membersDetails');
Route::get('/addusers','Member_detailController@addUsers');
Route::get('/staff','Member_detailController@showStaff')->name('Staff');
Route::get('/members-details','Member_detailController@showMemberDetails')->name('Registered Members');
Route::get('/save-members-details','Member_detailController@saveMembersDetails');
Route::patch('/update-member-details/{id}','Member_detailController@updateMembersDetailTable');
Route::get('/delete-member-details/{id}','Member_detailController@deleteMembersDetails');
Route::get('/delete-user/{id}','Member_detailController@deleteUser');
Route::get('/edit-user/{id}','Member_detailController@editUsersForm')->name('Edit User Form');
Route::get('/edit-user-details/{id}','Member_detailController@updateUserInformation');
Route::get('/search-member','Member_detailController@searchMember')->name('Searched Member');
Route::get('/search-staff','Member_detailController@searchStaff')->name('Searched Staff');
//Profile
Route::get('/display-profile-form', 'ProfileController@addProfileForm')->name('Profile Form');
Route::post('/save-profile', 'ProfileController@createProfile');
Route::get('/display-profile', 'ProfileController@displayProfile')->name('Profile Form');
Route::get('/edit-profile/{id}', 'ProfileController@editProfileForm')->name('Edit Profile Form');
Route::post('/update-profile/{id}', 'ProfileController@updateProfileInformation');
Route::get('/delete-profile/{id}', 'ProfileController@deleteProfile');
//Next of kin
Route::get('/save-nextofkin-details','Next_of_kinController@saveNextOfKinDetails');
Route::get('/display-next-of-kin-details','Next_of_kinController@displayNextOfKinDetails')->name('Next of Kin Table');
Route::get('/add_next_of_kin','Next_of_kinController@addNextOfKinDetailsForm')->name('Add Next Of Kin Form');
Route::patch('/update-nextofkin-details/{id}','Next_of_kinController@updateNextOfKinDetailTable');
Route::delete('/delete-nextofkin-details/{id}','Next_of_kinController@deleteNextOfKinDetails');
Route::get('/edit-next-of-kin/{id}','Next_of_kinController@editKin')->name('Edit Next of Kin');
Route::get('/update-edited-kin/{id}','Next_of_kinController@saveEditedNextOfKin');
Route::get('/search-kin','Next_of_kinController@searchNextOfKin')->name('Searched Next of Kin');

//Accounts
Route::get('/all-accounts','AccountController@displayAllAccount')->name('All Accounts');
Route::get('/save-account','AccountController@createAccount');
Route::get('/create-account','AccountController@CreateAccounts')->name('accounts Form');
Route::get('/active-accounts','AccountController@displayActiveAccount')->name('My Account');
Route::get('/domant-account','AccountController@displayDomantAccount')->name('Domant Accounts Table');
Route::get('/update-account/{id}','AccountController@updateDomantAccountActive');
Route::get('/delete-account/{id}','AccountController@destroy');
Route::post('/update-edited-account/{id}','AccountController@updateAccountsInformation');
Route::get('/edit-account/{id}','AccountController@editAccountsForm')->name('Edit Account Form');
Route::get('/edit-domant-account/{id}','AccountController@editDomantForm')->name('Edit Domant Account');
Route::get('/save-domant-account-edit/{id}','AccountController@updateDomantAccountsInformation');
Route::get('/search-active','AccountController@searchActiveAccount')->name('Search Account');
Route::get('/search-domant','AccountController@searchDomantAccount');

//savings
Route::get('/save-savings','SavingController@saveSavings');
Route::get('/display-savings','SavingController@showSavings')->name('My Savings');
Route::get('/save-money','SavingController@showSavingsForm')->name('Savings Form');
Route::patch('/update-savings/{id}','SavingController@updateSavings');
Route::delete('/delete-savings/{id}','SavingController@deleteSavings');
Route::get('/search-saving','SavingController@searchSavings')->name('Searched saving Name');
Route::get('/search-my-saving','SavingController@searchMySavings')->name('My Name Search');
Route::get('/all-savings','SavingController@displayAllSavings')->name('All Savings Table');

//loan
Route::get('/all-loans','LoanController@displayAllLoans')->name('All Loan Table');
Route::get('/save-loan','LoanController@createLoan');
Route::get('/loan-active','LoanController@displayLoanDetails')->name('My Loan');
Route::get('/create-loan','LoanController@displayLoanForm')->name('Create Loan Form');
Route::get('/loan-cleared','LoanController@displayLoanCleared')->name('Loan Cleared Table');
Route::get('/update-loan/{id}','LoanController@updateLoan');
Route::get('/pay-loan/{id}','LoanController@payLoanForm')->name('Loan Payment Form');
Route::get('/save-paid-loan/{id}','LoanController@updateLoanInformation');
Route::get('/search-loan','LoanController@searchActiveLoan');
Route::get('/display-payments','LoanController@displayLoanPayments')->name('Loan Payments Details');
Route::get('/display-all-payments','LoanController@displayAllLoanPayments')->name('All Loan Payments');
Route::get('/search-payments','LoanController@searchLoanPayments')->name('Searched Loan Payment');
Route::get('/print-payments'.'LoanController@printPayment')->name('Print Payments');
//Benefits
Route::get('/save-benefit','BenefitController@createBenefit');
Route::get('/accepted-benefit','BenefitController@displayacceptedBenefit')->name('Accepted Benefit');
Route::get('/unaccepted-benefit','BenefitController@displayUnacceptedBenefit')->name('UnAccepted Benefit Form');
Route::get('/create-benefit','BenefitController@displayBenefitForm')->name('Craete Benefit Form');
Route::get('/share-benefit','BenefitController@shareBenefitForm')->name('Share Benefit Form');
Route::get('/delete-benefit/{id}','BenefitController@updateBenefit');
Route::get('/share-benefits-amount','BenefitController@createShareBenefit');
Route::get('View-all-benefits','BenefitController@viewAllBenefit')->name('All Benefits');


//Expenses
Route::get('/save-expenses','ExpensesController@createExpenses');
Route::get('/display-expenses','ExpensesController@displayExpenses')->name('Expenses Table');
Route::get('/display-expenses-form','ExpensesController@displayExpensesForm')->name('Expenses Form');
Route::patch('/edit-expenses/{id}','ExpensesController@editExpenses');
Route::delete('/delete-expenses/{id}','ExpensesController@deleteExpenses');
Route::get('/search-expenses','ExpensesController@searchExpenses')->name('Search Expenses');
//role
Route::get('/save-role-details','RoleController@createRoles');
Route::get('/search-role','RoleController@searchRoles');
Route::get('/role-form','RoleController@addRoleForm')->name('Add Role');
Route::get('/roles','RoleController@getAllRoles')->name('User Accounts');
//permission
Route::post('/assign-permissions/{id}','PermissionController@assign_roles');
Route::get('/unsign-permission/{id}','PermissionController@unsignPermission');
Route::get('/assign-roles','PermissionController@assign_roles');
Route::get('/assign-or-remove-permissions/{id}','PermissionController@getAllPermissionsForARole')->name('Permissions');
Route::get('/checkbox_permissions/{id}','PermissionController@pickAllPermissionsCheckBox')->name('Checkboxes Permissions');

//Users
Route::get('/all_users','UserController@getAllRegisteredUsers')->name('Each Users');
Route::get('/search-user','UserController@searchUser')->name('Searched User');
Route::get('/display-users','UserController@displayAllUsers')->name('All User');
Route::get('/edit-user/{id}','UserController@editUsersForm')->name('Edit User');
Route::post('/save-user/{id}','UserController@updateUserInformation');
Route::get('/suspend-user/{id}','UserController@SuspendUserInformation');

//Change Password
Route::get('/change-passwords',"Member_detailController@displayChangePasswordForm")->name('Change Password');
Route::get('/save-change-password','Member_detailController@store_users_password');

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/ajax',function() {
    return view('after_login.message');
 });
 
 Route::post('/save-project','ProjectController@createProject');
 Route::get('/add-project','ProjectController@displayProjectForm')->name('Add Project Form');
 Route::get('/display-project','ProjectController@displayProjectsOnDashbord')->name('Project Table');
//  Route::get('/home-project','ProjectController@displayProjectsOnHome');
//  Route::get('/home-project','ProjectController@displayProjectsOnHome');

});

Auth::routes();
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
