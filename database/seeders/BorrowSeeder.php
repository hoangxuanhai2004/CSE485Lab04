<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


use Illuminate\Support\Facades\DB;
use App\Models\Book;
use App\Models\Reader;
use App\Models\Borrow;
use Faker\Factory as Faker;

class BorrowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $readerIds = DB::table('readers')->pluck('id')->toArray();
        $bookIds = DB::table('books')->pluck('id')->toArray();
        for($i=0;$i<50;$i++){
            $borrow_date = $faker->date('Y-m-d','now');
            Borrow::create([
                'reader_id'=>$faker->randomElement($readerIds),
                'book_id'=>$faker->randomElement($bookIds),
                'borrow_date'=>$borrow_date,
                'return_date'=>$faker->date('Y-m-d',strtotime('+30 days')),
                'status'=>$faker->boolean(),
            ]);
        }

    }
}
