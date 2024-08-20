<?php

namespace App\Livewire\Panel\Partials;

use Livewire\Component;
use TallStackUi\Traits\Interactions;

class DeleteModel extends Component
{
    use Interactions;

    public $model;
    public $label;
    public $route;

    public function mount($model, $label, $route)
    {
        $this->model = $model;
        $this->label = $label;
        $this->route = $route;
    }

    public function render()
    {
        return view('livewire.panel.partials.delete-model');
    }

    public function delete()
    {
        $this->model->delete();
        session()->flash('status', 'Registro excluído com sucesso.');
        $this->redirectRoute($this->route);
    }

    public function restore()
    {
        $this->model->restore();
        $this->toast()->success('Registro restaurado com sucesso.')->send();
    }

    public function deletePermanently()
    {
        $this->dialog()
            ->question('Excluir permanentemente', 'Tem certeza que deseja excluir permanentemente este registro?')
            ->confirm('Confirmar', 'forceDelete')
            ->cancel('Cancelar')
            ->send();
    }

    public function forceDelete()
    {
        $this->model->forceDelete();
        session()->flash('status', 'Registro excluído permanentemente.');
        $this->redirectRoute($this->route);
    }
}
