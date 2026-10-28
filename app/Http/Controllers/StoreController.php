<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    public function index(){
        return view('auth.make-store');
    }
    public function create(Request $request){
        if($request->user()->store){
            redirect()->route('dashboard.store');
        }
        return view('auth.make-store');
    }
    public function loginStore(){

    }
    public function store(Request $request){
        $user = $request->user();

        if($user->store){
            return redirect()->route('dashboard.store');
        }

        $data = $request->validate([
            'name'        => ['required', 'string', 'max:100', 'unique:stores,name'],
            'description' => ['nullable', 'string', 'max:1000'],
            'logo'        => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'phone'       => ['nullable', 'string', 'max:20', 'regex:/^[0-9+\-\s]+$/'],
            'city'        => ['nullable', 'string', 'max:100'],
            'address'     => ['nullable', 'string', 'max:500'],
        ]);

        if($request->hasFile('logo')){
            $data['logo'] = $request->file('logo')->store('store-logos' , 'public');
        }

        $data['slug'] = $this->uniqueSlug($data['name']);

        $user->store()->create($data);

        return redirect()
            ->route('dashboard.store')
            ->with('success', 'Toko berhasil dibuat. Sekarang tambahkan produk pertamamu!');
    }
    private function uniqueSlug(string $name): string{
        $base = Str::slug($name) ?: 'store';
        $slug = $base;
        $i = 2;

        while(Store::where('slug' , $slug)->exists()){
            $slug = $base . '-' . $i++;
        }
        return $slug;
    }
}
