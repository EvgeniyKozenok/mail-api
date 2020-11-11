<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Validator;

class DispatchController extends BaseApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'msg' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->fails());
        }

        $dispatch = auth()->user()->dispatch()->create($input);

        // todo directly send email or add to queue

        return $this->sendResponse($dispatch->toArray(), 'Message send successfully.');
    }
}
