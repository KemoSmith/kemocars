<?php

namespace App\Http\Controllers\Api;

use App\ContactInfo;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactInfoUpdateRequest;
use Illuminate\Http\Request;

class ContactInfoController extends Controller
{
    public function index()
    {
        return response()->json([
            'contact_info' => auth()->user()->contact_info
        ]);
    }

    public function store(ContactInfoUpdateRequest $request)
    {
        $contact_info = auth()->user()->contact_info()->create($request->only(['type', 'info']));

        return response()->json([
            'contact_info' => $contact_info
        ]);
    }

    public function update(ContactInfo $contactInfo, ContactInfoUpdateRequest $request)
    {
        $this->authorize('update', $contactInfo);

        $updated = $contactInfo->update($request->only(['type', 'info']));

        return response()->json([
            'updated' => $updated
        ]);
    }

    public function delete(ContactInfo $contactInfo)
    {
        $this->authorize('delete', $contactInfo);

        $deleted = $contactInfo->delete();

        return response()->json([
            'deleted' => $deleted
        ]);
    }
}
