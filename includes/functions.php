<?php
class Kalendar {

      private function kalendar() {
        /* varijable */
        $month = (int) ($_GET['month'] ? $_GET['month'] : date('m'));
        $year = (int)  ($_GET['year'] ? $_GET['year'] : date('Y'));
        $running_day = date('w', mktime(0, 0, 0, $month, 1, $year));
        $days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));
        $days_in_this_week = 1;
        $day_counter = 0;
        $current_day = date("j")-1;
        $current_month = date("m");
        $current_year = date ("Y");
        /* dugme za naredni mesec */
        $next_month_link = '<a href="?month='.($month != 12 ? $month + 1 : 1).'&year='.
            ($month != 12 ? $year : $year + 1).'" class="control">Naredni mesec</a>';

        /* dugme za predhodni mesec */
        $previous_month_link = '<a href="?month='.($month != 1 ? $month - 1 : 12).'&year='.
            ($month != 1 ? $year : $year - 1).'" class="control">Predhodni mesec</a>';
        /* stampanje  */
        echo $previous_month_link;
        echo $next_month_link;
        echo date('F', mktime(0, 0, 0, $month, 1, $year)). ' ' .$year;
        /* nacrtaj tabelu */
        $calendar = '<table cellpadding="0" cellspacing="0" class="calendar">';
        /* ispiši dani u nedelji */
        $headings = array('Nedelja', 'Ponedeljak', 'Utorak', 'Sreda', 'Četvrtak', 'Petak', 'Subota');
        $calendar .= '<tr class="calendar-row"><td class="calendar-day-head">' .
            implode('</td><td class="calendar-day-head">', $headings) . '</td></tr>';

        /* red prve nedelje */
        $calendar .= '<tr class="calendar-row">';
        /* odštampaj prazna polja do prvog dana u mesecu  */
        for ($x = 0; $x < $running_day; $x++):
            $calendar .= '<td class="calendar-day-np"> </td>';
            $days_in_this_week++;
        endfor;

        /* petlja za stampanje dana.... */
        for ($list_day = 1; $list_day <= $days_in_month; $list_day++):
            if ($current_day == $list_day && $current_month == $month && $current_year == $year) {
                $calendar .= '<td class="calendar-current_day">';
            } else {
                $calendar .= '<td class="calendar-day">';
            }
            /* ubaci broj dana */
            $calendar .= '<div class="day-number">' . $list_day . '</div>';

            $calendar .= '</td>';
            if ($running_day == 6):
                $calendar .= '</tr>';
                if (($day_counter + 1) != $days_in_month):
                    $calendar .= '<tr class="calendar-row">';
                endif;
                $running_day = -1;
                $days_in_this_week = 0;
            endif;
            $days_in_this_week++;
            $running_day++;
            $day_counter++;
        endfor;

        /* zadnja nedelja u mesecu */
        if ($days_in_this_week < 8):
            for ($x = 1; $x <= (8 - $days_in_this_week); $x++):
                $calendar .= '<td class="calendar-day-np"> </td>';
            endfor;
        endif;

        /* zadnji red */
        $calendar .= '</tr>';

        /* kraj tabele */
        $calendar .= '</table>';
        echo $calendar;
    }

private static $_instance = null;

    public static function getInstance()
    {

        if (self::$_instance == null)
        {
            self::$_instance = new Kalendar();
        }

        return self::$_instance;
    }

}
