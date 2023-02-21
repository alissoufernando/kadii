<?php

namespace App\Http\Livewire\Dashboard\Category;

use Livewire\Component;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Str;
use App\Models\Subsubcategory;

class CategoryComponent extends Component
{

    public $name;
    public $slug;
    public $parent_id;
    public $parents_id;
    public $categorie_id;
    public $menu;
    public $id_cat_menu;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteCategorys','deleteConfirmation' => 'deleteSubcategorys','deleteConfirmation' => 'deleteSubsubcategorys'];

    public function generateSlug() {

        $this->slug = Str::slug($this->name,'-');
    }


    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['name', 'slug', 'parent_id','parents_id','categorie_id']);
    }


    public function updated($fields)
    {
        if ($this->categorie_id) {
            $this->validateOnly($fields, [
                'name' =>  ['required'],
                'slug' =>  ['required'],

            ]);
        } else {
            $this->validateOnly($fields, [
                'name' =>  ['required'],
                'slug' =>  ['required'],

            ]);
        }

    }
    public function updatemenu($id){

        $this->id_cat_menu = $id;
        $myCategorieMenu = Category::findOrFail($this->id_cat_menu);
        if($myCategorieMenu->menu == 0)
        {
            $this->menu = 1;
        }else{
            $this->menu = 0;
        }
        $myCategorieMenu->menu = $this->menu;
        $myCategorieMenu->save();

        return redirect()->route('admin.category-index');

    }
    public function saveCategory()
    {
        if ($this->categorie_id) {
            $this->validate([
                'name' =>  ['required'],
                'slug' =>  ['required'],

            ]);
        } else {
            $this->validate([
                'name' =>  ['required'],
                'slug' =>  ['required'],

            ]);
        }
        if($this->parent_id && $this->parents_id)
        {
            $mySSCategorie = new  Subsubcategory();
            if ($this->categorie_id) {
                $mySSCategorie = Subsubcategory::findOrFail($this->categorie_id);
            }

            $mySSCategorie->name = $this->name;
            $mySSCategorie->slug = $this->slug;
            $mySSCategorie->category_id = $this->parent_id;
            $mySSCategorie->subcategory_id = $this->parents_id;
            $mySSCategorie->save();




        }elseif ($this->parent_id)
        {
            $mySCategorie = new  Subcategory();
            if ($this->categorie_id) {
                $mySCategorie = Subcategory::findOrFail($this->categorie_id);
            }

            $mySCategorie->name = $this->name;
            $mySCategorie->slug = $this->slug;
            $mySCategorie->category_id = $this->parent_id;
            $mySCategorie->save();

        }else
        {
            $myCategorie = new Category();
        if ($this->categorie_id) {
            $myCategorie = Category::findOrFail($this->categorie_id);
        }
        $myCategorie->name = $this->name;
        $myCategorie->slug = $this->slug;
        $myCategorie->save();
        }

        if ($this->categorie_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {
            session()->flash('message', 'Enregistrement effectué avec succès.');
        }
        $this->resetInputFields();
        $this->emit('saveCategory');
    }

    public function getElementById($id,$id_s = null,$id_ss = null)
    {

        if($id_ss && $id_s && $id)
        {

            $this->id_ss = $id_ss;
            $mySSCategorie = Subsubcategory::findOrFail($this->id_ss);
            $this->parents_id = $mySSCategorie->subcategory_id;
            $this->parent_id = $mySSCategorie->category_id;
            $this->categorie_id = $mySSCategorie->id;
            $this->name = $mySSCategorie->name;
            $this->slug = $mySSCategorie->slug;


        }elseif($id_s && $id)
        {
            $this->id_s = $id_s;
            $mySCategorie = Subcategory::findOrFail($this->id_s);
            $this->parent_id = $mySCategorie->category_id;
            $this->categorie_id = $mySCategorie->id;
            $this->name = $mySCategorie->name;
            $this->slug = $mySCategorie->slug;
        }else
        {

            $this->categorie_id = $id;
            $myCategorie = Category::findOrFail($this->categorie_id);
            $this->categorie_id = $myCategorie->category_id;
            $this->name = $myCategorie->name;
            $this->slug = $myCategorie->slug;
        }

    }


    public function deleteCategory($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteCategorys()
    {
        $myProduct = Category::findOrFail($this->deleteIdBeingRemoved);
        $myProduct->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Cette catégorie à été supprimer']);

    }
    public function deleteSubcategory($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSubcategorys()
    {
        $myProduct = Subcategory::findOrFail($this->deleteIdBeingRemoved);
        $myProduct->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Cette sous catégorie à été supprimer']);

    }
    public function deleteSubsubcategory($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteSubsubcategorys()
    {
        $myProduct = Subsubcategory::findOrFail($this->deleteIdBeingRemoved);
        $myProduct->delete();
        $this->dispatchBrowserEvent('deleted',['message' => 'Cette sous sous-catégorie à été supprimer']);

    }
    public function render()
    {
        $categorie = Category::latest()->get();
        $subcategorie = Subcategory::where('category_id', $this->parent_id)->get();
        // dd('ok');

        return view('livewire.dashboard.category.category-component',[
            'categorie' => $categorie,
            'subcategorie' => $subcategorie,
        ]);
    }
}
