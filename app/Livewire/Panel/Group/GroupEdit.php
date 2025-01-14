<?php

namespace App\Livewire\Panel\Group;

use App\Enums\WeekDayEnum;
use App\Livewire\Forms\GroupForm;
use App\Models\Group;
use Livewire\Component;
use TallStackUi\Traits\Interactions;

class GroupEdit extends Component
{
    use Interactions;

    public $canGroup = false;
    public $group;

    public $weekDays = [];

    public GroupForm $form;

    public function mount($group)
    {
        $this->canGroup = true;
        if(!$this->canGroup)
            return;

        $choirId = auth()->user()->selected_choir_id;
        $this->group = Group::where('choir_id', $choirId)->withTrashed()->findOrFail($group);
        $this->form->setGroup($this->group);

        foreach (WeekDayEnum::cases() as $day) {
            $this->weekDays[] = [
                'value' => $day->value,
                'label' => $day->label(),
            ];
        }
    }

    public function render()
    {
        return view('livewire.panel.group.group-edit')
            ->title('Editar grupo');
    }

    public function save()
    {
        $this->validate();
        $this->group->update(
            $this->form->all()
        );
        $this->toast()->success('Alterações salvas com sucesso.')->send();
    }
}
