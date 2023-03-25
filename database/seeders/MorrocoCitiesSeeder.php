<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Countries;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MorrocoCitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $morocco = Country::firstOrCreate(['name_en'=>'Morocco','name_ar'=>"المغرب"]);
        $cities=[
            ["name_en"=>"Agadir","name_ar"=>"أكادير","country_id"=>$morocco->id,],
            ["name_en"=>"Al Hoceima","name_ar"=>"الحسيمة","country_id"=>$morocco->id],
            ["name_en"=>"Asilah","name_ar"=>"أصيلة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Azemmour","name_ar"=>"أزمور" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Beni Mellal","name_ar"=>"بني ملال" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Berkane","name_ar"=>"بركان" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Boujdour","name_ar"=>"بوجدور" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Boulemane"	,"name_ar"=>"بولمان" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Casablanca","name_ar"=>"الدار البيضاء" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Chefchaouen","name_ar"=>	"شفشاون" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Dakhla","name_ar"=>"الداخلة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"El Jadida","name_ar"=>	"الجديدة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Errachidia","name_ar"=>"الرشيدية" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Essaouira"	,"name_ar"=>"الصويرة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Fes","name_ar"=>"فاس" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Figuig","name_ar"=>"فگيگ" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Guelmim","name_ar"=>"كلميم" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Ifrane"	,"name_ar"=>"إفران" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Inezgane"	,"name_ar"=>"إنزگان" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Jerada"	,"name_ar"=>"جرادة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Kenitra"	,"name_ar"=>"القنيطرة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Khemisset"	,"name_ar"=>"خميسات" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Khenifra"	,"name_ar"=>"خنيفرة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Khouribga"	,"name_ar"=>"خريبكة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Laayoune"	,"name_ar"=>"العيون" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Larache"	,"name_ar"=>"العرائش" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Marrakesh"	,"name_ar"=>"مراكش" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Martil"	,"name_ar"=>"مرتيل" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Meknes"	,"name_ar"=>"مكناس" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Mohammedia"	,"name_ar"=>"المحمدية" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Nador"	,"name_ar"=>"الناظور" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Ouarzazate"	,"name_ar"=>"ورزازات" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Oued Zem" ,"name_ar"=>"واد زم" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Oujda"	,"name_ar"=>"وجدة" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Rabat"	,"name_ar"=>"الرباط" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Safi"	,"name_ar"=>"آسفي" ,"country_id"=>$morocco->id,],
            ["name_en"=>"Salé"  ,"name_ar"=>"سلا","country_id"=>$morocco->id],
            ["name_en"=>"Sefrou",	"name_ar"=>"صفرو","country_id"=>$morocco->id],
            ["name_en"=>"Settat",	"name_ar"=>"سطات","country_id"=>$morocco->id],
            ["name_en"=>"Sidi Kacem", "name_ar"=>"سيدي قاسم","country_id"=>$morocco->id],
            ["name_en"=>"Sidi Ifni","name_ar"=>"سيدي إفني","country_id"=>$morocco->id],
            ["name_en"=>"Sidi Slimane" ,"name_ar"=>"سيدي سليمان","country_id"=>$morocco->id],
            ["name_en"=>"Sidi Yahya El Gharb" ,"name_ar"=>"سيدي يحيى الغرب","country_id"=>$morocco->id],
            ["name_en"=>"Skhirat"	,"name_ar"=>"الصخيرات","country_id"=>$morocco->id],
            ["name_en"=>"Tan-Tan"	,"name_ar"=>"طانطان","country_id"=>$morocco->id],
            ["name_en"=>"Tangier"	,"name_ar"=>"طنجة","country_id"=>$morocco->id],
            ["name_en"=>"Taounate"	,"name_ar"=>"تاونات","country_id"=>$morocco->id],
            ["name_en"=>"Taourirt"	,"name_ar"=>"تاوريرت","country_id"=>$morocco->id],
            ["name_en"=>"Taroudant"	,"name_ar"=>"تارودانت","country_id"=>$morocco->id],
            ["name_en"=>"Taza"	,"name_ar"=>"تازة","country_id"=>$morocco->id],
            ["name_en"=>"Témara"	,"name_ar"=>"تمارة","country_id"=>$morocco->id],
            ["name_en"=>"Tetouan"	,"name_ar"=>"تطوان","country_id"=>$morocco->id],
            ["name_en"=>"Tinghir"	,"name_ar"=>"تنغير","country_id"=>$morocco->id],
            ["name_en"=>"Tiznit"	,"name_ar"=>"تزنيت","country_id"=>$morocco->id],
            ["name_en"=>"Zagora"	,"name_ar"=>"زاكورة","country_id"=>$morocco->id],
        ];
        City::insert($cities);
    }
}
