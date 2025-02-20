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
        $this->apiKey = env('API_KEY');  // Recupera la API Key del archivo .env
        $this->baseUrl = env('BASE_API_URL');  // URL base de la API
    }

    // Método para obtener las categorías de la API de Aleph
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

            // Decodificar la respuesta JSON y convertirla en un objeto
            $responseData = json_decode($response->getBody()->getContents(), false);

            // Verificar si la clave 'categorias' existe y devolverla
            if (isset($responseData->categorias)) {
                return $responseData->categorias;
            }

            // En caso de que no haya categorías
            Log::error('No se encontraron categorías en la respuesta de la API.');
            return null;

        } catch (\Exception $e) {
            // Si hay algún error, registrar el error
            Log::error('Error al conectar con la API de Aleph: ' . $e->getMessage());
            return null; // Devolver null en caso de error
        }
    }

    // Método para obtener los registros de la CMDB de una categoría específica
    public function getCmdbRecords($categoryId)
    {
        try {
            // Hacer la solicitud GET a la API de Aleph para obtener los registros de la CMDB
            $response = $this->client->get("https://subdominioentidad.alephmanager.com/API/get_cmdb/{$categoryId}", [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey, // Agregar el API Key en los headers
                ],
            ]);

            // Decodificar la respuesta JSON y devolverla
            return json_decode($response->getBody()->getContents(), false);

        } catch (\Exception $e) {
            // Si hay algún error, registrar el error
            Log::error('Error al obtener los registros de la CMDB: ' . $e->getMessage());
            return null; // Devolver null en caso de error
        }
    }
}
