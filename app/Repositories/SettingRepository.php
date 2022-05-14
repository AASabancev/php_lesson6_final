<?php

namespace App\Repositories;

use App\Models\Setting;

class SettingRepository extends AbstractRepository
{
    protected $model = Setting::class;

    public function getSettings()
    {
        return Setting::query()
            ->get();
    }

    public function getSettingKeys()
    {
        return $this->getModel()
            ->pluck('key')
            ->toArray();
    }
}
