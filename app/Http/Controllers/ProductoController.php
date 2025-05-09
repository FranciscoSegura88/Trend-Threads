<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    private $productos = [
      [
        'id'=> 1,
        'nombre' => '77 Luka Doncic L.A Lakers',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/oRbbHxeeIOo_kzsRlqC-W4Qjrhrbfy3zHp-ZP8P0uB8/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saWJy/YXJ5LnNwb3J0aW5n/bmV3cy5jb20vc3R5/bGVzL2Nyb3Bfc3R5/bGVfMV8xX2Rlc2t0/b3Bfd2VicC9zMy8y/MDI1LTAyL1NjcmVl/biUyMFNob3QlMjAy/MDI1LTAyLTA0JTIw/YXQlMjA1LjU0LjU2/JTIwUE0ucG5nLndl/YnA',
        'categorias' => ['trend'],
        'subcategorias' => [],
        'precio' => 29.99
    ],
    [
        'id'=> 2,
        'nombre' => '15 Austin Reaves L.A Lakers',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/sdqr-sbxOSS0mIHd2yBOxj6VTsn9tLkQSrsF_BXqogw/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS9zZW8vTWVu/LXMtRmFuYXRpY3Mt/QXVzdGluLVJlYXZl/cy1XaGl0ZS1Mb3Mt/QW5nZWxlcy1MYWtl/cnMtRmFzdC1CcmVh/ay1SZXBsaWNhLVBs/YXllci1KZXJzZXkt/QXNzb2NpYXRpb24t/RWRpdGlvbl85ZDYw/YWIxYS01YmYzLTQy/YzktYjJjMy05OWNk/MmEzZjZjOTYuMzVl/NTA5ZThlMjE1NjI0/NzM2YzNkOWIyMmIy/MzQ1ODIuanBlZz9v/ZG5IZWlnaHQ9NjQw/Jm9kbldpZHRoPTY0/MCZvZG5CZz1GRkZG/RkY',
        'categorias' => ['trend'],
        'subcategorias' => [],
        'precio' => 39.99
    ],
    [
        'id'=> 3,
        'nombre' => '6 Alex Caruso Chicago Bulls',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/IWz6F9YKb8FaSXet0u2qDN_X54JrqUIAUM8DXMgIVjA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9mYW5h/dGljcy5mcmdpbWFn/ZXMuY29tL2NoaWNh/Z28tYnVsbHMvbWVu/cy1mYW5hdGljcy1h/bGV4LWNhcnVzby1y/ZWQtY2hpY2Fnby1i/dWxscy1mYXN0LWJy/ZWFrLXJlcGxpY2Et/amVyc2V5LWljb24t/ZWRpdGlvbl9waTQ5/MTEwMDBfZmZfNDkx/MTE2NS0zM2UyOWZl/NzFjNjhkMmQzNWM4/Ml9mdWxsLmpwZz9f/aHY9MiZ3PTM0MA',
        'categorias' => ['trend'],
        'subcategorias' => [],
        'precio' => 49.99
    ],
    [
        'id'=> 4,
        'nombre' => '15 Nikola Jokic Denver Nuggets',
        'descripcion' => 'Descripción del producto 4.',
        'imagen' => 'https://imgs.search.brave.com/zJP5XyEZQKZ5KyM4A9zv2T_Nt5fAicKgMh2xAvfuyNE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS9zZW8vVW5p/c2V4LU5pa2UtTmlr/b2xhLUpva2ljLU5h/dnktRGVudmVyLU51/Z2dldHMtU3dpbmdt/YW4tSmVyc2V5LUlj/b24tRWRpdGlvbl9m/MmE4NDcxYi05MGE5/LTRiMDItOTQ4Yy01/MzY2ZmIxNzcwOGUu/MDJmOTdiODljMTIw/ZjAyZTRjYTE4NGUx/N2U1NzZmYTAuanBl/Zz9vZG5IZWlnaHQ9/NTgwJm9kbldpZHRo/PTU4MCZvZG5CZz1G/RkZGRkY',
        'categorias' => ['trend'],
        'subcategorias' => [],
        'precio' => 59.99
    ],
    [
        'id'=> 5,
        'nombre' => '5 Anthony Edwards Minnesota Timberwolves',
        'descripcion' => 'Descripción del producto 5.',
        'imagen' => 'https://imgs.search.brave.com/_Rihp915aZECojhlfPexc6_IWSvJqsiemXgIaO9vx7E/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS9zZW8vWW91/dGgtTmlrZS1BbnRo/b255LUVkd2FyZHMt/TmF2eS1NaW5uZXNv/dGEtVGltYmVyd29s/dmVzLVN3aW5nbWFu/LUplcnNleS1JY29u/LUVkaXRpb25fNGVl/YmJmM2QtMGUzNy00/M2RmLWIxYzgtMjVh/YWNhMjFkZjM1Ljdj/MDBhZWRjNDMyOWRi/N2M3ZTlmNDY2M2Y5/MWZlNjc2LmpwZWc_/b2RuSGVpZ2h0PTU4/MCZvZG5XaWR0aD01/ODAmb2RuQmc9RkZG/RkZG',
        'categorias' => ['trend'],
        'subcategorias' => [],
        'precio' => 69.99
    ],

    // Productos para niños
    [
        'id'=> 6,
        'nombre' => 'Mochila niño basica',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/zs8mrhLjnDIrs77C_-v_3UPdScyux79idz3IlVOWWAI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saW1v/bmFkYS5jbC9jZG4v/c2hvcC9maWxlcy9C/OTE4MjIyNTAxMTQ5/MDBfMV9sYXJnZS5q/cGc_dj0xNzM4Nzg2/MjEw',
        'categorias' => ['ninos'],
        'subcategorias' => ['accesorio'],
        'precio' => 19.99
    ],
    [
        'id'=> 7,
        'nombre' => 'Gorro niño tejido',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/WyGLZAnXdg8HjMdml_3_32ZYcG6wHfFaXaBwth-jcKA/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saW1v/bmFkYS5jbC9jZG4v/c2hvcC9maWxlcy9C/OTE2MjIyNTAxNTk5/MDFfMV9sYXJnZS5q/cGc_dj0xNzM4MTgy/NTYx',
        'categorias' => ['ninos'],
        'subcategorias' => ['accesorio'],
        'precio' => 19.99
    ],
    [
        'id'=> 8,
        'nombre' => 'Guantes niño con diseño',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/e7OH5GGz3_1tuWjybPSLDp6AOmOdUg9EkK8fmN-Fxmc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9saW1v/bmFkYS5jbC9jZG4v/c2hvcC9maWxlcy9C/OTE5MDIyNTAxNTk5/MDBfMV9sYXJnZS5q/cGc_dj0xNzM4NjEx/ODAw',
        'categorias' => ['ninos'],
        'subcategorias' => ['accesorio'],
        'precio' => 19.99
    ],
    [
        'id'=> 9,
        'nombre' => 'Ropa niño 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/dzk1605eDEt4CvXn7VnWgNbqgPMhuNEgwPsAiTyUaTM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8zcHAvYXNyL2Fh/NDJjNDdlLWQ4N2It/NGMxNy05ZTlkLTVj/ZDhmNTU3MzJhNy43/MGYyZDQ4YjE3OGQz/MmY0YzlmYjMxMmRj/N2VjZTc4Mi5qcGVn/P29kbkhlaWdodD01/NzYmb2RuV2lkdGg9/NTc2Jm9kbkJnPUZG/RkZGRg',
        'categorias' => ['ninos'],
        'subcategorias' => ['ropa'],
        'precio' => 24.99
    ],
    [
        'id'=> 10,
        'nombre' => 'Ropa niño 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/dOD1KzU3BG9KeV2D24rwMgrELClyOTq1ONqdhQSXzsY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8zcHAvYXNyLzFk/ZWYzYjE0LTM1M2Yt/NGY2ZS1iN2VkLTZm/ZmQxOWFmMTI0MC43/ODY2MzA4Yjk5NWVi/ZmVhYmY3MTMyNTky/MmQ4ZmY2ZC5qcGVn/P29kbkhlaWdodD01/NzYmb2RuV2lkdGg9/NTc2Jm9kbkJnPUZG/RkZGRg',
        'categorias' => ['ninos'],
        'subcategorias' => ['ropa'],
        'precio' => 24.99
    ],
    [
        'id'=> 11,
        'nombre' => 'Ropa niño 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/ki7IDO0SvTmyyGwPphidKolKqkZXbwfm9NzvVKSgxYE/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/ODF3a3Jra3NTakwu/anBn',
        'categorias' => ['ninos'],
        'subcategorias' => ['ropa'],
        'precio' => 24.99
    ],
    [
        'id'=> 12,
        'nombre' => 'Tenis niño 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/LLbJZCeCC55y0ffJztzFtLS5NuJ1QjXD7ltWrUZcoLs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMuYWRpZGFzLmNv/bS9pbWFnZXMvd180/NTAsZl9hdXRvLHFf/YXV0by82OTQyZDBj/M2IwYTI0ZWI0OTFl/NjczOWI2MzYyYzdj/ZV85MzY2L0pJMDIx/NF8xNV9ob3Zlcl9z/dGFuZGFyZC5qcGc',
        'categorias' => ['ninos'],
        'subcategorias' => ['tenis'],
        'precio' => 34.99
    ],
    [
        'id'=> 13,
        'nombre' => 'Tenis niño 2',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/LME6nGNw1G2UiC8SbjIbAKIOf6ALUVmWo-Et2mLnRp0/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9hc3Nl/dHMuYWRpZGFzLmNv/bS9pbWFnZXMvd180/NTAsZl9hdXRvLHFf/YXV0by9kYzY5ZDVl/NmExYjQ0MjcxYmVm/OTM1Y2ZmNjllNTg0/ZV85MzY2L0pJMDIx/MV8xNV9ob3Zlcl9z/dGFuZGFyZC5qcGc',
        'categorias' => ['ninos'],
        'subcategorias' => ['tenis'],
        'precio' => 34.99
    ],
    [
        'id'=> 14,
        'nombre' => 'Tenis niño 3',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/ZGCnVDtrBmX9Dqp-HCbICrCs0pIi71cKgCTz5rxBBaw/rs:fit:500:0:0:0/g:ce/aHR0cHM6Ly93d3cu/Z2VvcmdpZWJveS5j/b20vY2RuL3Nob3Av/ZmlsZXMvSEUwMTQ5/NjAwMS0wNV84Nzc3/Y2U4Zi0zODZhLTRh/NDEtODM3ZS1kNTZk/ZWMzNzJlZWNfMzIw/eC5qcGc_dj0xNzM4/NzgzNzIx',
        'categorias' => ['ninos'],
        'subcategorias' => ['tenis'],
        'precio' => 34.99
    ],

    // Productos para hombre
    [
        'id'=> 15,
        'nombre' => 'Accesorio hombre 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/gU4DEdwvo09PlEUfaWnFhrDVRYGgh5DIePjsA5u8tqo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9ldS1p/bWFnZXMuY29udGVu/dHN0YWNrLmNvbS92/My9hc3NldHMvYmx0/N2RjZDJjZmJjOTBk/NDVkZS9ibHRlNjIw/YTNhMDdkODkwNDZl/LzYyZWI4MTYyMzk0/YTY4MzMyYWQ5Yzkz/MS81LTFhdGxhc25l/ay5qcGc_Zm9ybWF0/PXBqcGcmYXV0bz13/ZWJwJnF1YWxpdHk9/NzUsOTAmd2lkdGg9/Mzg0MA',
        'categorias' => ['hombre'],
        'subcategorias' => ['accesorio'],
        'precio' => 29.99
    ],
    [
        'id'=> 16,
        'nombre' => 'Accesorio hombre 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/rOcoCXio7Y8kWZ54hTN-a1bQhwPIVJTHACDi_YnxC20/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9zb21l/b25lc29tZXdoZXJl/Lm14L2Nkbi9zaG9w/L3Byb2R1Y3RzL3Nv/bWVvbmUtc29tZXdo/ZXJlX0dvcnJhcy1E/ZXNpZXJ0by1sYXRl/cmFsXzYwMHguanBn/P3Y9MTY5ODk3MDIy/NQ',
        'categorias' => ['hombre'],
        'subcategorias' => ['accesorio'],
        'precio' => 29.99
    ],
    [
        'id'=> 17,
        'nombre' => 'Accesorio hombre 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/uu3knCgmDjhnjHBKPFoDeFphrFJB8HEumoe_NJWRVtk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9ldS1p/bWFnZXMuY29udGVu/dHN0YWNrLmNvbS92/My9hc3NldHMvYmx0/N2RjZDJjZmJjOTBk/NDVkZS9ibHQ3YTI4/MjFmYWNhMjljMTMw/LzYxZGVhMmNkMTY5/NWZjNDZmOWY1Mzgx/My8yMzkyNi5wYWNr/LTEuanBnP2Zvcm1h/dD1wanBnJmF1dG89/d2VicCZxdWFsaXR5/PTc1LDkwJndpZHRo/PTM4NDA',
        'categorias' => ['hombre'],
        'subcategorias' => ['accesorio'],
        'precio' => 29.99
    ],
    [
        'id'=> 18,
        'nombre' => 'Ropa hombre 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/nljhPX8qKJfBoba1-zlDbNEVVcGSJk3atamWC8YIX0c/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NTE5MDRsTEdjMUwu/anBn',
        'categorias' => ['hombre'],
        'subcategorias' => ['ropa'],
        'precio' => 39.99
    ],
    [
        'id'=> 19,
        'nombre' => 'Ropa hombre 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/BQp3PgMFIdQS4ZhmiqVIonSyBB-21bqpDBWsJWryMbo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8xcC9pbWFnZXMv/cHJvZHVjdC1pbWFn/ZXMvaW1nX2xhcmdl/LzAwNzUwMDU3ODE0/NjY4bC5qcGc_b2Ru/SGVpZ2h0PTU3NiZv/ZG5XaWR0aD01NzYm/b2RuQmc9RkZGRkZG',
        'categorias' => ['hombre'],
        'subcategorias' => ['ropa'],
        'precio' => 39.99
    ],
    [
        'id'=> 20,
        'nombre' => 'Ropa hombre 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/nN4zml6SRRFcEQsi8x0fRAO7tnMVml2-H2zpqGmAaug/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8zcHAvYXNyL2U1/NTViMGUwLWFmNDct/NGYwMC04NGUzLThi/MGQwYWZmOThhNi5h/ODQ3Y2ZkZDhjNjk4/ODRmMjI5YTc2ZWU0/MjA5ZmQzYS5qcGVn/P29kbkhlaWdodD01/NzYmb2RuV2lkdGg9/NTc2Jm9kbkJnPUZG/RkZGRg',
        'categorias' => ['hombre'],
        'subcategorias' => ['ropa'],
        'precio' => 39.99
    ],
    [
        'id'=> 21,
        'nombre' => 'Tenis hombre 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/zBnsGcR3jtOKJ78yNBMDAZIe_QIr5oSiay0RWsgknpI/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9yZXNv/dXJjZXMuY2xhcm9z/aG9wLmNvbS9tZWRp/b3MtcGxhemF2aXAv/cHVibGljaWRhZC81/ZjIwMjM5ZTZkMWM1/X2FkeXMzMDA0NzQz/YmstMmpwZy5qcGc',
        'categorias' => ['hombre'],
        'subcategorias' => ['tenis'],
        'precio' => 59.99
    ],
    [
        'id'=> 22,
        'nombre' => 'Tenis hombre 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/hAfQNGXzUUoufFh1hdd4ppBzjiKKCC-SW5x7u4aF0Ps/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jb250/ZW50cy5tZWRpYWRl/Y2F0aGxvbi5jb20v/cDI2MDY3MDgvayQz/ZGU5NWRkMjQ5ZTYz/YjczODExZGNkMmI0/MzRkNzNjNS90ZW5p/cy1kZS1ydW5uaW5n/LWpvZ2Zsb3ctNTAw/MS1ob21icmUtYmxh/bmNvc2xhc2hhenVs/c2xhc2hyb2pvLmpw/Zz9mb3JtYXQ9YXV0/byZxdWFsaXR5PTQw/JmY9NTIweDUyMA',
        'categorias' => ['hombre'],
        'subcategorias' => ['tenis'],
        'precio' => 59.99
    ],
    [
        'id'=> 23,
        'nombre' => 'Tenis hombre 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/HuMDU5E3C5MpxY5ZP_yOQMbSQzomz_hdWtKfxR9u31Q/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9maWxl/cy5wbHl0aXguY29t/L2FwaS92MS4xL2Zp/bGUvcHVibGljX2Zp/bGVzL3BpbS9hc3Nl/dHMvMjYvMjcvNjAv/NjcvNjc2MDI3MjYy/NTM3NmQwMDA4OWY1/NDgwL2ltYWdlcy8w/My8xZS9jNi82Ny82/N2M2MWUwM2MyY2E0/MTI4MGQyOWYwZDcv/MTAwMjA5MTI4XzEu/dGlmP3M9NjAweCZ0/PUpQRUc',
        'categorias' => ['hombre'],
        'subcategorias' => ['tenis'],
        'precio' => 59.99
    ],
    // Productos para mujer
    [
        'id'=> 24,
        'nombre' => 'Accesorio mujer 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/x0TIoTG9MTFbmt9djZx_7oQlmP0YwMB2fKyKLmNoUZs/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pbWcw/MS56dGF0Lm5ldC9h/cnRpY2xlL3NwcC1t/ZWRpYS1wMS9lYmI4/OTdmY2ZlMmU0OTMw/OGZkZjUxY2IxYWQ3/OWMyYS85ZGRiZTRl/Y2JhZDM0YmNjODk2/YTZiNDhmY2U0ZmMz/YS5qcGc_aW13aWR0/aD0zMDAmZmlsdGVy/PXBhY2tzaG90',
        'categorias' => ['mujer'],
        'subcategorias' => ['accesorio'],
        'precio' => 27.99
    ],
    [
        'id'=> 25,
        'nombre' => 'Accesorio mujer 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/im-3veMXTLogT0woF9TVDdAU1FDL6-BGJSSIvY-xzWk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFuN1JJakhiRkwu/anBn',
        'categorias' => ['mujer'],
        'subcategorias' => ['accesorio'],
        'precio' => 27.99
    ],
    [
        'id'=> 26,
        'nombre' => 'Accesorio mujer 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/flZJ_LjKNOXRi6FRDeoq7FsrAzvZ41mGtDPCRQFLzjg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tLm1l/ZGlhLWFtYXpvbi5j/b20vaW1hZ2VzL0kv/NjFLZjJYdE9HSkwu/anBn',
        'categorias' => ['mujer'],
        'subcategorias' => ['accesorio'],
        'precio' => 27.99
    ],
    [
        'id'=> 27,
        'nombre' => 'Ropa mujer 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/eFaL9FW6EcHf_ERCtsAdqF4I1V1pLvkiLQ5zAKk8ZEo/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8zcHAvYXNyLzRk/YzcyNzAzLTRhNjIt/NDAyMC1hMDFmLTg0/MDNjYTYxMjExMy4z/MmY3MTVmMzQ1MTBm/ZDMyYjNlZDdiN2Zi/YTU2ZDdjMi5qcGVn/P29kbkhlaWdodD01/NzYmb2RuV2lkdGg9/NTc2Jm9kbkJnPUZG/RkZGRg',
        'categorias' => ['mujer'],
        'subcategorias' => ['ropa'],
        'precio' => 35.99
    ],
    [
        'id'=> 28,
        'nombre' => 'Ropa mujer 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/hSOWDLtMoTotvoXiF8AsfMbG7WYqgZPcoNules4HxXg/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9pNS53/YWxtYXJ0aW1hZ2Vz/LmNvbS5teC9tZy9n/bS8zcHAvYXNyLzNk/MjUxNTRlLWI2ODIt/NGU0NC1hYzA5LTRm/YTBiYzgxOTQ2MC5j/ODBiODhmYjgxZTY0/NWU3ODZhNTRhNmEx/YzM5NDUzNy5qcGVn/P29kbkhlaWdodD01/NzYmb2RuV2lkdGg9/NTc2Jm9kbkJnPUZG/RkZGRg',
        'categorias' => ['mujer'],
        'subcategorias' => ['ropa'],
        'precio' => 35.99
    ],
    [
        'id'=> 29,
        'nombre' => 'Ropa mujer 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/Dw5Pv0QjAdaGhNgyTHGDFjLcNTemdgmQG7cpbst6iLM/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9yZXNv/dXJjZXMuY2xhcm9z/aG9wLmNvbS9tZWRp/b3MtcGxhemF2aXAv/bWt0LzYzZjkwZjRj/YjhmMjFfaDFjYzZl/NTAxZmM4MzQ3NjI5/MWJkMjZmOTU4ODZi/NTM5ZndlYnBqcGcu/anBn',
        'categorias' => ['mujer'],
        'subcategorias' => ['ropa'],
        'precio' => 35.99
    ],
    [
        'id'=> 30,
        'nombre' => 'Tenis mujer 1',
        'descripcion' => 'Descripción del producto 1.',
        'imagen' => 'https://imgs.search.brave.com/60HpPN8lEHU8YNdbnEB4DIPj_O75TSpjzKI-9WcZUrc/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9tZWRp/YS52b2d1ZS5teC9w/aG90b3MvNjdmM2Zl/ZTU2ZWZkYjFlNzFm/YTk2ZjY0L21hc3Rl/ci93XzE2MDAsY19s/aW1pdC9UZW5pcy1j/b2xvci1yb3NhLVB1/bWEuanBn',
        'categorias' => ['mujer'],
        'subcategorias' => ['tenis'],
        'precio' => 49.99
    ],
    [
        'id'=> 31,
        'nombre' => 'Tenis mujer 2',
        'descripcion' => 'Descripción del producto 2.',
        'imagen' => 'https://imgs.search.brave.com/qDOtFZENigqg7sR1AwrZh8D1YKdNZS5pkTMQIO522uY/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9ndWVz/c214LnZ0ZXhhc3Nl/dHMuY29tL2FycXVp/dm9zL2lkcy83MTEw/OTEtNTAwLTY2Nj92/PTYzODc2MDE1MjUz/MDIzMDAwMCZ3aWR0/aD01MDAmaGVpZ2h0/PTY2NiZhc3BlY3Q9/dHJ1ZQ',
        'categorias' => ['mujer'],
        'subcategorias' => ['tenis'],
        'precio' => 49.99
    ],
    [
        'id'=> 32,
        'nombre' => 'Tenis mujer 3',
        'descripcion' => 'Descripción del producto 3.',
        'imagen' => 'https://imgs.search.brave.com/60m7dXc1V78xyvqBUZp1X_kCiCaGbzIglO9sRBhKzSk/rs:fit:860:0:0:0/g:ce/aHR0cHM6Ly9jYWx2/aW5rbGVpbm14LnZ0/ZXhpbWcuY29tLmJy/L2FycXVpdm9zL2lk/cy81MTgyOTAtNDAw/LTUzMC9ZVzBZVzAx/ODMzMEhKLVBMQU5P/LmpwZz92PTYzODcy/NDg0NDAyNjQzMDAw/MA',
        'categorias' => ['mujer'],
        'subcategorias' => ['tenis'],
        'precio' => 49.99
    ]
    ];

    public function show($id)
    {
        $producto = collect($this->productos)->firstWhere('id', (int)$id);

        if (!$producto) {
            abort(404);
        }

        $relacionados = collect($this->productos)
            ->where('id', '!=', $producto['id'])
            ->whereIn('categorias.0', $producto['categorias'])
            ->take(4)
            ->all();

        return view('producto.show', [
            'producto' => $producto,
            'relacionados' => $relacionados
        ]);
    }
}
