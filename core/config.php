<?php
$model = new Model;
$options = Model::getOptions();

define('URL', $options['root']);
define('zarinpalMerchantID', $options['zarinpalMID']);
define('zarinpalcallBack', URL . 'checkout');
define('mohlate_pardakht', $options['mohlate_pardakht']);
define('body_color', $options['body_color']);
define('menu_color', $options['menu_color']);

//$zarinpalErrorsArray = ;
define('zarinpalErrors', [
    '-1' => 'اطلاعات ارسال شده ناقص است.',
    '-2' => 'آی پی یا مرچنت کد پذیرنده صحیح نیست.',
    '-3' => 'رقم باید بالای ۱۰۰ تومان باشد.',
    '-4' => 'سطح تایید پدیرنده پایین تر از سطح نقره ایست.',
    '-11' => 'درخواست مورد نظر یافت نشد.',
    '-21' => 'هیچ نوع عملیات مالی برای این تراکنش یافت نشد.',
    '-22' => 'تراکنش ناموفق می باشد.',
    '-33' => 'رفم تراکنش با رقم پرداخت شده مطابقت ندارد.',
    '-54' => 'درخواست مورد نظر آرشیو شده.',
    '100' => 'نراکنش با موفقیت انجام شد.',
    '101' => 'عملیات پرداخت با موفقیت انجام شده ولی قبلا عملیات PaymentVerification بر روی این تراکنش انجام شده است.'
]);