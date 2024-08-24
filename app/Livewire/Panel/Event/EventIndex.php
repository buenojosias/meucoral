<?php

namespace App\Livewire\Panel\Event;

use App\Enums\MonthEnum;
use App\Enums\WeekDayEnum;
use App\Models\Event;
use Livewire\Component;

class EventIndex extends Component
{
    public $choirId;
    public $showAllChoirs = false;
    public $confirmable = false;

    public $months = [];
    public $weekDays = [];

    public $currentMonth;
    public $currentYear;
    public $selectedYear;
    public $selectedMonth;
    public $changed = false;

    public $daysInMonth;
    public $firstWeekdayOfMonth;
    public $lastWeekdayOfMonth;
    public $remainder;

    public $nextMonth;
    public $nextYear;
    public $previusMonth;
    public $previusYear;

    public function mount()
    {
        $this->choirId = auth()->user()->selected_choir_id;
        $this->confirmable = auth()->user()->plan_id >= 2;

        $this->months = MonthEnum::cases();
        $this->weekDays = WeekDayEnum::cases();

        $this->currentMonth = intval(date('m'));
        $this->currentYear = intval(date('Y'));

        $this->load($this->currentMonth, $this->currentYear);
    }

    public function load($selectedMonth, $selectedYear)
    {
        $this->selectedMonth = $selectedMonth ?? $this->currentMonth;
        $this->selectedYear = $selectedYear ?? $this->currentYear;

        $date = strtotime($selectedYear . '-' . $this->selectedMonth);
        $this->daysInMonth = intval(date('t', $date));

        $firstDayOfMonth = date('Y-m-01', $date);
        $this->firstWeekdayOfMonth = date('w', (strtotime($firstDayOfMonth)));
        $lastDayOfMonth = date('Y-m-t', $date);
        $this->lastWeekdayOfMonth = date('w', (strtotime($lastDayOfMonth)));

        $this->remainder = $this->lastWeekdayOfMonth < 6 ? 6 - $this->lastWeekdayOfMonth : 0;
        $this->nextMonth = $this->selectedMonth == 12 ? 1 : intval($this->selectedMonth) + 1;
        $this->nextYear = $this->selectedMonth == 12 ? intval($this->selectedYear) + 1 : $this->selectedYear;
        $this->previusMonth = $this->selectedMonth == 1 ? 12 : intval($this->selectedMonth) - 1;
        $this->previusYear = $this->selectedMonth == 1 ? intval($this->selectedYear) - 1 : $this->selectedYear;
    }

    public function render()
    {
        $events = Event::query()
            ->select('id', 'choir_id', 'date', 'name')
            ->whereHas('choir')
            ->when($this->choirId && !$this->showAllChoirs, fn($query) => $query->where('choir_id', $this->choirId))
            ->when(!$this->choirId || $this->showAllChoirs, fn($query) => $query->with('choir'))
            ->where(function ($query) {
                $query->when($this->changed, function ($query) {
                    $query->whereMonth('date', $this->selectedMonth)->whereYear('date', $this->selectedYear);
                })
                ->when(!$this->changed, function ($query) {
                    return $query
                        ->where(fn($q) => $q->whereDate('date', '>=', today()))
                        ->orWhere(fn($q) => $q->whereMonth('date', $this->currentMonth)->whereYear('date', $this->currentYear));
                });
            })
            ->when($this->confirmable, function ($query) {
                $query->withCount(['choristers' => fn($q) => $q->where('answer', 'Sim')]);
            })
            ->orderBy('date')
            // ->limit(10)
            ->get();

        // $this->load($this->selectedMonth, $this->selectedYear);
        return view('livewire.panel.event.event-index', compact('events'))
            ->title('Eventos');
    }

    public function goToNextMonth()
    {
        $this->selectedMonth = $this->nextMonth;
        $this->selectedYear = $this->nextYear;
        $this->selectedDay = null;
        $this->changed = true;
        $this->load($this->selectedMonth, $this->selectedYear);
    }

    public function goToPreviusMonth()
    {
        $this->selectedMonth = $this->previusMonth;
        $this->selectedYear = $this->previusYear;
        $this->selectedDay = null;
        $this->changed = true;
        $this->load($this->selectedMonth, $this->selectedYear);
    }
}
