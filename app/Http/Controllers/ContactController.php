<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use Illiminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function submit(ContactRequest $request)
    {
        $validated = $request->validated();

        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }

    public function showForm()
    {
        return view('contact.index');
    }
}
