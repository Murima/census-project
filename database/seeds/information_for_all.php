<?php

use Illuminate\Database\Seeder;

class information_for_all extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('information_for_all')->insert([

            array(
                'household_estate'=>'Ngummo2',
                'HouseNo'=>'3',
                'head_id'=>'20887653',
                'occupant_No'=>'1',
                'occupant_relationship_to_head' => 'Brother/Sister',
                'occupant_age'=>'76',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Luo',
                'occupant_religion'=>'Protestant',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Kisumu',
                'previous_residence'=>'South B',
                'date_of_moving_in'=>'17/4/2000',
                'is_father_alive'=>'No',
                'is_mother_alive'=>'No',
                'category'=>'1',

            ),
            array(
                'household_estate'=>'Central Court',
                'HouseNo'=>'1',
                'head_id'=>'28876770',
                'occupant_No'=> '1',
                'occupant_relationship_to_head' => 'Head',
                'occupant_age'=>'66',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Luhya',
                'occupant_religion'=>'Protestant',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Mumias',
                'previous_residence'=>'Kileleshwa',
                'date_of_moving_in'=>'17/4/2008',
                'is_father_alive'=>'yes',
                'is_mother_alive'=>'No',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila One',
                'HouseNo'=>'5',
                'head_id'=>'288977721',
                'occupant_relationship_to_head' => 'Son/Daughter',
                'occupant_age'=>'32',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Kamba',
                'occupant_religion'=>'Catholic',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Kenyatta Hospital',
                'previous_residence'=>'Karen',
                'date_of_moving_in'=>'17/4/2005',
                'is_father_alive'=>'No',
                'is_mother_alive'=>'Yes',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila Two',
                'HouseNo'=>'13',
                'head_id'=>'201077766',
                'occupant_relationship_to_head' => 'Son/Daughter',
                'occupant_age'=>'26',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Kikuyu',
                'occupant_religion'=>'Catholic',
                'occupant_marital_status'=>'Never married',
                'occupant_POB'=>'Merrian Hospital',
                'previous_residence'=>'Highrise',
                'date_of_moving_in'=>'1/9/2009',
                'is_father_alive'=>'Yes',
                'is_mother_alive'=>'Yes',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila Two',
                'HouseNo'=>'14',
                'head_id'=>'30076586',
                'occupant_relationship_to_head' => 'Head',
                'occupant_age'=>'56',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Kikuyu',
                'occupant_religion'=>'Catholic',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Embu hospital',
                'previous_residence'=>'Parklands',
                'date_of_moving_in'=>'1/9/2009',
                'is_father_alive'=>'No',
                'is_mother_alive'=>'Yes',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila Two',
                'HouseNo'=>'15',
                'head_id'=>'22277721',
                'occupant_relationship_to_head' => 'Spouse',
                'occupant_age'=>'44',
                'occupant_lineage'=>'Biological',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Luo',
                'occupant_religion'=>'Muslim',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Aga Khan',
                'previous_residence'=>'South C',
                'date_of_moving_in'=>'19/7/2009',
                'is_father_alive'=>'No',
                'is_mother_alive'=>'No',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila Two',
                'HouseNo'=>'16',
                'head_id'=>'48877721',
                'occupant_relationship_to_head' => 'In-Law',
                'occupant_age'=>'29',
                'occupant_lineage'=>'Adopted',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Kamba',
                'occupant_religion'=>'Hindu',
                'occupant_marital_status'=>'Married',
                'occupant_POB'=>'Merrian Hospital',
                'previous_residence'=>'Parklands',
                'date_of_moving_in'=>'1/12/2000',
                'is_father_alive'=>'Yes',
                'is_mother_alive'=>'Yes',
                'category'=>'1',

            ),

            array(
                'household_estate'=>'Akila Two',
                'HouseNo'=>'17',
                'head_id'=>'55577721',
                'occupant_relationship_to_head' => 'Nephew/Niece',
                'occupant_age'=>'20',
                'occupant_lineage'=>'Adopted',
                'is_occupant_usual_member'=>'yes',
                'occupant_tribe_nationality'=>'Maasai',
                'occupant_religion'=>'Catholic',
                'occupant_marital_status'=>'Never married',
                'occupant_POB'=>'Merrian Hospital',
                'previous_residence'=>'Karen',
                'date_of_moving_in'=>'1/8/2008',
                'is_father_alive'=>'Yes',
                'is_mother_alive'=>'Yes',
                'category'=>'1'

            )


        ]);
    }
}
