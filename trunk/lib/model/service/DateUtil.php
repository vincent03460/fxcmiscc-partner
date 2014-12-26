<?php

/**
 *
 *
 *
 * @package lib.model
 * @author r9jason
 */
class DateUtil
{
    function addDate($givendate, $day = 0, $mth = 0, $yr = 0)
    {
        $cd = strtotime($givendate);
        $newdate = date('Y-m-d h:i:s', mktime(date('h', $cd),
                                              date('i', $cd), date('s', $cd), date('m', $cd) + $mth,
                                              date('d', $cd) + $day, date('Y', $cd) + $yr));
        return $newdate;
    }

    function formatDate($format, $date)
    {
        $dateArr = split("-", $date);

        return date($format, mktime(0, 0, 0, $dateArr[1], $dateArr[2], $dateArr[0]));
    }

    function getMonth($month = null, $year = null)
    {
        // The current month is used if none is supplied.
        if (is_null($month))
            $month = date('n');

        // The current year is used if none is supplied.
        if (is_null($year))
            $year = date('Y');

        // Verifying if the month exist
        if (!checkdate($month, 1, $year))
            return null;

        // Calculating the days of the month
        $first_of_month = mktime(0, 0, 0, $month, 1, $year);
        $days_in_month = date('t', $first_of_month);
        $last_of_month = mktime(0, 0, 0, $month, $days_in_month, $year);
        //print_r("<br>" . date('Ymd', $first_of_month) . "<br>");
        //print_r("<br>" . date('Ymd', $days_in_month) . "<br>");
        //print_r("<br>" . date('Ymd', $last_of_month) . "<br>");
        $m = array();
        $m['first_mday'] = 1;
        $m['first_of_month'] = $first_of_month;
        $m['last_of_month'] = $last_of_month;
        $m['first_wday'] = date('w', $first_of_month);
        $m['first_weekday'] = strftime('%A', $first_of_month);
        $m['first_yday'] = date('z', $first_of_month);
        $m['first_week'] = date('W', $first_of_month);
        $m['last_mday'] = $days_in_month;
        $m['last_wday'] = date('w', $last_of_month);
        $m['last_weekday'] = strftime('%A', $last_of_month);
        $m['last_yday'] = date('z', $last_of_month);
        $m['last_week'] = date('W', $last_of_month);
        $m['mon'] = $month;
        $m['month'] = strftime('%B', $first_of_month);
        $m['year'] = $year;

        return $m;
    }
}
