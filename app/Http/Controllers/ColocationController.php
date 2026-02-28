<?php

namespace App\Http\Controllers;

use App\Http\Requests\CancelColocationRequest;
use App\Http\Requests\StoreColocationRequest;
use App\Http\Requests\UpdateColocationRequest;
use App\Http\Requests\updateColocationStatusRequest;
use App\Models\Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $colocations = Colocation::with(['users', 'owner'])
                ->whereHas('users', function($q) {
                    $q->where('user_id', Auth::id());
                })
                ->get();

        return view('colocations.index', compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colocations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreColocationRequest $request)
    {
        $alreadyHaveColocation = Colocation::where('owner_id', Auth::id())->where('status', 'active')->exists();
        if (!$alreadyHaveColocation) {
         $colocation = Colocation::create([
                'name' => $request->name,
                'owner_id' => Auth::id(),
                'status' => 'active'
            ]);

            $colocation->users()->attach(Auth::id(), [
                'role' => 'owner'
            ]);
            return redirect()->route('colocations.index')->with('success', 'colocation create with successfuly');
        } else {
            return redirect()->route('colocations.index')->with('error', 'You already have an active colocation');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $colocation)
    {
        return view('colocations.edit', compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateColocationRequest $request, Colocation $colocation)
    {
        $colocation->update([
            'name' => $request->name,
            'owner_id' => Auth::id(),
            'status' => 'active'
        ]);
        return redirect()->route('colocations.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation)
    {

        $membersCount = $colocation->users()->count();
        if ($membersCount === 1) {
            $colocation->delete();
            return redirect()->route('colocations.index')
                ->with('success', 'colocation deleted');
        } else {
            return redirect()->route('colocations.index')
                ->with('error', 'You cant delete colocation with members');
        }
    }

    public function updateColocationStatus(updateColocationStatusRequest $request,  Colocation $colocation)
    {

        $haveActiveColocation = Colocation::where('owner_id', Auth::id())->where('status', 'active')->exists();

        if ($colocation->owner_id !== Auth::id()) abort(403);
        $membersCount = $colocation->users()->count();

        if ($request->status == 'active' && $haveActiveColocation) {
            return redirect()->route('colocations.index')->with('error', 'You already have an active colocation');
        }
        if ($membersCount === 1) {
            $colocation->update([
                'status' => $request->status
            ]);
            return redirect()->route('colocations.index')
                ->with('success', 'colocation status updated');
        } else {
            return redirect()->route('colocations.index')
                ->with('error', 'You must remove all members to cancel this colocation');
        }
    }

    public function removeMember(Colocation $colocation, $userId)
{
    if ($colocation->owner_id !== Auth::id()) {
        abort(403);
    }

    if ($userId == $colocation->owner_id) {
        return redirect()->route('colocations.index')
            ->with('error', 'You cannot remove the owner.');
    }

    if (!$colocation->users()->where('user_id', $userId)->exists()) {
        return redirect()->route('colocations.index')
            ->with('error', 'Member not found in this colocation.');
    }

    $colocation->users()->detach($userId);

    return redirect()->route('colocations.index')
        ->with('success', 'Member removed successfully.');
}
}
