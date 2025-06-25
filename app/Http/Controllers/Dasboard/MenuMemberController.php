<?php

namespace App\Http\Controllers\Dasboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use Illuminate\Support\Facades\File;

class MenuMemberController extends Controller
{
    //
    public function index(Request $request)
    {
        $search = $request->input('search');

        $members = Member::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('created_at', 'asc')
            // ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('admin.member', compact('members'));
    }

    public function edit($id)
    {
        $member = Member::findOrFail($id);
        return view('admin.edit-member', compact('member'));
    }

    public function update(Request $request, $id)
    {
        $member = Member::findOrFail($id);

        // Update data teks biasa
        $member->name = $request->name;
        $member->email = $request->email;
        $member->alamat = $request->alamat;
        $member->wa = $request->wa;

        // Jika ada file baru diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama
            if ($member->foto && file_exists(public_path($member->foto))) {
                unlink(public_path($member->foto));
            }

            // Simpan foto baru
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/members'), $filename);

            // Simpan path ke database
            $member->foto = 'uploads/members/' . $filename;
        }

        $member->save();

        return redirect()->route('admin.members')->with('success', 'Data member diperbarui.');
    }


    public function destroy($id)
    {
        $member = Member::findOrFail($id);

        if ($member->foto) {
            $filePath = public_path($member->foto);
            if (File::exists($filePath)) {
                File::delete($filePath);
            }
        }

        $member->delete();
        return back()->with('success', 'Data member dihapus.');
    }
}
