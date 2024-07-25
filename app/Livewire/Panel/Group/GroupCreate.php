<?php

namespace App\Livewire\Panel\Group;

use App\Enums\WeekDayEnum;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Component;

class GroupCreate extends Component
{
    public GroupForm $form;

    public $canGroup;

    public $selectedChoirId;

    public $isMultigroup;

    public $weekDays = [];


    public function mount()
    {
        $user = auth()->user();

        if (!$this->canGroup($user))
            return;

        if (!$this->selectedChoirId = $user->selected_choir_id)
            return;

        $this->isMultigroup = $this->isMultigroup($user);

        foreach (WeekDayEnum::cases() as $day) {
            $this->weekDays[] = [
                'value' => $day->value,
                'label' => $day->label(),
            ];
        }

        $this->form->status = 'Ativo';
        $this->form->choir_id = $this->selectedChoirId;
    }

    public function render()
    {
        return view('livewire.panel.group.group-create')
            ->title('Adicionar grupo');
    }

    public function canGroup($user)
    {
        $this->canGroup = $user->plan_id >= 3;
        return $user->plan_id >= 3;
    }

    public function isMultigroup($user)
    {
        $choir = $user->choirs()->findOrFail($this->selectedChoirId);
        return $choir->multigroup;
    }

    public function save()
    {
        $this->validate();
        $group = Group::create($this->form->except('group'));
        session()->flash('status', 'Grupo adicionado com sucesso.');
        $this->redirectRoute('panel.groups.show', $group, navigate: true);
    }
}
