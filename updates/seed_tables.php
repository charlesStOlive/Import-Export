<?php namespace Waka\Publisher\Updates;

//use Excel;
use Seeder;
use DB;
use Waka\ImportExport\Models\Type;
use System\Models\File;;
// use Waka\Crsm\Classes\CountryImport;



class SeedTables extends Seeder
{
    public function run()
    {
        $import = Type::create([
            'name'   => 'Import model',
            'import' => true,
            'class' => 'Waka\\ImportExport\\Classes\\Imports\\ImportModel'
        ]);
        $import = Type::create([
            'name'   => 'Export model',
            'import' => false,
            'class' => 'Waka\\ImportExport\\Classes\\Exports\\ExportModel'
        ]);
        $import = Type::create([
            'name'   => 'Import model with picture',
            'import' => true,
            'class' => 'Waka\\ImportExport\\Classes\\Imports\\ImportModelPicture'
        ]);
        
        // $sql = plugins_path('waka\publisher\updates\sql\waka_publisher_bloc_types.sql');
        // DB::unprepared(file_get_contents($sql));

        // $sql = plugins_path('waka\publisher\updates\sql\waka_publisher_contents.sql');
        // DB::unprepared(file_get_contents($sql));

        // $sql = plugins_path('waka\publisher\updates\sql\waka_publisher_documents.sql');
        // DB::unprepared(file_get_contents($sql));

        // $sql = plugins_path('waka\publisher\updates\sql\waka_publisher_blocs.sql');
        // DB::unprepared(file_get_contents($sql));

        
    }
}