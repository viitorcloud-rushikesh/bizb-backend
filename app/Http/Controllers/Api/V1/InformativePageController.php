<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Api\APIController;
use Illuminate\Support\Facades\Lang;

class InformativePageController extends APIController
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
            $this->setStatusCode(200);
        } catch (\Exception $ex) {
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(403);
        }
        return $this->respond($response);
    }

    public function getLabels()
    {
        try {
            $response['labels'] = Lang::get('mobile');
            $response['success'] = true;
            $this->setStatusCode(200);
        } catch (\Exception $ex) {
            $response['message'] = $ex->getMessage();
            $this->setStatusCode(403);
        }
        return $this->respond($response);
    }

}
