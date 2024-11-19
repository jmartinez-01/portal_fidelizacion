<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

//RUTAS DEL SISTEMA 

// Ruta pública
Route::get('/', function () { return view('layouts.Login'); });

// Ruta de verificación de login
Route::post('/login_verificar', [LoginController::class, 'verificar_Login']);

Route::get('/inicio', function () { return view('inicio'); });
   


//MODULO DE SEGURIDAD


Route::get('Permisos', [App\Http\Controllers\PermisoController::class, 'index']);
Route::get('Parametros', [App\Http\Controllers\ParametroController::class, 'index']);
Route::get('Bitacora', [App\Http\Controllers\BitacoraController::class, 'index']);

Route::get('Backup_Restore', [App\Http\Controllers\Backup_RestoreController::class, 'index']);

Route::get('CambiarContrasena', [App\Http\Controllers\CambiarContrasenaController::class, 'index']);
Route::get('AdministrarPerfil', [App\Http\Controllers\AdministrarPerfilController::class, 'index']);



//MODULO DE CANJES

Route::get('Devoluciones', [App\Http\Controllers\DevolucionController::class, 'index']);



//  ´-------------------1-----------Estado TERMINADO  
Route::get('Estado', [App\Http\Controllers\EstadoController::class, 'index']);
Route::post('Agregar_Estado',  [App\Http\Controllers\EstadoController::class, 'store']);
Route::put('/EditarEstado', [App\Http\Controllers\EstadoController::class, 'update']);

//---------------------2------------PAIS  TERMINADO
Route::get('Pais', [App\Http\Controllers\PaisController::class, 'index']);
Route::post('agregar_pais',  [App\Http\Controllers\PaisController::class, 'store']);
Route::put('editar_pais', [App\Http\Controllers\PaisController::class, 'update']);

//.....................3..............ESTADO_CANJE  NO ME AGREGAR  
Route::get('Estado_Canje', [App\Http\Controllers\EstadoCanjeController::class, 'index']);
Route::post('agregar_estado_canje',[App\Http\Controllers\EstadoCanjeController::class, 'store']);
Route::put('editar_estado_canje', [App\Http\Controllers\EstadoCanjeController::class, 'update']);

//------------------4------------TIPO ENTIDAD TERMINADO
Route::get('TipoEntidad', [App\Http\Controllers\TipoEntidadController::class, 'index']);
Route::post('agregar_entidad',[App\Http\Controllers\TipoEntidadController::class, 'store']);
Route::put('editar_entidad', [App\Http\Controllers\TipoEntidadController::class, 'update']);

//--------------------5-----------TIPO REGISTRO  TERMINADO
Route::get('TipoRegistro', [App\Http\Controllers\TipoRegistroController::class, 'index']);
Route::post('agregar_registro',[App\Http\Controllers\TipoRegistroController::class, 'store']);
Route::put('editar_registro', [App\Http\Controllers\TipoRegistroController::class, 'update']);


//--------------6-----------------------UNIDAD MEDIDA TERMINADO
Route::get('UnidadMedida', [App\Http\Controllers\UnidadMedidaController::class, 'index']);
Route::post('agregar_unimedida',[App\Http\Controllers\UnidadMedidaController::class, 'store']);
Route::put('editar_unimedida', [App\Http\Controllers\UnidadMedidaController::class, 'update']);

//-------------------7------------UNIDAD ROLES TERMINADO CON EXITO
Route::get('Roles', [App\Http\Controllers\RolController::class, 'index']);
Route::post('agregar_rol',[App\Http\Controllers\RolController::class, 'store']);
Route::put('editar_rol', [App\Http\Controllers\RolController::class, 'update']);

//----------8------------------UNIDAD VIA_ADMINISTRACION TERMINADO CON EXITO
Route::get('ViaAdministracion', [App\Http\Controllers\ViaAdministracionController::class, 'index']);
Route::post('agregar_viadmin',[App\Http\Controllers\ViaAdministracionController::class, 'store']);
Route::put('editar_viadmin', [App\Http\Controllers\ViaAdministracionController::class, 'update']);

//-----------------9------------UNIDAD TERMINADO CON EXITO
Route::get('Zona', [App\Http\Controllers\ZonaController::class, 'index']);
Route::post('agregar_zona',[App\Http\Controllers\ZonaController::class, 'store']);
Route::put('editar_zona', [App\Http\Controllers\ZonaController::class, 'update']);

//----------------------10--------------------UNIDAD DEPARTAMENTO TERMINADO CON EXITO
Route::get('Departamento', [App\Http\Controllers\DepartamentoController::class, 'index']);
Route::post('agregar_depto',[App\Http\Controllers\DepartamentoController::class, 'store']);
Route::put('editar_depto', [App\Http\Controllers\DepartamentoController::class, 'update']);

//----------------------11--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO

Route::get('Municipio', [App\Http\Controllers\MunicipioController::class, 'index']);
Route::post('agregar_municipio',[App\Http\Controllers\MunicipioController::class, 'store']);
Route::put('editar_municipio', [App\Http\Controllers\MunicipioController::class, 'update']);

//----------------------12--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('Especialidad', [App\Http\Controllers\EspecialidadController::class, 'index']);
Route::post('agregar_especialidad',[App\Http\Controllers\EspecialidadController::class, 'store']);
Route::put('editar_especialidad', [App\Http\Controllers\EspecialidadController::class, 'update']);


//----------------------13--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('FormaFarmaceutica', [App\Http\Controllers\FormaFarmaceuticaController::class, 'index']);
Route::post('agregar_farmaceutica',[App\Http\Controllers\FormaFarmaceuticaController::class, 'store']);
Route::put('editar_farmaceutica', [App\Http\Controllers\FormaFarmaceuticaController::class, 'update']);

