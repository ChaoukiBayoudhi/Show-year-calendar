<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="calender.css">
    <title>Document</title>
</head>
<body>
    <?php
    function daysCount($month)
    {
        switch ($month) {
            case 'Janvier':
            case 'Mars':
            case 'Mai':    
            case 'Aout':    
            case 'Juillet':    
            case 'Octobre':    
            case 'Décembre':    
                $dayNumbers=31;
                break;
            case 'Avril':
            case 'Juin':
            case 'Septembre':
            case 'Nouvembre':
                $dayNumbers=30;
                break;
            case 'Février':
                $dayNumbers=28;
                break;

            
            default:
                echo "Erreur verifier Le mois";
                $dayNumbers=0;
                break;
        }
        return $dayNumbers;

    }
    //returns the day name 
    function dayOfWeek($dayNum)
    {
        switch ($dayNum) {
            case 0:
                $dayName='Dimanche';
                break;
            case 1:
                $dayName='Lundi';
                break;
            case 2:
                $dayName='Mardi';
                break;
            case 3:
                $dayName='Mercredi';
                break;
            case 4:
                $dayName='Jeudi';
                break;
            case 5:
                $dayName='Vendredi';
                break;
            case 6:
                $dayName='Samedi';
                break;
            
            default:
                echo "Erreur !!! Veuillez vérifier le numéro du jour";
                $dayName="Error";
                
        }
        return $dayName;
    } 
    
    #associative arrays of months
    #key=>value
    #key is the month name
    //in our case value is an associatave array
    $calendar=array("Janvier"=>array(),"Février"=>array(),"Mars"=>array(),
                    "Avril"=>array(),"Mai"=>array(),"Juin"=>array(),
                    "Juillet"=>array(),"Aout"=>array(),"Septembre"=>array(),
                    "Octobre"=>array(),"Nouvembre"=>array(),"Décembre"=>array()
    );

    //access to "Janvier" value (using key)
    // $janvierCald=$calendar["Janvier"];(1)
    // //access to the first day of "Janvier"
    // $firstday=$janvierCald[0];(2)
    //(1) and (2) => $firstday=$calendar["Janvier"][0];


    #fill the calendar with months days
    function fillCalendar(&$calendar) //$calendar is passing by reference
    {
        $dayOfYear=5;//the 01/01/2021 is an Friday
        foreach($calendar as $month=>$days)
        {
        for($i=0;$i<daysCount($month);$i++)
            {
                $calendar[$month][$i]=dayOfWeek($dayOfYear%7);
                $dayOfYear++;
            }
        }
    }

    //call the fillCalendar function
    fillCalendar($calendar);

    //show the $calendar associative array values
    function showArray($calendar)
    {
        echo "The 2021 calendar <pre>";
         print_r($calendar); 
         echo "</pre>";
    }
    showArray($calendar);
    //show the calendar of the month given as parameter 
    //$calendar is an associative array of arrays
    //count($arrayName) returns the array length
    //this function show a HTML table for one month
    
    function showMonthCalendar($calendar,$month)
    {
        $day=1;
        $result="<table border=1>";
        $result.="<caption>Mois de ".$month."</caption>";
        while($day<=count($calendar[$month]))
        {
            $result.="<tr>";
            for ($i=0; $i < 7; $i++) { 
                if($day<=daysCount($month))
                {
                    $result.="<td>".$day." ".$calendar[$month][$day-1]."</td>";
                    $day++;
                }
            }
            $result.="</tr>";

        }
        $result.="</table>";
        echo $result, "<br><br>";
       
    }
    
    
    //show all months calendar as HTML tables
    function showYearCalendar($calendar)
    {
        foreach ($calendar as $month => $days) {
            showMonthCalendar($calendar,$month);
        }
    }
    showYearCalendar($calendar);
    ?>
</body>
</html>