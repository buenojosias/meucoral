<?php

namespace App\Livewire\Panel\Chorister;

use App\Livewire\Forms\ChoristerForm;
use App\Models\Chorister;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class ChoristerCreate extends Component
{
    use Interactions;

    public ?int $selectedChoirId = null;

    public bool $canAddChorister = false;

    public ChoristerForm $chorister;

    public function mount()
    {
        $user = auth()->user();

        if (!$this->selectedChoirId = $user->selected_choir_id)
            return;

        $this->canAddChorister = $this->checkCanAddChorister($user);

        if ($this->canAddChorister === false)
            return;

        $this->chorister->choir_id = $this->selectedChoirId;
        $this->chorister->registration_date = date('Y-m-d');
    }

    public function render()
    {
        return view('livewire.panel.chorister.chorister-create')
            ->title('Cadastrar coralista');
    }

    public function save()
    {
        $this->validate();
        try {
            $chorister = Chorister::create($this->chorister->except('chorister'));
            session()->flash('status', 'Coralista cadastrado(a) com sucesso.');
            $this->redirectRoute('panel.choristers.show', $chorister, navigate: true);
        } catch (\Throwable $th) {
            \Log::error($th);
            $this->toast()->error('Ororreu um erro ao cadastrar coralista.')->send();
        }
    }

    public function checkCanAddChorister($user)
    {
        if ($user->plan_id >= 3)
            return true;

        $limit = $user->plan_id === 1 ? 30 : 100;
        $choristers_count = $user->choristers()->withTrashed()->count();

        if ($choristers_count < $limit)
            return true;

        return false;
    }
}
