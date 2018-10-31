<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class entryPassController extends Controller
{
    public function show($entryPass_id)
    {
        return entryPass::findOrFail($entryPass_id);
    }

    public function store
}
