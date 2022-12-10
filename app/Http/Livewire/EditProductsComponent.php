<?php

namespace App\Http\Livewire;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductsComponent extends ProductsComponent
{
    use WithFileUploads;
    public function mount()
    {
        $this->pageTitle = 'Edit';
        $this->componentName = 'Editar producto';
        $this->category_id = 'Seleccione';
    }

    public function render()
    {
        $products = Product::join('categories as c', 'c.id', 'products.category_id')
            ->select('products.*', 'c.name as category')
            ->orderBy('products.name', 'asc');
        return view('livewire.products.edit')
            ->extends('layouts.theme.app')
            ->section('content');
    }

    public function Update()
    {
        $rules = [
            'name' => "required|min:3|unique:products,name,{$this->selected_id}",
            'cost' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'alerts' => 'required',
            'category_id' => 'required|not_in:Seleccione',
        ];
        $messages = [
            'name.required' => 'Nombre del producto es requerido',
            'name.unique' => 'Ya existe el nombre del producto',
            'name.min' => 'El nombre del producto debe tener al menos 3 caracteres.',
            'cost.required' => 'Costo es requerido',
            'price.required' => 'Precio es requerido',
            'stock.required' => 'Stock es requerido',
            'alerts.required' => 'Ingresa el valor mínimo de existencias',
            'category_id.not_in' => 'Elige un nombre de categoría',
        ];

        $this->validate($rules, $messages);

        $product = Product::find($this->selected_id);

        $product->update([
            'name' => $this->name,
            'cost' => $this->cost,
            'price' => $this->price,
            'barcode' => $this->barcode,
            'stock' => $this->stock,
            'alerts' => $this->alerts,
            'category_id' => $this->category_id,
        ]);

        if ($this->image) {
            $customFileName = uniqid() . '_.' . $this->image->extension();
            $this->image->storeAs('/public/products', $customFileName);
            $imageTemp = $product->image; //imagen temporal
            $product->image = $customFileName;
            $product->save();

            if ($imageTemp != null) {
                if (file_exists('storage/products/' . $imageTemp)) {
                    unlink('storage/products/' . $imageTemp);
                }
            }
        }
        $this->resetUI();
        $this->emit('product-updated', 'Producto Actualizado');
    }

    public function resetUI()
    {
        $this->name = '';
        $this->barcode = '';
        $this->cost = '';
        $this->price = '';
        $this->stock = '';
        $this->alerts = '';
        $this->category_id = 'Seleccione';
        $this->image = null;
        $this->search = '';
        $this->selected_id = 0;
    }

    protected $listeners = ['deleteRow' => 'Destroy'];

    public function Destroy(Product $product)
    {
        $imageTemp = $product->image;
        $product->delete();

        if ($imageTemp != null) {
            if (file_exists('storage/products/' . $imageTemp)) {
                unlink('storage/products/' . $imageTemp);
            }
        }

        $this->resetUI();
        $this->emit('product-deleted', 'Producto Eliminado');
    }
}
