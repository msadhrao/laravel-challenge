<?php

namespace Tests\Feature;

use Faker\Factory;
use Tests\TestCase;
use Tests\Interfaces\FormsTestInterface;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PatientCreateTest extends TestCase implements FormsTestInterface
{
    //use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_form_loads()
    {
        $response = $this->get(route('patient.create'));
        $response->assertStatus(200);
        $response->assertViewIs('patient.create');
    }

    public function validationProvider()
    {
        /* WithFaker trait doesn't work in the dataProvider */
        $faker = Factory::create( Factory::DEFAULT_LOCALE);

        return [
            'fields_are_empty' => [
                'data' => [
                    'name' => '',
                    'address' => '',
                    'phone' => '',
                    'email' => '',
                ],
                'errors' => [
                    'name' => 'The name field is required.',
                    'address' => 'The address field is required.',
                    'phone' => 'The phone field is required.',
                    'email' => 'The email field is required',
                ],
            ],
            'validation_test_invalid' => [
                'data' => [
                    'name' => 'as',
                    'address' => $faker->regexify('[A-Za-z ]{1001}'),
                    'phone' => $faker->word(),
                    'email' => $faker->word(),
                ],
                'errors' => [
                    'name' => 'The name must be at least 3 characters.',
                    'address' => 'The address must not be greater than 1000 characters.',
                    'phone' => 'The phone must be between 8 and 12 digits.',
                    'email' => 'The email must be a valid email address.',
                ],
            ],
        ];
    }

    /**
     * @test
     * @dataProvider validationProvider
     * @param bool $shouldPass
     * @param array $mockedRequestData
     */
    public function validation_results_as_expected($mockedRequestData, $errors)
    {
        $response = $this->from('/patient/create')->post('/patient/create', $mockedRequestData);
        if(is_array($errors)){
            $response->assertInvalid($errors);
        }
        elseif($errors == true){
            $response->assertValid();
        }
    }
}
