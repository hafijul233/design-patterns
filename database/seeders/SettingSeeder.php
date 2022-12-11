<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $defaultInvoiceEmailBody = 'You have received a new invoice from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:';
        $defaultEstimateEmailBody = 'You have received a new estimate from <b>{COMPANY_NAME}</b>.</br> Please download using the button below:';
        $defaultPaymentEmailBody = 'Thank you for the payment.</b></br> Please download your payment receipt using the button below:';
        $billingAddressFormat = '<h3>{BILLING_ADDRESS_NAME}</h3><p>{BILLING_ADDRESS_STREET_1}</p><p>{BILLING_ADDRESS_STREET_2}</p><p>{BILLING_CITY}  {BILLING_STATE}</p><p>{BILLING_COUNTRY}  {BILLING_ZIP_CODE}</p><p>{BILLING_PHONE}</p>';
        $shippingAddressFormat = '<h3>{SHIPPING_ADDRESS_NAME}</h3><p>{SHIPPING_ADDRESS_STREET_1}</p><p>{SHIPPING_ADDRESS_STREET_2}</p><p>{SHIPPING_CITY}  {SHIPPING_STATE}</p><p>{SHIPPING_COUNTRY}  {SHIPPING_ZIP_CODE}</p><p>{SHIPPING_PHONE}</p>';
        $companyAddressFormat = '<h3><strong>{COMPANY_NAME}</strong></h3><p>{COMPANY_ADDRESS_STREET_1}</p><p>{COMPANY_ADDRESS_STREET_2}</p><p>{COMPANY_CITY} {COMPANY_STATE}</p><p>{COMPANY_COUNTRY}  {COMPANY_ZIP_CODE}</p><p>{COMPANY_PHONE}</p>';
        $paymentFromCustomerAddress = '<h3>{BILLING_ADDRESS_NAME}</h3><p>{BILLING_ADDRESS_STREET_1}</p><p>{BILLING_ADDRESS_STREET_2}</p><p>{BILLING_CITY} {BILLING_STATE} {BILLING_ZIP_CODE}</p><p>{BILLING_COUNTRY}</p><p>{BILLING_PHONE}</p>';

        $settings = [
            ['name' => 'invoice_auto_generate', 'value' => 'YES', 'enabled' => true],
            ['name' => 'payment_auto_generate', 'value' => 'YES', 'enabled' => true],
            ['name' => 'estimate_auto_generate', 'value' => 'YES', 'enabled' => true],
            ['name' => 'save_pdf_to_disk', 'value' => 'NO', 'enabled' => true],
            ['name' => 'invoice_mail_body', 'value' => $defaultInvoiceEmailBody, 'enabled' => true],
            ['name' => 'estimate_mail_body', 'value' => $defaultEstimateEmailBody, 'enabled' => true],
            ['name' => 'payment_mail_body', 'value' => $defaultPaymentEmailBody, 'enabled' => true],
            ['name' => 'invoice_company_address_format', 'value' => $companyAddressFormat, 'enabled' => true],
            ['name' => 'invoice_shipping_address_format', 'value' => $shippingAddressFormat, 'enabled' => true],
            ['name' => 'invoice_billing_address_format', 'value' => $billingAddressFormat, 'enabled' => true],
            ['name' => 'estimate_company_address_format', 'value' => $companyAddressFormat, 'enabled' => true],
            ['name' => 'estimate_shipping_address_format', 'value' => $shippingAddressFormat, 'enabled' => true],
            ['name' => 'estimate_billing_address_format', 'value' => $billingAddressFormat, 'enabled' => true],
            ['name' => 'payment_company_address_format', 'value' => $companyAddressFormat, 'enabled' => true],
            ['name' => 'payment_from_customer_address_format', 'value' => $paymentFromCustomerAddress, 'enabled' => true],
            ['name' => 'currency', 'value' => 13, 'enabled' => true],
            ['name' => 'time_zone', 'value' => 'Asia/Kolkata', 'enabled' => true],
            ['name' => 'language', 'value' => 'en', 'enabled' => true],
            ['name' => 'fiscal_year', 'value' => '1-12', 'enabled' => true],
            ['name' => 'carbon_date_format', 'value' => 'Y/m/d', 'enabled' => true],
            ['name' => 'moment_date_format', 'value' => 'YYYY/MM/DD', 'enabled' => true],
            ['name' => 'notification_email', 'value' => 'noreply@crater.in', 'enabled' => true],
            ['name' => 'notify_invoice_viewed', 'value' => 'NO', 'enabled' => true],
            ['name' => 'notify_estimate_viewed', 'value' => 'NO', 'enabled' => true],
            ['name' => 'tax_per_item', 'value' => 'NO', 'enabled' => true],
            ['name' => 'discount_per_item', 'value' => 'NO', 'enabled' => true],
            ['name' => 'invoice_email_attachment', 'value' => 'NO', 'enabled' => true],
            ['name' => 'estimate_email_attachment', 'value' => 'NO', 'enabled' => true],
            ['name' => 'payment_email_attachment', 'value' => 'NO', 'enabled' => true],
            ['name' => 'retrospective_edits', 'value' => 'allow', 'enabled' => true],
            ['name' => 'invoice_number_format', 'value' => '{{SERIES:INV}}{{DELIMITER:-}}{{SEQUENCE:6}}', 'enabled' => true],
            ['name' => 'estimate_number_format', 'value' => '{{SERIES:EST}}{{DELIMITER:-}}{{SEQUENCE:6}}', 'enabled' => true],
            ['name' => 'payment_number_format', 'value' => '{{SERIES:PAY}}{{DELIMITER:-}}{{SEQUENCE:6}}', 'enabled' => true],
            ['name' => 'estimate_set_expiry_date_automatically', 'value' => 'YES', 'enabled' => true],
            ['name' => 'estimate_expiry_date_days', 'value' => 7, 'enabled' => true],
            ['name' => 'invoice_set_due_date_automatically', 'value' => 'YES', 'enabled' => true],
            ['name' => 'invoice_due_date_days', 'value' => 7, 'enabled' => true],
            ['name' => 'bulk_exchange_rate_configured', 'value' => 'YES', 'enabled' => true],
            ['name' => 'estimate_convert_action', 'value' => 'no_action', 'enabled' => true],
            ['name' => 'automatically_expire_public_links', 'value' => 'YES', 'enabled' => true],
            ['name' => 'link_expiry_days', 'value' => 7, 'enabled' => true],
            ['name' => 'date_format', 'value' => 'd/M/Y', 'enabled' => true],
            ['name' => 'time_format', 'value' => 'h:m:s', 'enabled' => true],
        ];

        foreach ($settings as $setting) {
            $setting['user_id'] = 1;
            Setting::create($setting);
        }
    }
}
