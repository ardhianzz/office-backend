<?php

namespace App\Helpers;

trait APIResponderHelper
{
    protected function success($message = 'Permintaan berhasil diproses', $data = [], $paginate = NULL)
    {
    	$response['response_status'] = SUKSES;
    	$response['message'] = $message;
    	$response['data'] = $data;
        $response['paginate'] = $paginate;

        return response()->json($response);
    }

    protected function failure($message = 'Permintaan gagal diproses', $data = [])
    {
    	$response['response_status'] = GAGAL;
    	$response['message'] = $message;
    	$response['data'] = $data;

        return response()->json($response);
    }

    protected function notFound($message = 'Data tidak ditemukan', $data = NULL)
    {
    	$response['response_status'] = DATA_TIDAK_DITEMUKAN;
    	$response['message'] = $message;
    	$response['data'] = $data;

        return response()->json($response);
    }

    protected function unauthorized($message = 'Anda tidak memiliki hak akses. Silakan login terlebih dahulu', $data = [])
    {
    	$response['response_status'] = BELUM_MEMILIKI_HAK_AKSES;
    	$response['message'] = $message;
    	$response['data'] = $data;

        return response()->json($response);
    }
}
