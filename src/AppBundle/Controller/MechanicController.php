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
use Symfony\Component\HttpFoundation\Request;

class MechanicController extends Controller
{
    public function calendarAction($month, $year, Request $request)
    {
        $month = $request->get('month');
        $year = $request->get('year');
        $today = new \DateTime("now");
        $todayDay = $today->format("d");

        $date = new \DateTime($year."/".$month."/".$todayDay);

        $calendar = $this->get(CalendarService::class);
        $calendar->getCalendar((int)$date->format("m"));

        return $this->render('komis/calendar.html.twig', [
            'lastDay'=>$calendar->getDaysInMonth(),
            'nameMonth'=>$calendar->getActualMonth(),
            'year'=>$year,
            'month'=>$month,
        ]);
    }
}