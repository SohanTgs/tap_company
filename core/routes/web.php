<?php

use Illuminate\Support\Facades\Route;

Route::get('/clear', function(){
    \Illuminate\Support\Facades\Artisan::call('optimize:clear');
});

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::namespace('Gateway')->prefix('ipn')->name('ipn.')->group(function () {
    Route::post('paypal', 'paypal\ProcessController@ipn')->name('paypal');
    Route::get('paypal_sdk', 'paypal_sdk\ProcessController@ipn')->name('paypal_sdk');
    Route::post('perfect_money', 'perfect_money\ProcessController@ipn')->name('perfect_money');
    Route::post('stripe', 'stripe\ProcessController@ipn')->name('stripe');
    Route::post('stripe_js', 'stripe_js\ProcessController@ipn')->name('stripe_js');
    Route::post('stripe_v3', 'stripe_v3\ProcessController@ipn')->name('stripe_v3');
    Route::post('skrill', 'skrill\ProcessController@ipn')->name('skrill');
    Route::post('paytm', 'paytm\ProcessController@ipn')->name('paytm');
    Route::post('payeer', 'payeer\ProcessController@ipn')->name('payeer');
    Route::post('paystack', 'paystack\ProcessController@ipn')->name('paystack');
    Route::post('voguepay', 'voguepay\ProcessController@ipn')->name('voguepay');
    Route::get('flutterwave/{trx}/{type}', 'flutterwave\ProcessController@ipn')->name('flutterwave');
    Route::post('razorpay', 'razorpay\ProcessController@ipn')->name('razorpay');
    Route::post('instamojo', 'instamojo\ProcessController@ipn')->name('instamojo');
    Route::get('blockchain', 'blockchain\ProcessController@ipn')->name('blockchain');
    Route::get('blockio', 'blockio\ProcessController@ipn')->name('blockio');
    Route::post('coinpayments', 'coinpayments\ProcessController@ipn')->name('coinpayments');
    Route::post('coinpayments_fiat', 'coinpayments_fiat\ProcessController@ipn')->name('coinpayments_fiat');
    Route::post('coingate', 'coingate\ProcessController@ipn')->name('coingate');
    Route::post('coinbase_commerce', 'coinbase_commerce\ProcessController@ipn')->name('coinbase_commerce');
    Route::get('mollie', 'mollie\ProcessController@ipn')->name('mollie');
    Route::post('cashmaal', 'cashmaal\ProcessController@ipn')->name('cashmaal');

    Route::post('tap_company', 'tap_company\ProcessController@ipn')->name('tap_company');
});

// User Support Ticket
Route::prefix('ticket')->group(function () {
    Route::get('/', 'TicketController@supportTicket')->name('ticket');
    Route::get('/new', 'TicketController@openSupportTicket')->name('ticket.open');
    Route::post('/create', 'TicketController@storeSupportTicket')->name('ticket.store');
    Route::get('/view/{ticket}', 'TicketController@viewTicket')->name('ticket.view');
    Route::put('/reply/{ticket}', 'TicketController@replyTicket')->name('ticket.reply');
    Route::get('/download/{ticket}', 'TicketController@ticketDownload')->name('ticket.download');
});


