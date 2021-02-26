<?php

use App\User;
use App\Vehicle;
use Illuminate\Database\Seeder;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posted = 0;

        $makes = ['Toyota', 'Nissan', 'Honda', 'BMW', 'Mercedes', 'Suzuki'];
        $models = ['XR', 'Versio', 'Blumax', 'Gordo', 'VS', 'TypeX'];
        $fuel = ['Petrol', 'Diesel', 'LPG', 'Electric', 'Hybrid', 'Other'];
        $transmission = ['Automatic', 'Manual', 'CVT', 'Other'];
        $driving_wheels = ['Rear Wheel Drive', 'Front Wheel Drive', 'Four Wheel Drive', 'All Wheel Drive'];
        $colours = ['Black', 'White', 'Red', 'Grey', 'Blue'];
        $steering = ['Left Hand Drive', 'Right Hand Drive', 'Other'];
        $location = ['Yokohoma Japan', 'Linden', 'Georgetown', 'Berbice', 'ECD'];
        $condition = ['New', 'Foreign Used', 'Used', 'Refurbished'];

        while ($posted < 1000000) {

            $user = User::find(rand(1, 4));

            $vehicle = $user->vehicle()->create([
                'make' => $makes[array_rand($makes)],
                'model' => $models[array_rand($models)],
                'year' => rand(2000, 2020),
                'chassis' => 'N/A',
                'engine_displacement' => rand(10, 40) * 100,
                'engine_model' => "pa" . rand(1000, 4000),
                'fuel' => $fuel[array_rand($fuel)],
                'distance' => rand(1000, 235000),
                'seats' => rand(4, 7),
                'doors' => rand(4, 5),
                'transmission' => $transmission[array_rand($transmission)],
                'driving_wheels' => $driving_wheels[array_rand($driving_wheels)],
                'colour' => $colours[array_rand($colours)],
                'steering' => $steering[array_rand($steering)],
                'location' => $location[array_rand($location)],
                'weight' => rand(1250, 3100),
                'size' => rand(3, 7) . "m",
                'condition' => $condition[array_rand($transmission)],
                'description' => "Lovely Car",
                'price' => rand(1, 9) * 900000 + rand(150, 550) * 1000,
            ]);

            $images = ["imagehost/tesla_(1).jpg", "imagehost/tesla_(2).jpg", "imagehost/tesla_(3).jpg", "imagehost/tesla_(4).jpg"];

            shuffle($images);

            foreach ($images as $image) {
                $vehicle->image()->create([
                    'path' => $image,
                ]);
            }

            foreach ($user->contact_info as $contact_info) {
                $vehicle->contact_info()->attach($contact_info);
            }

            $posted++;
        }
    }
}
