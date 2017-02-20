<?php

namespace App\Http\Controllers;

use App\Models\census_forms\HouseholdConditions;
use App\Models\census_forms\InformationAll;
use App\Models\census_forms\InformationOnICT;
use App\Models\census_forms\PersonsAbove3;
use App\Models\census_forms\PersonsWithDisabilities;
use App\Models\User;
use ConsoleTVs\Charts\Facades\Charts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\In;
use Khill\Lavacharts\Configs\DataTable;

use View;
use Lava;

class ChartController extends Controller
{
    //
    public  function index($type=null)
    {
        return $this->religionDistribution();
    }

    public function chartCategory($type=null, $variation=null){
        /**
         * check chart category
         */

        switch ($type){
            case 1:
                return $this->tribeDistribution($variation);
            case 2:
                return $this->disabilityDistribution();
            case 3:
                return $this->educationStatus();
            case 4:
                return $this->houseTenure();

            default:
                return $this->religionDistribution();
        }
    }

    public function religionDistribution(){
        $chart = Charts::database(InformationAll::all(), 'bar', 'highcharts')
            ->title('Population and Religion')
            ->elementLabel('Religion')
            ->dimensions(1000, 500)
            ->responsive(true)
            ->groupBy('occupant_religion');

        return view('show-graphs')->with('chart', $chart);
    }



    public function tribeDistribution($type){

        if ($type=='donut'){
            $chart = Charts::database(InformationAll::all(), 'donut', 'highcharts')
                ->title('Population and Tribe')
                ->labels(['kikuyu', 'meru', 'dholuo',
                    'Maasai', 'Kamba', 'Luhya', 'Kisii'])
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('occupant_tribe_nationality');
        }
        else{
            $chart = Charts::database(InformationAll::all(), 'pie', 'highcharts')
                ->title('Population and Tribe')
                ->labels(['kikuyu', 'meru', 'dholuo',
                    'Maasai', 'Kamba', 'Luhya', 'Kisii'])
                ->dimensions(1000, 500)
                ->responsive(true)
                ->groupBy('occupant_tribe_nationality');
        }

        return view('show-graphs')->with('chart', $chart);
    }

    public function ageDistribution(){
        $labels=array("0-9", "10-19",
            "20-29", "30-39", "40-49",
            "50-59", "60-69", "70+");

        $model = new InformationAll();
        $data=$model->getAgeRanges();


        $chart = Charts::create('bar', 'highcharts')
            ->title('My nice chart')
            ->elementLabel('My nice label')
            ->plotBorderWidth(true)
            ->labels($labels)
            ->values($data)
            ->responsive(true);
        return view('show-graphs')->with('chart', $chart);

    }

    public  function  disabilityDistribution(){
        $chart = Charts::database(PersonsWithDisabilities::all(), 'bar', 'highcharts')
            ->title('Population and type of disability')
            ->elementLabel("Total population")
            ->colors(['#ff0000', '#00ff00', '#0000ff','#ff9900'])
            ->responsive(true)
            ->groupBy('type_of_disability');

        return view('show-graphs')->with('chart', $chart);

    }
    public function educationStatus(){
        $left=PersonsAbove3::where('education_status', 'Left School')->count();
        $atSchool=PersonsAbove3::where('education_status', 'At learning institution')->count();
        $never=PersonsAbove3::where('education_status', 'Never went to school')->count();



        $chart = Charts::create('line', 'highcharts')
            ->title('Education status')
            ->labels(['Never Went', 'In School', 'Left School'])
            ->elementLabel("Total population")
            ->values([$never, $atSchool, $left])
            ->responsive(true);

        return view('show-graphs')->with('chart', $chart);
    }

    public function houseTenure(){
        $ngummoR=0;$ngummoP=0;$centralR=0;$centralP=0;$sunR=0;$sunP=0;

        $houseModel = new HouseholdConditions();
        $data= $houseModel->countTenureStatus();
        for ($i=0;$i<count($data);$i++){
            $object=$data[$i];
            if($object->household_estate=="Ngummo" && $object->tenure_status=="Rented"){
                $ngummoR+=1;
            }
            elseif ($object->household_estate=="Ngummo" && $object->tenure_status=="Purchased"){
                $ngummoP+=1;
            }
            if($object->household_estate=="Sunview Estate" && $object->tenure_status=="Rented"){
                $sunR+=1;
            }
            elseif ($object->household_estate=="Sunview Estate" && $object->tenure_status=="Purchased"){
                $sunP+=1;
            }
            if($object->household_estate=="Central Court" && $object->tenure_status=="Rented"){
                $centralR+=1;
            }
            elseif ($object->household_estate=="Central Court" && $object->tenure_status=="Purchased"){
                $centralP+=1;
            }

            }

            //dd($ngummoP, $sunP, $centralP);

            $chart = Charts::multi('areaspline', 'highcharts')
                ->title('Chart of Estate and Tenure Status')
                ->colors(['#ff0000', '#cc33ff'])
                ->elementLabel("Total population")
                ->labels(['Ngummo','Sunview', 'Central Court'])
                ->dataset('Purchased', [$ngummoP, $sunP, $centralP])
                ->dataset('Rented',  [$ngummoR, $sunR ,$centralR]);

            return view('show-graphs')->with('chart', $chart);

        }



    public function genderAgegroup(){
            //$lava = new  Lava();
            $population = \Lava::DataTable();

            $population->addStringColumn('Age group')
                ->addNumberColumn('Percent');

            $population->addRow(['0-10', 30])
                ->addRow(['10-20', 20])
                ->addRow(['20-30', 20])
                ->addRow(['30-40', 15])
                ->addRow(['40-50', 10])
                ->addRow(['50-60', 3])
                ->addRow(['60-above', 2]);


            \Lava::PieChart('Agegroup', $population, [
                'title'  => 'Population by Age group',
                'is3D'   => true,
                'slices' => [
                    ['offset' => 0.2],
                    ['offset' => 0.25],
                    ['offset' => 0.3]
                ]
            ]);

            echo \Lava::render('PieChart', 'Agegroup', 'chart-div');

            return view('show-graphs');
        }



    public function testCat($typ=null){
            switch ($typ){
                case 1:

                    return $this->cat1();
                case 2:
                    return $this->cat2();
                default:
                    return dd('default');

            }
        }
    public function cat1(){
            return view('success');
        }

    public function cat2(){
            $cat="cat2";
            return $cat;
        }

}
