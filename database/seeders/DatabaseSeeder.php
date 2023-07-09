<?php

namespace Database\Seeders;

use App\Models\Lokasi_estate;
use App\Models\recruitsku;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Role;
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
        // \App\Models\User::factory(10)->create();'user_id' => 3
        lokasi::create
        ([
            'nama' => 'PT.DIN',
        ]);
        lokasi::create
        ([
            'nama' => 'PT.DAN',
        ]);
        lokasi::create
        ([
            'nama' => 'PT.DWT',
        ]);

        //DIN ESTATE
            Lokasi_estate::create([
                'lokasi_id' => 1,
                'nama' => 'LONG KIJAK 1',
                    ]);

                    Lokasi_estate::create([
                        'lokasi_id' => 1,
                        'nama' => 'LONG KIJAK 2',
                            ]);

                            Lokasi_estate::create([
                                'lokasi_id' => 1,
                                'nama' => 'LONG KIJAK 3',
                                    ]);
        //

        //DAN ESTATE
            Lokasi_estate::create([
                'lokasi_id' => 2,
                'nama' => 'PUHUS 1',
                    ]);

                Lokasi_estate::create([
                    'lokasi_id' => 2,
                    'nama' => 'PUHUS 2',
                        ]);

                        Lokasi_estate::create([
                            'lokasi_id' => 2,
                            'nama' => 'PUHUS 3',
                                ]);
        //

        //DWT ESTATE
            Lokasi_estate::create([
                'lokasi_id' => 3,
                'nama' => 'Melenyu 1',
                    ]);

            Lokasi_estate::create([
                'lokasi_id' => 3,
                'nama' => 'Melenyu 2',
                    ]);

                    Lokasi_estate::create([
                        'lokasi_id' => 3,
                        'nama' => 'Melenyu 3',
                            ]);

                            Lokasi_estate::create([
                                'lokasi_id' => 3,
                                'nama' => 'Melenyu 4',
                                    ]);
        //

        Role::create
        ([
            'nama' => 'Admin',
        ]);

        Role::create
        ([
            'nama' => 'FA',
        ]);

        Role::create
        ([
            'nama' => 'PGS',
        ]);


        //USER PGS
            user::create
            ([
                'username' => 'PGS LK 1',
                'npk' => '0008179',
                'email' => 'pgs.lk1@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 1,
                'lokasi_estate_id' => 1,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS LK 2',
                'npk' => '0008638',
                'email' => 'pgs.lk2@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 1,
                'lokasi_estate_id' => 2,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS LK 3',
                'npk' => '0075204',
                'email' => 'pgs.lk3@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 1,
                'lokasi_estate_id' => 3,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS PUHUS 1',
                'npk' => '0008075',
                'email' => 'pgs.pu1@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 2,
                'lokasi_estate_id' => 4,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS PUHUS 2',
                'npk' => '0053651',
                'email' => 'pgs.pu2@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 2,
                'lokasi_estate_id' => 5,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS PUHUS 3',
                'npk' => '0047084',
                'email' => 'pgs.pu3@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 2,
                'lokasi_estate_id' => 6,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS ME 1',
                'npk' => '0074481',
                'email' => 'pgs.me1@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 3,
                'lokasi_estate_id' => 7,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS ME 2',
                'npk' => '0015530',
                'email' => 'pgs.me2@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 3,
                'lokasi_estate_id' => 8,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS ME 3',
                'npk' => '0007729',
                'email' => 'pgs.me3@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 3,
                'lokasi_estate_id' => 9,
                'role_id' => 3,
            ]);
            user::create
            ([
                'username' => 'PGS ME 4',
                'npk' => '0085645',
                'email' => 'pgs.me4@dsngroup.co.id',
                'password' => bcrypt('123456'),
                'status' => 'PGS',
                'lokasi_id' => 3,
                'lokasi_estate_id' => 10,
                'role_id' => 3,
            ]);
        //

            // User Cma
                user::create([
                    'username' => 'CMA DIN',
                    'npk' => '0075318',
                    'email' => 'cma.din@dsngroup.co.id',
                    'password' => bcrypt('123456'),
                    'status' => 'CMA',
                    'lokasi_id' => 1,
                    'lokasi_estate_id' => 1,
                    'role_id' => 2,
                    ]);

                    user::create([
                        'username' => 'CMA DAN',
                        'npk' => '0012558',
                        'email' => 'cma.dan@dsngroup.co.id',
                        'password' => bcrypt('123456'),
                        'status' => 'CMA',
                        'lokasi_id' => 2,
                        'lokasi_estate_id' => 4,
                        'role_id' => 2,
                        ]);

                        user::create([
                            'username' => 'CMA Dewata',
                            'npk' => '0066973',
                            'email' => 'cma.dwwt@dsngroup.co.id',
                            'password' => bcrypt('123456'),
                            'status' => 'CMA',
                            'lokasi_id' => 3,
                            'lokasi_estate_id' => 7,
                            'role_id' => 2,
                            ]);

        user::create([
            'username' => 'Yann',
            'npk' => '0075030',
            'email' => 'sepriyanifal@dsngroup.co.id',
            'password' => bcrypt('123456'),
             'status' => 'ADMIN',
             'lokasi_id' => 1,
             'lokasi_estate_id' => 1,
             'role_id' => 1,
            ]);

    }
}
