<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Khill\Lavacharts\Configs\DataTable;
use Khill\Lavacharts\Lavacharts;
use View;

class ChartController extends Controller
{
    //
    public  function testChart(){

        $lava = new  Lavacharts();
        $stocksTable = $lava->DataTable();

        $stocksTable->addDateColumn('Day of Month')
            ->addNumberColumn('Projected')
            ->addNumberColumn('Official');

        for ($a = 1; $a < 30; $a++) {

            $stocksTable->addRow([
                '2015-10-' . $a, rand(800, 1000), rand(800, 1000)
            ]);
        }

        $chart =  $lava->LineChart('MyStocks', $stocksTable, ['title'=>'My Title']);

        echo $lava->render('LineChart', 'MyStocks', 'chart-div');
        //return view('show-graphs',['lava'=> $lava]);
        //return view('show-graphs')->withLava($lava);
        return view('show-graphs');
    }

    public function genderDistribution(){

        $lava = new  Lavacharts();
        $population = $lava->DataTable();

        $population->addStringColumn("Gender")
            ->addNumberColumn("Male")
            ->addNumberColumn("Female");

        $population->addRow(['Total population', 10000])
            ->addRow(['Male', 4000])
            ->addRow(['Female', 6000]);
        $lava->BarChart('GenderDistribution', $population, [
            'title'=>'Gender Distribution',
            'orientation'=>'horizontal',
            'barGroupWidth'=> '80%'
        ]);

        echo $lava->render('BarChart', 'GenderDistribution', 'chart-div');
        return view ('show-graphs');
    }

    public function genderAgegroup(){
        $lava = new  Lavacharts();
        $population = $lava->DataTable();

        $population->addStringColumn('Age group')
            ->addNumberColumn('Percent');

        $population->addRow(['0-10', 30])
            ->addRow(['10-20', 20])
            ->addRow(['20-30', 20])
            ->addRow(['30-40', 15])
            ->addRow(['40-50', 10])
            ->addRow(['50-60', 3])
            ->addRow(['60-above', 2]);


        $lava->PieChart('Agegroup', $population, [
            'title'  => 'Population by Age group',
            'is3D'   => true,
            'slices' => [
                ['offset' => 0.2],
                ['offset' => 0.25],
                ['offset' => 0.3]
            ]
        ]);

        echo $lava->render('PieChart', 'Agegroup', 'chart-div');
        return view ('show-graphs');
    }


}
