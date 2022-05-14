<?php

namespace App\Http\Controllers;

use App\Helpers\PageHelper;
use App\Repositories\SettingRepository;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    protected $settingRepository;
    protected $settingService;

    public function __construct()
    {
        $this->settingRepository = new SettingRepository();
        $this->settingService = new SettingService();
    }

    public function adminSettings(Request $request)
    {
        $data = PageHelper::defaultPageData();
        $data['manage_settings'] = $this->settingRepository->getSettings();

        $data['page_title'] = "Настройки";
        return view('admin.editSettings', compact('data'));
    }

    public function saveSettings(Request $request){
        $keys = $this->settingRepository->getSettingKeys();
        $data = $request->only($keys);

        $this->settingService->saveSettings($data);

        return redirect()->route('adminSettings');
    }
}
