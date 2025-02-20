<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

class AlephService
{
    protected $client;
    protected $apiKey;
    protected $baseUrl;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('API_KEY');  
        $this->baseUrl = env('BASE_API_URL');  
    }

    public function getCategories()
    {
        try {
            // Hacer la solicitud POST a la API de Aleph usando multipart/form-data
            $response = $this->client->post($this->baseUrl . 'API/get_categorias', [
                'multipart' => [
                    [
                        'name' => 'api_key',
                        'contents' => $this->apiKey,
                    ],
                ],
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,  // API Key en el encabezado
                ],
            ]);

            $responseData = json_decode($response->getBody()->getContents(), false);

            if (isset($responseData->categorias)) {
                return $responseData->categorias;
            }

            Log::error('No se encontraron categorías en la respuesta de la API.');
            return null;

        } catch (\Exception $e) {
            Log::error('Error al conectar con la API de Aleph: ' . $e->getMessage());
            return null; 
        }
    }

    public function getCmdbRecords($categoryId)
    {
        try {
            $response = $this->client->post($this->baseUrl . 'API/get_cmdb', [
                'form_params' => [
                    'api_key' => $this->apiKey,
                    'categoria_id' => $categoryId,
                ],
                'headers' => [
                    'Content-Type' => 'application/x-www-form-urlencoded',
                ],
            ]);

            
            
            $responseData = json_decode($response->getBody()->getContents(), false);

            if (isset($responseData->cmdb)) {
                return $responseData->cmdb;
            }
          

        } catch (\Exception $e) {
            Log::error('Error al obtener los registros de la CMDB: ' . $e->getMessage());
            return null; 
        }
    }
}
