<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Lang;

class InformativePageController extends Controller
{

    /**
     *
     * @param $page
     * @return \Illuminate\Http\JsonResponse
     * @author Jaynil Parekh
     * @since 2020-06-09
     *
     * Get Informative page content
     *
     */
    public function getInformativePage($page)
    {
        try {
            $response['page_detail'] = trans('informative-page.' . $page);
            $response['status'] = 200;
            $response['success'] = true;
        } catch (\Exception $ex) {
            $response['message'] = $ex->getMessage();
            $response['status'] = 403;
        }
        return response()->json($response);
    }

    public function getLabels()
    {
        try {
            $response['labels'] = Lang::get('mobile');
            $response['status'] = 200;
            $response['success'] = true;
        } catch (\Exception $ex) {
            $response['message'] = $ex->getMessage();
            $response['status'] = 403;
        }
        return response()->json($response);
    }

}
