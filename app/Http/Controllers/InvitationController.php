<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendInvationRequest;
use App\Mail\InvitationMail;
use App\Models\Colocation;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function sendInvitation(SendInvationRequest $request, Colocation $colocation)
    {

        $token =  uniqid('tok-', true);
        Invitation::create([
            'email' => $request->email,
            'token' => $token,
            'colocation_id' => $colocation->id
        ]);

        Mail::to($request->email)->send(new InvitationMail($colocation, $token));

        return redirect()->route('colocations.index')->with('success', 'invitaion send with success');
    }

    /**
     * Display the specified resource.
     */
    public function acceptInvitation(string $token)
    {
        $invitation = Invitation::where('token', $token)->firstOrFail();
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $colocation = $invitation->colocation;
        $colocation->users()->attach(Auth::id());


        $colocation->users()->syncWithoutDetaching([
            Auth::id() => ['role' => 'member', 'left_at' => null]
        ]);

        $colocations = Colocation::with('users')
            ->where('status', 'active')
            ->get();

        return redirect()->route('colocations.index' , compact('colocations'))->with('success', 'you join to colocation');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
