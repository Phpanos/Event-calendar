<?php

namespace Phpanos\EventCalendar;

use Carbon\Carbon;

class Calendar
{
    protected $year;

    protected $month;

    protected $weekDays = ['Mon', 'Tue', 'Wed', 'Thur', 'Fri', 'Sat', 'Sun'];

    public function __construct($year = null, $month = null)
    {
        $this->year($year);
        $this->month($month);
    }

    /**
     * Display the calendar
     * 
     * @return [type] [description]
     */
    public function display()
    {
        $weekDays = $this->weekDays;
        $weeks = $this->daysOfWeek();
        return view('event::month', compact('weekDays'), compact('weeks'));
    }

    /**
     * Create a calendar event
     * 
     * @return [type] [description]
     */
    public function event($name)
    {
        return new Event($name);
    }

    public function year($year = null)
    {
        $this->setYear($year ? $year : date('Y'));

        return $this->year;
    }

    public function month($month = null)
    {
        $this->setMonth($month ? $month : date('n'));

        return $this->month;
    }

    protected function setYear($year)
    {
        $this->year = $year;
    }

    protected function setMonth($month)
    {
        $this->month = $month;
    }

     protected function firstDayOfMonth()
    {
        $date = Carbon::create($this->year, $this->month, 1);

        return array_search($date->format('D'), $this->weekDays);
    }

    protected function totalSlots()
    {
        return $this->firstDayOfMonth() + $this->daysInMonth();
    }

    protected function startSlots()
    {
        return array_pad([], $this->firstDayOfMonth(), '');
    }

    protected function endSlots($totalSlots)
    {
        $slots = $totalSlots % 7;
        $slots = 7 - $slots;

        return array_pad([], $slots, '');
    }

    /**
     * Get days in month
     * 
     * @return [type] [description]
     */
    protected function daysInMonth()
    {
        return cal_days_in_month(CAL_GREGORIAN, $this->month, $this->year);
    }
    
    protected function offsetDays()
    {
        return array_merge($this->startSlots(), range(1, $this->daysInMonth()), $this->endSlots($this->totalSlots()));
    }

    protected function daysOfWeek()
    {
        return collect($this->offsetDays())->chunk(7);
    }

    /**
     * Get number of weeks in a month
     * 
     * @return [type] [description]
     */
    protected function weeksInMonth()
    {
        $days = $this->daysInMonth();
        return ($days % 7 === 0 ? 0 : 1) + intval($days / 7);
    }
}