//----------------------14--------------------UNIDAD MUNICIPIO TERMINADO CON EXITO
Route::get('Usuarios', [App\Http\Controllers\UsuarioController::class, 'index']);
Route::post('agregar_usuario',[App\Http\Controllers\UsuarioController::class, 'store']);
Route::put('editar_usuario', [App\Http\Controllers\UsuarioController::class, 'update']);

//-------------------------------------TBLA PACIENTES

Route::get('Pacientes', [App\Http\Controllers\PacientesController::class, 'index']);
Route::post('agregar_paciente',[App\Http\Controllers\PacientesController::class, 'store']);
Route::put('editar_paciente', [App\Http\Controllers\PacientesController::class, 'update']);

//-------------------------------------TBLA Productos
Route::get('Productos', [App\Http\Controllers\ProductosController::class, 'index']);
Route::post('agregar_producto',[App\Http\Controllers\ProductosController::class, 'store']);
Route::put('editar_producto', [App\Http\Controllers\ProductosController::class, 'update']);

//----------------------WILLIAN--------------------UNIDAD MARCAS COMPLETADO
Route::get('Marca', [App\Http\Controllers\MarcaProductoController::class, 'index']);
Route::post('agregar_marca',[App\Http\Controllers\MarcaProductoController::class, 'store']);
Route::put('editar_marca', [App\Http\Controllers\MarcaProductoController::class, 'update']);

//----------------------14--------------------TIPO CONTADO TERMINADO
Route::get('TipoContacto', [App\Http\Controllers\TipoContactoController::class, 'index']);
Route::post('agregar_tipo_contacto',[App\Http\Controllers\TipoContactoController::class, 'store']);
Route::put('editar_tipo_contacto', [App\Http\Controllers\TipoContactoController::class, 'update']);

//----------------------WILI--------------------UNIDAD LABORATORIOs
Route::get('Laboratorios', [App\Http\Controllers\LaboratoriosController::class, 'index']);
Route::post('agregar_laboratorio',[App\Http\Controllers\LaboratoriosController::class, 'store']);
Route::put('editar_laboratorio', [App\Http\Controllers\LaboratoriosController::class, 'update']);


//----------------------WILLI--------------------UNIDAD FARMACIAS
Route::get('Farmacias', [App\Http\Controllers\FarmaciasController::class, 'index']);
Route::post('agregar_farmacia',[App\Http\Controllers\FarmaciasController::class, 'store']);
Route::put('editar_farmacia', [App\Http\Controllers\FarmaciasController::class, 'update']);

//----------------------14--------------------CONTACTO 
Route::get('Contacto', [App\Http\Controllers\ContactosController::class, 'index']);
Route::post('agregar_contacto',[App\Http\Controllers\ContactosController::class, 'store']);
Route::put('editar_contacto', [App\Http\Controllers\ContactosController::class, 'update']);

//------------------------------------------- SUCURSAL
Route::get('Sucursal', [App\Http\Controllers\SucursalesController::class, 'index']);
Route::post('agregar_sucursal',[App\Http\Controllers\SucursalesController::class, 'store']);
Route::put('editar_sucursal', [App\Http\Controllers\SucursalesController::class, 'update']);

//------------------------------------------- FACTURAS
Route::get('Facturas', [App\Http\Controllers\FacturaController::class, 'index']);
Route::post('agregar_factura',[App\Http\Controllers\FacturaController::class, 'store']);

//-------------------------------------------CANJES
Route::get('Canjes', [App\Http\Controllers\CanjeController::class, 'index']);
Route::post('agregar_registrocanje',[App\Http\Controllers\CanjeController::class, 'store']);

//-------------------------------------------OBJETOS
Route::get('Objeto', [App\Http\Controllers\ObjetoController::class, 'index']);
Route::post('agregar_objeto',[App\Http\Controllers\ObjetoController::class, 'store']);
Route::put('editar_objeto', [App\Http\Controllers\ObjetoController::class, 'update']);
Route::delete('eliminar_objeto/{id_objeto}', [App\Http\Controllers\ObjetoController::class, 'destroy']);

//-------------------------------------------PARAMETRO
Route::get('Parametro', [App\Http\Controllers\ParametroController::class, 'index']);
Route::post('agregar_parametro',[App\Http\Controllers\ParametroController::class, 'store']);
Route::put('editar_parametro', [App\Http\Controllers\ParametroController::class, 'update']);
Route::delete('eliminar_parametro/{id_parametro}', [App\Http\Controllers\ParametroController::class, 'destroy']);

//-------------------------------------------permiso
Route::get('Permiso', [App\Http\Controllers\PermisoController::class, 'index']);
Route::post('agregar_permiso',[App\Http\Controllers\PermisoController::class, 'store']);
Route::put('editar_permiso', [App\Http\Controllers\PermisoController::class, 'update']);
Route::delete('eliminar_permiso/{id_permiso}', [App\Http\Controllers\PermisoController::class, 'destroy']);










//MODULO DE OTRAS PAGINAS

Route::get('acerca', [App\Http\Controllers\acercaController::class, 'index']);
Route::get('terminos', [App\Http\Controllers\terminosController::class, 'index']);
Route::get('politica_privacidad', [App\Http\Controllers\politica_privacidadController::class, 'index']);


use App\Http\Controllers\PdfController;

Route::get('/crear-pdf', function() {
    return view('crear-pdf');
});

// Ruta con parámetros GET
Route::get('/descargar-pdf', [PdfController::class, 'createPDF'])->name('pdf.download');
Route::get('/descargar-pdf-factura', [PdfController::class, 'createPDF2'])->name('pdf.downloadfactura');



