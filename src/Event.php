<?php

namespace Phpanos\EventCalendar;

class Event
{
    protected $name;

    protected $date;

    protected $content;

    public function __construct($name = null)
    {
        $this->name($name);
    }

    public function name($name = null)
    {
        if ($name) {
            return $this->setName($name);
        }

        return $this->name;
    }

    protected function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    public function date($date = null)
    {
        if ($date) {
            return $this->setDate($date);
        }

        return $this->date;
    }

    protected function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    public function content($content = null)
    {
        if ($content) {
            return $this->setContent($content);
        }

        return $this->content;
    }

    protected function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    public function create()
    {
        //dd($this);
    }
//
    public function display()
    {
        $event = $this;

        return view('event::event', compact('event'));
    }
}