/*
|--------------------------------------------------------------------------
| Start Admin Area
|--------------------------------------------------------------------------
*/

Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::namespace('Auth')->group(function () {
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login')->name('login');
        Route::get('logout', 'LoginController@logout')->name('logout');
        // Admin Password Reset
        Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.reset');
        Route::post('password/reset', 'ForgotPasswordController@sendResetLinkEmail');
        Route::post('password/verify-code', 'ForgotPasswordController@verifyCode')->name('password.verify-code');
        Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.change-link');
        Route::post('password/reset/change', 'ResetPasswordController@reset')->name('password.change');
    });


    Route::middleware('admin')->group(function () {
        Route::get('dashboard', 'AdminController@dashboard')->name('dashboard');
        Route::get('profile', 'AdminController@profile')->name('profile');
        Route::post('profile', 'AdminController@profileUpdate')->name('profile.update');
        Route::get('password', 'AdminController@password')->name('password');
        Route::post('password', 'AdminController@passwordUpdate')->name('password.update');

        //User transfer history
        Route::get('users-transfer-history', 'TransferHistoryController@history')->name('money.transfer');

        //Admin provides bonus to the all users
        Route::get('provide-bonus', 'TransferHistoryController@provideBonusForm')->name('provide.bonus');
        Route::post('provide-bonus-confirm', 'TransferHistoryController@provideBonusConfirm')->name('provide.bonus.confirm');

        // Bonus setting manage
        Route::get('bonus-setting', 'BonusController@bonusPage')->name('bonus.setting');
        Route::post('save-bonus-setting-data', 'BonusController@bonusSettingSave')->name('bonus.setting.save');
        Route::post('update-bonus-setting-data', 'BonusController@bonusSettingUpdate')->name('bonus.setting.update');

        Route::get('deposit-level-tree', 'BonusController@depositLevelTree')->name('level.tree');
        Route::post('deposit-level-tree-create', 'BonusController@depositLevelTreeCreate')->name('level.tree.create');
        Route::post('deposit-level-tree-edit', 'BonusController@depositLevelTreeEdit')->name('level.tree.edit');
        Route::delete('deposit-level-tree-delete', 'BonusController@depositLevelTreeDelete')->name('level.tree.delete');

        Route::get('total-deposit-bonus', 'BonusController@totalDepositBonus')->name('total.deposit.bonus');

        // API for currency rate
        Route::get('currency-conversion-rate-api', 'ApiController@currencyApi')->name('api.currency');
        Route::get('currency-conversion-rate/{id}', 'ApiController@currencyApiRate')->name('api.currency.rate');
        Route::post('currency-conversion-rate-api-create', 'ApiController@currencyApiCreate')->name('api.currency.create');
        Route::post('currency-conversion-rate-api-edit', 'ApiController@currencyApiEdit')->name('api.currency.edit');
        // Users Manager
        Route::get('users', 'ManageUsersController@allUsers')->name('users.all');
        Route::get('users/active', 'ManageUsersController@activeUsers')->name('users.active');
        Route::get('users/banned', 'ManageUsersController@bannedUsers')->name('users.banned');
        Route::get('users/email-verified', 'ManageUsersController@emailVerifiedUsers')->name('users.emailVerified');
        Route::get('users/email-unverified', 'ManageUsersController@emailUnverifiedUsers')->name('users.emailUnverified');
        Route::get('users/sms-unverified', 'ManageUsersController@smsUnverifiedUsers')->name('users.smsUnverified');
        Route::get('users/sms-verified', 'ManageUsersController@smsVerifiedUsers')->name('users.smsVerified');

        Route::get('users/{scope}/search', 'ManageUsersController@search')->name('users.search');
        Route::get('user/detail/{id}', 'ManageUsersController@detail')->name('users.detail');
        Route::post('user/update/{id}', 'ManageUsersController@update')->name('users.update');
        Route::post('user/add-sub-balance/{id}', 'ManageUsersController@addSubBalance')->name('users.addSubBalance');
        Route::get('user/send-email/{id}', 'ManageUsersController@showEmailSingleForm')->name('users.email.single');
        Route::post('user/send-email/{id}', 'ManageUsersController@sendEmailSingle')->name('users.email.single');
        Route::get('user/transactions/{id}', 'ManageUsersController@transactions')->name('users.transactions');
        Route::get('user/deposits/{id}', 'ManageUsersController@deposits')->name('users.deposits');
        Route::get('user/withdrawals/{id}', 'ManageUsersController@withdrawals')->name('users.withdrawals');

        //Top referral list
        Route::get('user/top-referral', 'ManageUsersController@topReferral')->name('top.referral');
        Route::get('user/total-registration-bonus', 'ManageUsersController@totalRegistrationBonus')->name('total.registraion.bonus');
        Route::get('user/total-referral-registration-bonus', 'ManageUsersController@totalRefferalBonus')->name('total.refferal.bonus');
        Route::get('user/total-withdraw-bonus', 'ManageUsersController@totalWithdrawBonus')->name('total.withdraw.bonus');
        Route::get('user/total-transaction-bonus', 'ManageUsersController@totalTransactionBonus')->name('total.transaction.bonus');

        //Bonus History
        Route::get('user/bonus-history/{id}', 'ManageUsersController@bonusHistory')->name('users.bonus.history');
        Route::get('user/total-referral/{id}', 'ManageUsersController@totalReferral')->name('users.total.referral');
        //Toal reciver and send history
        Route::get('user/sent-money-history/{id}', 'ManageUsersController@sendHistory')->name('users.send.history');
        Route::get('user/receiver-money-history/{id}', 'ManageUsersController@receiveHistory')->name('users.receive.history');

        // Login History
        Route::get('users/login/history/{id}', 'ManageUsersController@userLoginHistory')->name('users.login.history.single');
        Route::get('users/login/history', 'ManageUsersController@loginHistory')->name('users.login.history');
        Route::get('users/login/ipHistory/{ip}', 'ManageUsersController@loginIpHistory')->name('users.login.ipHistory');

        Route::get('users/send-email', 'ManageUsersController@showEmailAllForm')->name('users.email.all');
        Route::post('users/send-email', 'ManageUsersController@sendEmailAll')->name('users.email.send');


        // Subscriber
        Route::get('subscriber', 'SubscriberController@index')->name('subscriber.index');
        Route::get('subscriber/send-email', 'SubscriberController@sendEmailForm')->name('subscriber.sendEmail');
        Route::post('subscriber/remove', 'SubscriberController@remove')->name('subscriber.remove');
        Route::post('subscriber/send-email', 'SubscriberController@sendEmail')->name('subscriber.sendEmail');

        // DEPOSIT SYSTEM
        Route::name('deposit.')->prefix('deposit')->group(function(){
            Route::get('/', 'DepositController@deposit')->name('list');
            Route::get('pending', 'DepositController@pending')->name('pending');
            Route::get('rejected', 'DepositController@rejected')->name('rejected');
            Route::get('approved', 'DepositController@approved')->name('approved');
            Route::get('successful', 'DepositController@successful')->name('successful');
            Route::get('details/{id}', 'DepositController@details')->name('details');

            Route::post('reject', 'DepositController@reject')->name('reject');
            Route::post('approve', 'DepositController@approve')->name('approve');
            Route::get('/{scope}/search', 'DepositController@search')->name('search');

            // Deposit Gateway
            Route::get('gateway', 'GatewayController@index')->name('gateway.index');
            Route::get('gateway/edit/{alias}', 'GatewayController@edit')->name('gateway.edit');
            Route::post('gateway/update/{code}', 'GatewayController@update')->name('gateway.update');
            Route::post('gateway/remove/{code}', 'GatewayController@remove')->name('gateway.remove');
            Route::post('gateway/activate', 'GatewayController@activate')->name('gateway.activate');
            Route::post('gateway/deactivate', 'GatewayController@deactivate')->name('gateway.deactivate');

            // Manual Methods
            Route::get('gateway/manual', 'ManualGatewayController@index')->name('manual.index');
            Route::get('gateway/manual/new', 'ManualGatewayController@create')->name('manual.create');
            Route::post('gateway/manual/new', 'ManualGatewayController@store')->name('manual.store');
            Route::get('gateway/manual/edit/{alias}', 'ManualGatewayController@edit')->name('manual.edit');
            Route::post('gateway/manual/update/{id}', 'ManualGatewayController@update')->name('manual.update');
            Route::post('gateway/manual/activate', 'ManualGatewayController@activate')->name('manual.activate');
            Route::post('gateway/manual/deactivate', 'ManualGatewayController@deactivate')->name('manual.deactivate');
        });

        // Report
        Route::get('report/transaction', 'ReportController@transaction')->name('report.transaction');
        Route::get('report/transaction/search', 'ReportController@transactionSearch')->name('report.transaction.search');
        // Currency wise report
        Route::get('currency-wise-transaction/{id}/{wallet}', 'ReportController@currencyWiseTransaction')->name('currency.wise.transaction');

        // WITHDRAW SYSTEM
        Route::name('withdraw.')->prefix('withdraw')->group(function(){
            Route::get('pending', 'WithdrawalController@pending')->name('pending');
            Route::get('approved', 'WithdrawalController@approved')->name('approved');
            Route::get('rejected', 'WithdrawalController@rejected')->name('rejected');
            Route::get('log', 'WithdrawalController@log')->name('log');
            Route::get('{scope}/search', 'WithdrawalController@search')->name('search');
            Route::get('details/{id}', 'WithdrawalController@details')->name('details');
            Route::post('approve', 'WithdrawalController@approve')->name('approve');
            Route::post('reject', 'WithdrawalController@reject')->name('reject');


            // Withdraw Method
            Route::get('method/', 'WithdrawMethodController@methods')->name('method.index');
            Route::get('method/create', 'WithdrawMethodController@create')->name('method.create');
            Route::post('method/create', 'WithdrawMethodController@store')->name('method.store');
            Route::get('method/edit/{id}', 'WithdrawMethodController@edit')->name('method.edit');
            Route::post('method/edit/{id}', 'WithdrawMethodController@update')->name('method.update');
            Route::post('method/activate', 'WithdrawMethodController@activate')->name('method.activate');
            Route::post('method/deactivate', 'WithdrawMethodController@deactivate')->name('method.deactivate');
        });


        // Admin Support
        Route::get('tickets', 'SupportTicketController@tickets')->name('ticket');
        Route::get('tickets/pending', 'SupportTicketController@pendingTicket')->name('ticket.pending');
        Route::get('tickets/closed', 'SupportTicketController@closedTicket')->name('ticket.closed');
        Route::get('tickets/answered', 'SupportTicketController@answeredTicket')->name('ticket.answered');
        Route::get('tickets/view/{id}', 'SupportTicketController@ticketReply')->name('ticket.view');
        Route::put('ticket/reply/{id}', 'SupportTicketController@ticketReplySend')->name('ticket.reply');
        Route::get('ticket/download/{ticket}', 'SupportTicketController@ticketDownload')->name('ticket.download');
        Route::post('ticket/delete', 'SupportTicketController@ticketDelete')->name('ticket.delete');


        // Language Manager
        Route::get('/language', 'LanguageController@langManage')->name('language-manage');
        Route::post('/language', 'LanguageController@langStore')->name('language-manage-store');
        Route::delete('/language/delete/{id}', 'LanguageController@langDel')->name('language-manage-del');
        Route::post('/language/update/{id}', 'LanguageController@langUpdatepp')->name('language-manage-update');
        Route::get('/language/edit/{id}', 'LanguageController@langEdit')->name('language-key');
        Route::put('/language/keyword-update/{id}', 'LanguageController@langUpdate')->name('language.key-update');
        Route::post('/language/import', 'LanguageController@langImport')->name('language.import_lang');



        Route::post('store-lang-key/{id}', 'LanguageController@storeLanguageJson')->name('store-lang-key');
        Route::post('delete-lang-key/{id}', 'LanguageController@deleteLanguageJson')->name('delete-lang-key');
        Route::post('update-lang-key/{id}', 'LanguageController@updateLanguageJson')->name('update-lang-key');



        // General Setting
        Route::get('setting', 'GeneralSettingController@index')->name('setting.index');
        Route::post('setting', 'GeneralSettingController@update')->name('setting.update');

        // Logo-Icon
        Route::get('setting/logo-icon', 'GeneralSettingController@logoIcon')->name('setting.logo-icon');
        Route::post('setting/logo-icon', 'GeneralSettingController@logoIconUpdate')->name('setting.logo-icon');

        // Plugin
        Route::get('plugin', 'PluginController@index')->name('plugin.index');
        Route::post('plugin/update/{id}', 'PluginController@update')->name('plugin.update');
        Route::post('plugin/activate', 'PluginController@activate')->name('plugin.activate');
        Route::post('plugin/deactivate', 'PluginController@deactivate')->name('plugin.deactivate');


        // Email Setting
        Route::get('email-template/global', 'EmailTemplateController@emailTemplate')->name('email-template.global');
        Route::post('email-template/global', 'EmailTemplateController@emailTemplateUpdate')->name('email-template.global');
        Route::get('email-template/setting', 'EmailTemplateController@emailSetting')->name('email-template.setting');
        Route::post('email-template/setting', 'EmailTemplateController@emailSettingUpdate')->name('email-template.setting');
        Route::get('email-template/index', 'EmailTemplateController@index')->name('email-template.index');
        Route::get('email-template/{id}/edit', 'EmailTemplateController@edit')->name('email-template.edit');
        Route::post('email-template/{id}/update', 'EmailTemplateController@update')->name('email-template.update');
        Route::post('email-template/send-test-mail', 'EmailTemplateController@sendTestMail')->name('email-template.sendTestMail');


        // SMS Setting
        Route::get('sms-template/global', 'SmsTemplateController@smsSetting')->name('sms-template.global');
        Route::post('sms-template/global', 'SmsTemplateController@smsSettingUpdate')->name('sms-template.global');
        Route::get('sms-template/index', 'SmsTemplateController@index')->name('sms-template.index');
        Route::get('sms-template/edit/{id}', 'SmsTemplateController@edit')->name('sms-template.edit');
        Route::post('sms-template/update/{id}', 'SmsTemplateController@update')->name('sms-template.update');
        Route::post('email-template/send-test-sms', 'SmsTemplateController@sendTestSMS')->name('email-template.sendTestSMS');

        // SEO
        Route::get('seo', 'FrontendController@seoEdit')->name('seo');


        // Frontend
        Route::name('frontend.')->prefix('frontend')->group(function () {


            Route::get('templates', 'FrontendController@templates')->name('templates');
            Route::post('templates', 'FrontendController@templatesActive')->name('templates.active');


            Route::get('frontend-sections/{key}', 'FrontendController@frontendSections')->name('sections');
            Route::post('frontend-content/{key}', 'FrontendController@frontendContent')->name('sections.content');
            Route::get('frontend-element/{key}/{id?}', 'FrontendController@frontendElement')->name('sections.element');
            Route::post('remove', 'FrontendController@remove')->name('remove');

            // Page Builder
            Route::get('manage-pages', 'PageBuilderController@managePages')->name('manage.pages');
            Route::post('manage-pages', 'PageBuilderController@managePagesSave')->name('manage.pages.save');
            Route::patch('manage-pages', 'PageBuilderController@managePagesUpdate')->name('manage.pages.update');
            Route::delete('manage-pages', 'PageBuilderController@managePagesDelete')->name('manage.pages.delete');
            Route::get('manage-section/{id}', 'PageBuilderController@manageSection')->name('manage.section');
            Route::post('manage-section/{id}', 'PageBuilderController@manageSectionUpdate')->name('manage.section.update');
        });
    });
});

