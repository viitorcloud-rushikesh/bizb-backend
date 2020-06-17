<?php

namespace App\Http\Controllers\Backend\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

/**
 * Class SettingController
 *
 * @package App\Http\Controllers\Admin
 */
class SettingController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $logInUserDetails = Auth::user();
        $twoWayAuthenticationSetting = config('config-variables.two_way_authentication');
        $currentAuthenticationSetting = ($logInUserDetails->two_way_authentication == 1) ? 2 : 1;


        return view('pages.settings', [
            'current_authentication_setting' => $currentAuthenticationSetting,
            'two_way_authentication_setting' => $twoWayAuthenticationSetting,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticationEnable(Request $request)
    {
        $logInUserDetails = Auth::user();

        if ($request->get('authentication_status') == 2) {
            $timeStamp = $request->get('current_timestamp');
            $cacheKey = $timeStamp . '_' . $logInUserDetails->id;

            if (!Cache::has($cacheKey)) {
                $secret = $logInUserDetails->createTwoFactorAuth();
                $quCode = $secret->toQr();
                $secretKey = $secret->toString();

                //Store value to the cache
                Cache::put($cacheKey, [
                    'as_qr_code' => $quCode,
                    'as_string' => $secretKey,
                ]);
            } else {
                $cacheDetails = Cache::get($cacheKey);

                $quCode = $cacheDetails['as_qr_code'];
                $secretKey = $cacheDetails['as_string'];
            }

            return view('pages.authentication_setting', [
                'as_qr_code' => $quCode,
                'as_string' => $secretKey,
            ]);
        } else {
            $logInUserDetails->two_way_authentication = 1;
            $logInUserDetails->save();

            //disabled two factor auth
            $logInUserDetails->disableTwoFactorAuth();

            return redirect()->route('admin.pages.settings');
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function saveTwoWayAuthenticationDetails(Request $request)
    {
        $logInUserDetails = Auth::user();
        $authenticationStatus = $request->get('authentication_status');
        $authenticationCode = $request->get('authentication_code');

        if ($logInUserDetails->confirmTwoFactorAuth($authenticationCode)) {
            $logInUserDetails->two_way_authentication = $authenticationStatus;
            $logInUserDetails->save();

            return redirect()->route('admin.pages.settings');
        } else {
            return redirect()->back();
        }
    }
}
