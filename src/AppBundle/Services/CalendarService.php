<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 19.07.18
 * Time: 14:18
 */

namespace AppBundle\Services;


class CalendarService
{
    private $monthNames = array('Styczen','Luty','Marzec','Kwiecien','Maj','Czerwiec','Lipiec','Sierpien','Wrzesien','Pazdziernik','Listopad','Grudzien');
    private $dayNames = array('ND','PN','TW','SR','CZ','PT','SO');
    private $currentDate;
    private $currentDay;
    private $currentMonth;
    private $daysInMonth;
    private $actualMonth;


    public function getCalendar($numberMonth)
    {
        $this->currentDate = new \DateTime('2018/'.$numberMonth.'/01');
        $this->currentDay = $this->currentDate->format('d');
        $this->currentMonth = $this->currentDate->format('m');
        $this->daysInMonth = (int)$this->currentDate->modify('last day of this month')->format('d');
        $numberOfMonth = (int)$this->currentDate->format('m');
        $this->actualMonth = $this->monthNames[$numberOfMonth-1];

    }

    /**
     * @return mixed
     */
    public function getDaysInMonth()
    {
        return $this->daysInMonth;
    }

    /**
     * @return mixed
     */
    public function getActualMonth()
    {
        return $this->actualMonth;
    }
}