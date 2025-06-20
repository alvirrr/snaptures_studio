<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditProfilMemberController extends Controller
{
    public function edit()
    {
        /** @var Member $member */
        $member = Auth::guard('member')->user();
        return view('member.editprofil-member', compact('member'));
    }

    public function update(Request $request)
    {
        /** @var Member $member */
        $member = Auth::guard('member')->user();

        $data = $request->validate([
            'name'  => 'required',
            'alamat' => 'required',
            'wa'    => 'required',
            'foto'  => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $file     = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/members'), $filename);
            $data['foto'] = 'uploads/members/' . $filename;
        }

        $member->update($data);
        return redirect()->route('member.dashboard')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}
