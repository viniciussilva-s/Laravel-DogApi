<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;

class homeController extends Controller
{
    const URL_LIST = "https://dog.ceo/api/breeds/list/all";
    public function index()
    {
        $fonts = [
            array( "descricao" => "Beau Rivage cursive"),
            array( "descricao" => "Montserrat sans-serif"),
            array( "descricao" => "Roboto sans-serif"),
            array( "descricao" => "Rubik Moonrocks cursive"),
            array( "descricao" => "Underdog cursive"),
        ];
        $response = [];
        $ch = curl_init(Self::URL_LIST);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPGET, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $response = json_decode($output);
        $lista = [];

        if (isset($response->status) && $response->status === "error") {
            toast("Lista de cachorros não encontrada", "error");
        } else {
            toast("Lista de cachorros encontrada", "success");
            $lista = $response->message;
        }
        return view("site.home.index", compact("lista", "fonts"));
    }
}
