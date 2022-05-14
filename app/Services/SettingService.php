<?php

namespace App\Services;

use App\Models\Setting;

class SettingService extends AbstractService
{
    protected $model = Setting::class;

    public function saveSettings($data)
    {
        if (empty($data)) {
            return;
        }

        foreach ($data as $key => $value) {
            $this->getModel()
                ->where('key', $key)
                ->update([
                    'value' => $value
                ]);
        }
    }
}
