<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreShopRequest;
use App\Http\Requests\UpdateShopRequest;
use App\Models\Shop;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $shops = Shop::all();

        return view('shops.index', [
            'shops' => $shops,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('shops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShopRequest $request): RedirectResponse
    {
       $name = $request->get('name');
       $email = $request->get('email');
       $isActive = boolval($request->get('is_active'));

       Shop::create([
           'name' => $name,
           'email' => $email,
           'is_active' => $isActive,
       ]);

        return redirect()
         ->route('shops.index')
         ->with('success', 'Shop created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id): View
    {
        $shop = Shop::findOrFail($id);

        return view('shops.show', compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $shop = Shop::findOrFail($id);

        return view('shops.edit', compact('shop'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreShopRequest $request, int $id)
    {
        $shop = Shop::findOrFail($id);

        $name = $request->get('name');
        $email = $request->get('email');
        $isActive = boolval($request->get('is_active'));

        $shop->name = $name;
        $shop->email = $email;
        $shop->is_active = $isActive;

        $shop->save();

        return redirect()
         ->route('shops.index')
         ->with('success', 'Shop edited successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $shop = Shop::findOrFail($id);

        $shop->delete();

        return redirect()
         ->route('shops.index')
         ->with('success', 'Shop deleted successfully!');
    }
}
