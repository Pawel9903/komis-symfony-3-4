<?php
/**
 * Created by PhpStorm.
 * User: pawel9903
 * Date: 17.07.18
 * Time: 20:12
 */

namespace AppBundle\Controller;


use AppBundle\Services\CalendarService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MechanicController extends Controller
{
    public function calendarAction()
    {
        $today = new \DateTime("now");
        $year = (int)$today->format('Y');
        $month = (int)$today->format('m');
        $calendar = $this->get(CalendarService::class);
        $calendar->getCalendar($month);
        return $this->render('komis/calendar.html.twig', ['lastday'=>$calendar->getDaysInMonth(),'nameMonth'=>$calendar->getActualMonth(),'year'=>$year, 'month'=>$month]);
    }
}