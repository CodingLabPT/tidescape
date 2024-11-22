<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandStoreRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function show() {
        $brands = Brand::all();
        return view('admin.Pages.brands', compact('brands'));
    }

    public function destroy($id)
    {
        // Encontre a marca pelo ID
        $brand = Brand::findOrFail($id);

        // Exclua a marca
        $brand->delete();

        // Redirecione com uma mensagem de sucesso
        return redirect()->route('brands.show')->with('success', __('backend/Pages/brands.delete_successfully'));
    }

    public function create() {
        return view('admin.Pages.addBrandForm');
    }

    // Método para armazenar a nova marca
    public function store(BrandStoreRequest $request)
    {
        // Armazenar a imagem
        if($request->img) {

            $path = 'assets/img/brands';

            $imageName = md5($request->img->getClientOriginalName() . strtotime("now")) . "." . $request->img->extension();
            $imagePath = $request->img->move(($path), $imageName);
        }

        // Criar a nova marca
        Brand::create([
            'logo' => $imagePath ?? null, // Armazena o caminho da imagem
            'name' => $request->name,
            'url' => $request->url,
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('brands.show')->with('success', __('backend/Pages/brands.created_successfully'));
    }


}
