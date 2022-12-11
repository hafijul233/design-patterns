<?php

namespace App\Http\Controllers;

use App\Interfaces\SettingInterface;
use App\Singletons\Setting;

class SettingTestController extends Controller
{
    public function __construct(public SettingInterface $setting)
    {
    }

    public function test()
    {
        dump("Accessed using Laravel Service container", $this->setting->all());

        unset($this->setting->invoice_auto_generate);

        $this->anotherTest();
    }

    private function anotherTest()
    {
        $setting = Setting::instance();

        dd("Accessed using the Native PHP", $setting->all());
    }
}