/*
|--------------------------------------------------------------------------
| Start User Area
|--------------------------------------------------------------------------
*/

Route::name('user.')->group(function () {
    Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'Auth\LoginController@login');
    Route::get('logout', 'Auth\LoginController@logoutGet')->name('logout');

    Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
    Route::post('register', 'Auth\RegisterController@register')->middleware('regStatus');

    Route::group(['middleware' => ['guest']], function () {
        Route::get('register/{reference}', 'Auth\RegisterController@referralRegister')->name('refer.register');
    });
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/code-verify', 'Auth\ForgotPasswordController@codeVerify')->name('password.code_verify');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/verify-code', 'Auth\ForgotPasswordController@verifyCode')->name('password.verify-code');
});

Route::name('user.')->prefix('user')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('authorization', 'AuthorizationController@authorizeForm')->name('authorization');
        Route::get('resend-verify', 'AuthorizationController@sendVerifyCode')->name('send_verify_code');
        Route::post('verify-email', 'AuthorizationController@emailVerification')->name('verify_email');
        Route::post('verify-sms', 'AuthorizationController@smsVerification')->name('verify_sms');
        Route::post('verify-g2fa', 'AuthorizationController@g2faVerification')->name('go2fa.verify');

        Route::middleware(['checkStatus'])->group(function () {
            Route::get('dashboard', 'UserController@home')->name('home');

            //User panel color setting
            Route::post('change-user-panel-color', 'UserController@colorChange');
            Route::get('change-user-panel-color-reset', 'UserController@colorReset');

            //Balance Transfer
            Route::get('balance-transfer', 'BalanceTransferController@transferForm')->name('balance.transfer');
            Route::post('transfer-user-search', 'BalanceTransferController@transferUserSearch');
            Route::get('check-transfer-balance', 'BalanceTransferController@checkTransferBalance');
            Route::get('search-receiver', 'BalanceTransferController@searchReceiver');
            Route::post('transfer-balace-confirm', 'BalanceTransferController@transferConfirm')->name('transfer.confirm');
            //All levels bonus & history log
            Route::get('levels-bonus', 'UserController@allLevelBonus')->name('all.level.bonus');
            Route::get('referrals-bonus', 'UserController@allReferralBonus')->name('referral.bonus');
            Route::get('transactions-bonus', 'UserController@allTrxBonus')->name('transaction.bonus');
            Route::get('withdraw-bonus', 'UserController@allWithdrawBonus')->name('withdraw.bonus');
            Route::get('previous-history', 'UserController@previousHistory')->name('previous.history');
            //Bonus from admin
            Route::get('instant-bonus', 'UserController@instantBonus')->name('instant.bonus');

            //All referrals link view
            Route::get('all-referrals', 'UserController@allReferralsView')->name('all.referrals.view');

            Route::get('profile-setting', 'UserController@profile')->name('profile-setting');
            Route::post('profile-setting', 'UserController@submitProfile');
            Route::get('change-password', 'UserController@changePassword')->name('change-password');
            Route::post('change-password', 'UserController@submitPassword');

            Route::get('transfer-wallet', 'UserController@transferWallet')->name('transfer.wallet');

            //2FA
            Route::get('twofactor', 'UserController@show2faForm')->name('twofactor');
            Route::post('twofactor/enable', 'UserController@create2fa')->name('twofactor.enable');
            Route::post('twofactor/disable', 'UserController@disable2fa')->name('twofactor.disable');


            // Deposit
            Route::any('/deposit', 'Gateway\PaymentController@deposit')->name('deposit');
            Route::post('deposit/insert', 'Gateway\PaymentController@depositInsert')->name('deposit.insert');
            Route::get('deposit/preview', 'Gateway\PaymentController@depositPreview')->name('deposit.preview');
            Route::get('deposit/confirm', 'Gateway\PaymentController@depositConfirm')->name('deposit.confirm');
            Route::get('deposit/manual', 'Gateway\PaymentController@manualDepositConfirm')->name('deposit.manual.confirm');
            Route::post('deposit/manual', 'Gateway\PaymentController@manualDepositUpdate')->name('deposit.manual.update');
            Route::get('deposit/history', 'UserController@depositHistory')->name('deposit.history');

            //Transfer
            Route::get('transfer/history', 'BalanceTransferController@transferHistory')->name('transfer.history');
            Route::get('receive-balances', 'BalanceTransferController@getBalanceLogs')->name('get.balance.log');

            //Refress convert currecy rate
            Route::get('refress-currency-convert-rate', 'UserController@refressRate')->name('refress.rate');
            Route::post('convert-currency-amount', 'UserController@convertAmount');
            Route::post('check-convert-currency-amount', 'UserController@checkConvertAmount');
            //Transfer wallet post method
            Route::post('transfer-wallet-post', 'UserController@transferWalletPost')->name('transfer.wallet.post');

            //currency wise log
            Route::get('wallet-history-{currency}', 'UserController@walletHistory')->name('wallet.history');

            // Withdraw
            Route::get('/withdraw', 'UserController@withdrawMoney')->name('withdraw');
            Route::post('/withdraw', 'UserController@withdrawStore')->name('withdraw.money');
            Route::get('/withdraw/preview', 'UserController@withdrawPreview')->name('withdraw.preview');
            Route::post('/withdraw/preview', 'UserController@withdrawSubmit')->name('withdraw.submit');
            Route::get('/withdraw/history', 'UserController@withdrawLog')->name('withdraw.history');

        });
    });
});



Route::get('/contact', 'SiteController@contact')->name('contact');
Route::get('/about', 'SiteController@about')->name('about');

Route::post('/subscribe', 'SiteController@becomeSubscribe')->name('subscribe');

Route::post('/contact', 'SiteController@contactSubmit')->name('contact.send');
Route::get('/change/{lang?}', 'SiteController@changeLanguage')->name('lang');

Route::get('blogs/', 'SiteController@allBlogs')->name('all.blogs');
Route::get('blog/{id}/{slug}', 'SiteController@blogDetails')->name('blog.details');

Route::get('/', 'SiteController@index')->name('home');
Route::get('/{slug}', 'SiteController@pages')->name('pages');

Route::get('placeholder-image/{size}', 'SiteController@placeholderImage')->name('placeholderImage');


