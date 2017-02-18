<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Configs\DataTable;

use View;
use Lava;

class ChartController extends Controller
{
    //
    public  function index($category){

        switch ($category) {
            case 1:
                $this->genderDistribution();
                break;
            case 2:
                break;
            default:
                $this->genderDistribution();
                break;
        }

    }
    public  function testChart(){

        $stocksTable = \Lava::DataTable();

        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Projected')
            ->addNumberColumn('Official');

        // Random Data For Example

        for ($a = 1; $a < 30; $a++)
        {
            $rowData = array(
                "2014-8-$a", rand(800,1000), rand(800,1000)
            );

            $stocksTable->addRow($rowData);
        }

        $Chart = \Lava::LineChart('Stocks', $stocksTable);

        echo \Lava::render('LineChart', 'Stocks', 'chart-div');

        return view('show-graphs');
    }

    public function genderDistribution(){

        /*$population = \Lava::DataTable();

        $population->addStringColumn("Gender")
            ->addNumberColumn("Male")
            ->addNumberColumn("Female");

        $population->addRow(['Total population', 10000])
            ->addRow(['Male', 4000])
            ->addRow(['Female', 6000]);

        $Chart= \Lava::BarChart('GenderDistribution', $population, [
            'title'=>'Gender Distribution',
            'orientation'=>'horizontal',
            'barGroupWidth'=> '80%'
        ]);


        echo \Lava::render('BarChart', 'GenderDistribution', 'chart-div');*/

        return view ('show-graphs');
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
        return view ('show-graphs');
    }


}
