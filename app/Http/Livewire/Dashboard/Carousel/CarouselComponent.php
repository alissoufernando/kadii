<?php

namespace App\Http\Livewire\Dashboard\Carousel;

use Livewire\Component;
use App\Models\Carousel;
use Livewire\WithFileUploads;

class CarouselComponent extends Component
{
    use WithFileUploads;
    public $title;
    public $subtitle;
    public $link;
    public $image;
    public $text;
    public $carousel_id;
    public $deleteIdBeingRemoved = null;
    protected $listeners = ['deleteConfirmation' => 'deleteCarousels'];

    public function resetInputFields()
    {
        // Clean errors if were visible before
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset(['title','subtitle','link','image','text',]);
    }


    public function updated($fields)
    {
        if ($this->carousel_id) {
            $this->validateOnly($fields, [
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'link' =>  ['required'],
                'image' =>  ['required'],
                'text' =>  ['required'],
            ]);
        } else {
            $this->validateOnly($fields, [
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'link' =>  ['required'],
                'image' =>  ['required'],
                'text' =>  ['required'],
            ]);
        }
    }
    public function saveCarousel()
    {
        if ($this->carousel_id) {
            $this->validate([
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'link' =>  ['required'],
                'image' =>  ['required'],
                'text' =>  ['required'],
            ]);
        } else {
            $this->validate([
                'title' =>  ['required'],
                'subtitle' =>  ['required'],
                'link' =>  ['required'],
                'image' =>  ['required'],
                'text' =>  ['required'],
            ]);
        }

        $myCarousel = new Carousel();
        if ($this->carousel_id) {
            $myCarousel = Carousel::findOrFail($this->carousel_id);
        }

        $filenameImage = time() . '.' . $this->image->extension();
        $pathImage = $this->image->storeAs(
            'carousel',
            $filenameImage,
            'public'
        );

        $myCarousel->title = $this->title;
        $myCarousel->subtitle = $this->subtitle;
        $myCarousel->link = $this->link;
        $myCarousel->text = $this->text;
        $myCarousel->image = $pathImage;

        $myCarousel->save();

        if ($this->carousel_id) {
            session()->flash('message', 'Modification effectuée avec succès.');
        } else {

            session()->flash('message', 'Enregistrement effectué avec succès.');
        }

        $this->resetInputFields();
        $this->emit('saveCarousel');

    }


    public function getElementById($id)
    {
        $this->carousel_id = $id;
        $myCarousel = Carousel::findOrFail($this->carousel_id);
        $this->title = $myCarousel->title;
        $this->subtitle = $myCarousel->subtitle;
        $this->link = $myCarousel->link;
        $this->text = $myCarousel->text;
        $this->image = $myCarousel->image;

    }


    public function deleteCarousel($id)
    {
        $this->deleteIdBeingRemoved = $id;
        $this->dispatchBrowserEvent('show-delete-confirmation');
    }

    public function deleteCarousels()
    {
        $myCarousel = Carousel::findOrFail($this->deleteIdBeingRemoved);
        $myCarousel->delete();
        $this->dispatchBrowserEvent('deleted', ['message' => 'Cette Image à été supprimer']);
    }
    public function render()
    {
        $carousel = Carousel::latest()->get();
        return view('livewire.dashboard.carousel.carousel-component',[
            'carousel' => $carousel,
        ]);
    }
}
