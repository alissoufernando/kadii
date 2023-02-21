<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    protected $settings = [
        [
            'key'                       =>  'site_name',
            'value'                     =>  'E-Commerce Application',
        ],
        [
            'key'                       =>  'name',
            'value'                     =>  'E-Shop',
        ],
        [
            'key'                       =>  'address',
            'value'                     =>  '376 Rath Coves Apt. 985 New Theodorebury, NC 99771-2033',
        ],
        [
            'key'                       =>  'site_title',
            'value'                     =>  'E-Commerce',
        ],
        [
            'key'                       =>  'default_email_address',
            'value'                     =>  'admin@admin.com',
        ],
        [
            'key'                       =>  'currency_code',
            'value'                     =>  'GBP',
        ],
        [
            'key'                       =>  'currency_symbol',
            'value'                     =>  '£',
        ],
        [
            'key'                       =>  'site_logo',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'site_favicon',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'footer_copyright_text',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_title',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'seo_meta_description',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_facebook',
            'value'                     =>  'http://jacobs.com/voluptate-beatae-doloremque-perferendis-molestias-nihil-sint',
        ],
        [
            'key'                       =>  'social_twitter',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_instagram',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'social_linkedin',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'google_analytics',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'facebook_pixels',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'stripe_secret_key',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_payment_method',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'paypal_client_id',
            'value'                     =>  '',
        ],
        [
            'key'                       =>  'bic',
            'value'                     =>  'F0NSKHGN',
        ],
        [
            'key'                       =>  'iban',
            'value'                     =>  'IT69L3973730704H8H3D61I53SW',
        ],
        [
            'key'                       =>  'bank',
            'value'                     =>  'EcoBank',
        ],
        [
            'key'                       =>  'bank_address',
            'value'                     =>  '15942 Gottlieb Mall Apt. 543 Myrtlestad, UT 27231',
        ],
        [
            'key'                       =>  'holder',
            'value'                     =>  'POSSIMUS VITAE QUIS.',
        ],
        [
            'key'                       =>  'phone',
            'value'                     =>  '954-261-1152',
        ],
        [
            'key'                       =>  'home',
            'value'                     =>  'Fuga iusto optio.',
        ],
        [
            'key'                       =>  'home_infos',
            'value'                     =>  'Quos eveniet ipsam nihil sunt quibusdam eum. Consectetur quis culpa quidem doloribus amet incidunt. Voluptatem sit architecto nobis. At autem omnis est voluptatem dolor.',
        ],
        [
            'key'                       =>  'home_shipping',
            'value'                     =>  'Ut qui illum magnam dolorum maiores nesciunt nemo. At tenetur recusandae omnis illum. Veniam molestiae voluptatem animi illum sequi. Ratione perferendis mollitia necessitatibus totam debitis culpa.',
        ],
        [
            'key'                       =>  'invoice',
            'value'                     =>  'true',
        ],
        [
            'key'                       =>  'card',
            'value'                     =>  'true',
        ],
        [
            'key'                       =>  'transfer',
            'value'                     =>  'true',
        ],
        [
            'key'                       =>  'check',
            'value'                     =>  'true',
        ],
        [
            'key'                       =>  'mandat',
            'value'                     =>  'true',
        ],
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->settings as $index => $setting) {
            $result = Setting::create($setting);
            if (!$result) {
                $this->command->info("Insert failed at record $index.");
                return;
            }
        }
        $this->command->info('Inserted ' . count($this->settings) . ' records');
    }
}
