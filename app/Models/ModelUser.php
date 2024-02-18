<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ModelUser extends Model
{
    public function GetDataBukuCerita()
    {
        return DB::table("buku_cerita")->get();
    }

    public function GetJumlahDataBukuCerita()
    {
        return DB::table("tb_buku")->where('id_data_buku', 2)->count();
    }

    public function GetJumlahDataBukuNovel()
    {
        return DB::table("tb_buku")->where('id_data_buku', 3)->count();
    }

    public function GetJumlahDataBukuProgramming()
    {
        return DB::table("tb_buku")->where('id_data_buku', 5)->count();
    }

    public function GetJumlahDataBukuOtomotif()
    {
        return DB::table("tb_buku")->where('id_data_buku', 4)->count();
    }

    public function GetJumlahDataBukuSains()
    {
        return DB::table("tb_buku")->where('id_data_buku', 6)->count();
    }

    public function GetJumlahDataBukuBisnis()
    {
        return DB::table("tb_buku")->where('id_data_buku', 1)->count();
    }

    public function GetDataBukuNovel()
    {
        return DB::table("buku_novel")->get();
    }

    public function GetDetailDataBukuCerita($id_buku_cerita)
    {
        return DB::table("buku_cerita")->where("id_buku_cerita", $id_buku_cerita)->first();
    }


    public function GetRowBuku($id_buku)
    {
        return DB::table("tb_buku")->where("id_buku", $id_buku)->first();
    }


    public function GetTabelDataBuku()
    {
        return DB::table("tb_data_buku")->get();
    }


    public function DataBuku($id_data_buku)
    {
        $result = DB::table('tb_data_buku')
            ->select('*')
            ->join('tb_buku', 'tb_buku.id_data_buku', '=', 'tb_data_buku.id_data_buku')
            ->where('tb_data_buku.id_data_buku', $id_data_buku)
            ->get();

        return $result;
    }
}
