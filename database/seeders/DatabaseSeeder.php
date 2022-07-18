<?php

namespace Database\Seeders;

use App\Models\recruitsku;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        user::create([
            'username' => 'PGS JABDAN 1',
            'email' => 'pgs.jb1@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'PGS',
            'PT' => 'PT.SWA',
            'estate' => 'Jabdan 1'
                ]);

        user::create([
        'username' => 'PGS PU1',
        'email' => 'pgs.pu1@gmail.com',
        'password' => bcrypt('123456'),
        'status' => 'PGS',
        'PT' => 'PT.DAN',
        'estate' => 'Puhus 1'
        ]);

        user::create([
            'username' => 'HR HEAD',
            'email' => 'hr.head@gmail.com',
            'password' => bcrypt('123456'),
            'status' => 'HR HEAD',
            ]);


            user::create([
                'username' => 'GA HEAD',
                'email' => 'ga.head@gmail.com',
                'password' => bcrypt('123456'),
                'status' => 'GA HEAD',
                ]);

                user::create([
                    'username' => 'CMA',
                    'email' => 'cma.dsn@gmail.com',
                    'password' => bcrypt('123456'),
                    'status' => 'CMA',
                    ]);

        user::create([
        'username' => 'HR Staff',
        'email' => 'hr.staff@gmail.com',
        'password' => bcrypt('123456'),
         'status' => 'HR'
        ]);

        user::create([
            'username' => 'Yann',
            'email' => 'sepriyanifal@gmail.com',
            'password' => bcrypt('123456'),
             'status' => 'ADMIN'
            ]);

            recruitsku::create([
                'nik' => '1234567890',
                'nama' => 'Irvan',
                'asal' => 'Kutai Timur',
                'ketklaim' => 'Invoice',
                'statuskaryawan' => 'tk',
                'user_id' => 1
                        ]);

                recruitsku::create([
                'nik' => '123456788',
                 'nama' => 'Joss',
                 'asal' => 'Muara Wahau',
                'ketklaim' => 'Non Invoice',
                'statuskaryawan' => 'tk',
                 'user_id' => 1
                                    ]);

                 recruitsku::create([
                    'nik' => '12345677',
                    'nama' => 'Yapss',
                    'asal' => 'Kutai Barat',
                    'ketklaim' => 'Invoice',
                    'statuskaryawan' => 'k0',
                    'k0' => 'Simel',
                    'user_id' => 1
                                    ]);

                recruitsku::create([
                'nik' => '1234567899',
                'nama' => 'Satt',
                'asal' => 'Kutai Barat',
                'ketklaim' => 'Non Invoice',
                'statuskaryawan' => 'k0',
                'k0' => 'Simbak',
                'user_id' => 1
                ]);

                recruitsku::create([
                'nik' => '12345000',
                'nama' => 'Patt',
                'asal' => 'Kutai Utara',
                'ketklaim' => 'Invoice',
                'statuskaryawan' => 'k1',
                'k0' => 'Simbak',
                'k1' => 'Comm',
                'user_id' => 1
                ]);

                recruitsku::create([
                    'nik' => '1209876677',
                    'nama' => 'Truck',
                    'asal' => 'Kutai Utara',
                    'ketklaim' => 'Non Invoice',
                    'statuskaryawan' => 'k1',
                    'k0' => 'Sinon',
                    'k1' => 'Nana',
                    'user_id' => 1
                    ]);

                    // ///////////////////////

                recruitsku::create([
                'nik' => '123456090',
                'nama' => 'Kenta',
                'asal' => 'Kutai Barat',
                'ketklaim' => 'Non Invoice',
                'statuskaryawan' => 'k1',
                'k0' => 'Pet',
                'k1' => 'Traa',
                'user_id' => 2
                ]);

                recruitsku::create([
                'nik' => '1234560900',
                'nama' => 'sett',
                'asal' => 'Kaltara',
                'ketklaim' => 'Invoice',
                'statuskaryawan' => 'k1',
                'k0' => 'Tian',
                'k1' => 'Dian',
                'user_id' => 2
                ]);

                recruitsku::create([
                    'nik' => '1234560912',
                    'nama' => 'Sett',
                    'asal' => 'Kaltara',
                    'ketklaim' => 'Non Invoice',
                    'statuskaryawan' => 'tk',
                    'user_id' => 2
                    ]);

                    recruitsku::create([
                        'nik' => '1234560914',
                        'nama' => 'Yanto',
                        'asal' => 'Kaltara',
                        'ketklaim' => 'Invoice',
                        'statuskaryawan' => 'tk',
                        'user_id' => 2
                        ]);

                        recruitsku::create([
                            'nik' => '1234560915',
                            'nama' => 'Vikk',
                            'asal' => 'Kaltara',
                            'ketklaim' => 'Non Invoice',
                            'statuskaryawan' => 'k0',
                            'k0' => 'Simbak',
                            'user_id' => 2
                            ]);

                            recruitsku::create([
                                'nik' => '12345609152',
                                'nama' => 'Tare',
                                'asal' => 'Kaltim',
                                'ketklaim' => 'Invoice',
                                'statuskaryawan' => 'k0',
                                'k0' => 'Simbak',
                                'user_id' => 2
                                ]);
    }
}
