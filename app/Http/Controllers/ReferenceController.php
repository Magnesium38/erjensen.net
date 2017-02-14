<?php namespace App\Http\Controllers;

use App\Models\Reference;

class ReferenceController extends Controller {
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reference  $reference
     * @return \Illuminate\Http\Response
     */
    public function show(Reference $reference) {
        $endpoints = [];

        return view('reference', [
            'reference' => $reference,
            'endpoints' => $endpoints,
        ]);
    }
}
