<?php

use App\Http\Controllers\ActividadesProcesadasController;
use App\Http\Controllers\AlergiaMedicamentosController;
use App\Http\Controllers\CandidatoExternoController;
use App\Http\Controllers\CarrerasUniversitariasController;
use App\Http\Controllers\ContactosEmergenciaController;
use App\Http\Controllers\CursosTecnicosController;
use App\Http\Controllers\DatosLaboralController;
use App\Http\Controllers\DiplomadoController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EnfermedadesController;
use App\Http\Controllers\HistorialLaboralController;
use App\Http\Controllers\IntegridadLaboralController;
use App\Http\Controllers\IntegridadLaboralExternoController;
use App\Http\Controllers\MaestriaController;
use App\Http\Controllers\ParticipacionController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\PhdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReferenciasPersonalesFamiliaresController;
use App\Http\Controllers\ResidenciaController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\TalleresController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/clear', function () {
    Artisan::call('optimize');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('key:generate');
return "Cleared!";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    # Modulo Personal
    Route::get('/personal', [PersonalController::class, 'index'])->name('personal.index');
    Route::get('/personal/nuevo-personal', [PersonalController::class, 'create'])->name('personal.create');
    Route::post('/personal/guardar-personal', [PersonalController::class, 'store'])->name('personal.store');
    Route::get('/personal/{id}/editar-personal', [PersonalController::class, 'edit'])->name('personal.edit');
    Route::put('/personal/{id}/actualizar-personal', [PersonalController::class, 'update'])->name('personal.update');
    Route::get('/personal/{id}/ver-perfil-de-personal', [PersonalController::class, 'show'])->name('personal.show');
    Route::get('/personal/{id}/actividades-educativa', [PersonalController::class, 'actividadeducativa'])->name('personal.actividadeducativa');
    Route::get('/personal/{id}/guardar-actividades-educativa', [PersonalController::class, 'storecapacidadeducativa'])->name('personal.storecapacidadeducativa');
    Route::get('/personal/{id}/actividades-laboral', [PersonalController::class, 'actividadlaboral'])->name('personal.actividadlaboral');
    Route::get('/personal/{id}/investigacion-laboral', [PersonalController::class, 'investigacionlaboral'])->name('personal.investigacionlaboral');
    Route::post('/personal/{id}/guardar-certificaciones-y-depuraciones', [PersonalController::class, 'storecertificaciones'])->name('personal.storecertificaciones');
    Route::get('/personal/{id}/informe-personal', [PersonalController::class, 'informepersonal'])->name('personal.informepersonal');
    Route::get('/personal/{id}/perfil-curricular', [PersonalController::class, 'perfilcurricular'])->name('personal.perfilcurricular');
    Route::get('/personal/{id}/informe-confidencial', [PersonalController::class, 'informeconfidencial'])->name('personal.informeconfidencial');

    Route::get('/personal/{id}/get-municipios', [PersonalController::class, 'getMunicipio'])->name('personal.getMunicipio');

    # Modulo Candidato Externo
    Route::get('/candidatos-externos', [CandidatoExternoController::class, 'index'])->name('candidato-externo.index');
    Route::get('/candidatos-externos/nuevo-candidato-externo', [CandidatoExternoController::class, 'create'])->name('candidato-externo.create');
    Route::post('/candidatos-externos/guardar-candidato-externo', [CandidatoExternoController::class, 'store'])->name('candidato-externo.store');
    Route::get('/candidatos-externos/{id}/editar-candidato-externo', [CandidatoExternoController::class, 'edit'])->name('candidato-externo.edit');
    Route::put('/candidatos-externos/{id}/actualizar-candidato-externo', [CandidatoExternoController::class, 'update'])->name('candidato-externo.update');
    Route::get('/candidatos-externos/{id}/ver-perfil-de-candidato-externo', [CandidatoExternoController::class, 'show'])->name('candidato-externo.show');
    Route::get('/candidatos-externos/{id}/investigacion-laboral', [CandidatoExternoController::class, 'investigacionlaboral'])->name('candidato-externo.investigacionlaboral');
    Route::post('/candidatos-externos/{id}/guardar-certificaciones-y-depuraciones', [CandidatoExternoController::class, 'storecertificaciones'])->name('candidato-externo.storecertificaciones');

     # Integridad Laboral Candidato Externo
    Route::get('/candidatos-externos/{id}/integridad-laboral/nueva-evaluacion', [IntegridadLaboralExternoController::class, 'create'])->name('evaluacion-externa.create');
    Route::post('/candidatos-externos/{id}/integridad-laboral/guardar-evaluacion', [IntegridadLaboralExternoController::class, 'store'])->name('evaluacion-externa.store');
    Route::get('/candidatos-externos/{id}/integridad-laboral/{evaluacion_id}/ver-evaluacion', [IntegridadLaboralExternoController::class, 'show'])->name('evaluacion-externa.show');
    Route::get('/candidatos-externos/{id}/integridad-laboral/{evaluacion_id}/editar-evaluacion', [IntegridadLaboralExternoController::class, 'edit'])->name('evaluacion-externa.edit');
    Route::put('/candidatos-externos/{id}/integridad-laboral/{evaluacion_id}/actualizar-evaluacion', [IntegridadLaboralExternoController::class, 'update'])->name('evaluacion-externa.update');

    # Residencia - Edicion
    Route::get('/personal/{id}/residencia/{residencia_id}/editar-residencia', [ResidenciaController::class, 'edit'])->name('residencia.edit');
    Route::put('/personal/{id}/residencia/{residencia_id}/actualizar-residencia', [ResidenciaController::class, 'update'])->name('residencia.update');

    # Alergia a Medicamentos
    Route::get('/personal/{id}/alergia-medicamentos/nuevo-medicamento', [AlergiaMedicamentosController::class, 'create'])->name('medicamento.create');
    Route::post('/personal/{id}/alergia-medicamentos/guardar-medicamento', [AlergiaMedicamentosController::class, 'store'])->name('medicamento.store');
    Route::get('/personal/{id}/alergia-medicamentos/{medicamento_id}/editar-medicamento', [AlergiaMedicamentosController::class, 'edit'])->name('medicamento.edit');
    Route::put('/personal/{id}/alergia-medicamentos/{medicamento_id}/actualizar-medicamento', [AlergiaMedicamentosController::class, 'update'])->name('medicamento.update');
    Route::delete('/personal/{id}/alergia-medicamentos/{medicamento_id}/eliminar-medicamento', [AlergiaMedicamentosController::class, 'destroy'])->name('medicamento.destroy');

    # Enfermedades
    Route::get('/personal/{id}/enfermedades/nueva-enfermedad', [EnfermedadesController::class, 'create'])->name('enfermedad.create');
    Route::post('/personal/{id}/enfermedades/guardar-enfermedad', [EnfermedadesController::class, 'store'])->name('enfermedad.store');
    Route::get('/personal/{id}/enfermedades/{enfermedad_id}/editar-enfermedad', [EnfermedadesController::class, 'edit'])->name('enfermedad.edit');
    Route::put('/personal/{id}/enfermedades/{enfermedad_id}/actualizar-enfermedad', [EnfermedadesController::class, 'update'])->name('enfermedad.update');
    Route::delete('/personal/{id}/enfermedades/{enfermedad_id}/eliminar-enfermedad', [EnfermedadesController::class, 'destroy'])->name('enfermedad.destroy');

    # Modulo Contactos de Emergencia
    Route::get('/personal/{id}/contactos-de-emergencia/nuevo-contacto', [ContactosEmergenciaController::class, 'create'])->name('contacto.create');
    Route::post('/personal/{id}/contactos-de-emergencia/guardar-contacto', [ContactosEmergenciaController::class, 'store'])->name('contacto.store');
    Route::get('/personal/{id}/contactos-de-emergencia/{contacto_id}/editar-contacto', [ContactosEmergenciaController::class, 'edit'])->name('contacto.edit');
    Route::put('/personal/{id}/contactos-de-emergencia/{contacto_id}/actualizar-contacto', [ContactosEmergenciaController::class, 'update'])->name('contacto.update');
    Route::delete('/personal/{id}/contactos-de-emergencia/{contacto_id}/eliminar-contacto', [ContactosEmergenciaController::class, 'destroy'])->name('contacto.destroy');

    # Referencias Personales - Edicion
    Route::get('/personal/{id}/referencias/nueva-referencia', [ReferenciasPersonalesFamiliaresController::class, 'create'])->name('referencia.create');
    Route::post('/personal/{id}/referencias/guardar-referencia', [ReferenciasPersonalesFamiliaresController::class, 'store'])->name('referencia.store');
    Route::get('/personal/{id}/referencias/{residencia_id}/editar-referencia', [ReferenciasPersonalesFamiliaresController::class, 'edit'])->name('referencia.edit');
    Route::put('/personal/{id}/referencias/{residencia_id}/actualizar-referencia', [ReferenciasPersonalesFamiliaresController::class, 'update'])->name('referencia.update');
    Route::delete('/personal/{id}/referencias/{residencia_id}/eliminar-referencia', [ReferenciasPersonalesFamiliaresController::class, 'destroy'])->name('referencia.destroy');

    # Modulo Carreras Universitaria
    Route::get('/personal/{id}/carreras-universitaria/nueva-carrera', [CarrerasUniversitariasController::class, 'create'])->name('carrera.create');
    Route::post('/personal/{id}/carreras-universitaria/guardar-carrera', [CarrerasUniversitariasController::class, 'store'])->name('carrera.store');
    Route::get('/personal/{id}/carreras-universitaria/{carrera_id}/editar-carrera', [CarrerasUniversitariasController::class, 'edit'])->name('carrera.edit');
    Route::put('/personal/{id}/carreras-universitaria/{carrera_id}/actualizar-carrera', [CarrerasUniversitariasController::class, 'update'])->name('carrera.update');
    Route::delete('/personal/{id}/carreras-universitaria/{carrera_id}/eliminar-carrera', [CarrerasUniversitariasController::class, 'destroy'])->name('carrera.destroy');

    # Modulo Maestrias
    Route::get('/personal/{id}/maestrias/nueva-maestria', [MaestriaController::class, 'create'])->name('maestria.create');
    Route::post('/personal/{id}/maestrias/guardar-maestria', [MaestriaController::class, 'store'])->name('maestria.store');
    Route::get('/personal/{id}/maestrias/{maestria_id}/editar-maestria', [MaestriaController::class, 'edit'])->name('maestria.edit');
    Route::put('/personal/{id}/maestrias/{maestria_id}/actualizar-maestria', [MaestriaController::class, 'update'])->name('maestria.update');
    Route::delete('/personal/{id}/maestrias/{maestria_id}/eliminar-maestria', [MaestriaController::class, 'destroy'])->name('maestria.destroy');

    # Modulo Phds
    Route::get('/personal/{id}/phds/nuevo-phd', [PhdController::class, 'create'])->name('phd.create');
    Route::post('/personal/{id}/phds/guardar-phd', [PhdController::class, 'store'])->name('phd.store');
    Route::get('/personal/{id}/phds/{phd_id}/editar-phd', [PhdController::class, 'edit'])->name('phd.edit');
    Route::put('/personal/{id}/phds/{phd_id}/actualizar-phd', [PhdController::class, 'update'])->name('phd.update');
    Route::delete('/personal/{id}/phds/{phd_id}/eliminar-phd', [PhdController::class, 'destroy'])->name('phd.destroy');

    # Modulo Cursos
    Route::get('/personal/{id}/cursos-tecnicos/nuevo-curso', [CursosTecnicosController::class, 'create'])->name('curso.create');
    Route::post('/personal/{id}/cursos-tecnicos/guardar-curso', [CursosTecnicosController::class, 'store'])->name('curso.store');
    Route::get('/personal/{id}/cursos-tecnicos/{curso_id}/editar-curso', [CursosTecnicosController::class, 'edit'])->name('curso.edit');
    Route::put('/personal/{id}/cursos-tecnicos/{curso_id}/actualizar-curso', [CursosTecnicosController::class, 'update'])->name('curso.update');
    Route::delete('/personal/{id}/cursos-tecnicos/{curso_id}/eliminar-curso', [CursosTecnicosController::class, 'destroy'])->name('curso.destroy');

    # Modulo Diplomado
    Route::get('/personal/{id}/diplomados/nuevo-diplomado', [DiplomadoController::class, 'create'])->name('diplomado.create');
    Route::post('/personal/{id}/diplomados/guardar-diplomado', [DiplomadoController::class, 'store'])->name('diplomado.store');
    Route::get('/personal/{id}/diplomados/{diplomado_id}/editar-diplomado', [DiplomadoController::class, 'edit'])->name('diplomado.edit');
    Route::put('/personal/{id}/diplomados/{diplomado_id}/actualizar-diplomado', [DiplomadoController::class, 'update'])->name('diplomado.update');
    Route::delete('/personal/{id}/diplomados/{diplomado_id}/eliminar-diplomado', [DiplomadoController::class, 'destroy'])->name('diplomado.destroy');

    # Modulo Participacion
    Route::get('/personal/{id}/participacion/nueva-participacion', [ParticipacionController::class, 'create'])->name('participacion.create');
    Route::post('/personal/{id}/participacion/guardar-participacion', [ParticipacionController::class, 'store'])->name('participacion.store');
    Route::get('/personal/{id}/participacion/{participacion_id}/editar-participacion', [ParticipacionController::class, 'edit'])->name('participacion.edit');
    Route::put('/personal/{id}/participacion/{participacion_id}/actualizar-participacion', [ParticipacionController::class, 'update'])->name('participacion.update');
    Route::delete('/personal/{id}/participacion/{participacion_id}/eliminar-participacion', [ParticipacionController::class, 'destroy'])->name('participacion.destroy');

    # Modulo Talleres
    Route::get('/personal/{id}/talleres/nuevo-taller', [TalleresController::class, 'create'])->name('taller.create');
    Route::post('/personal/{id}/talleres/guardar-taller', [TalleresController::class, 'store'])->name('taller.store');
    Route::get('/personal/{id}/talleres/{participacion_id}/editar-taller', [TalleresController::class, 'edit'])->name('taller.edit');
    Route::put('/personal/{id}/talleres/{participacion_id}/actualizar-taller', [TalleresController::class, 'update'])->name('taller.update');
    Route::delete('/personal/{id}/talleres/{participacion_id}/eliminar-taller', [TalleresController::class, 'destroy'])->name('taller.destroy');

    # Estatus Laboral
    Route::get('/personal/{id}/estatus-laboral/nuevo-estatus', [DatosLaboralController::class, 'create'])->name('estatus-laboral.create');
    Route::post('/personal/{id}/estatus-laboral/guardar-estatus', [DatosLaboralController::class, 'store'])->name('estatus-laboral.store');
    Route::get('/personal/{id}/estatus-laboral/{estatus_id}/editar-estatus', [DatosLaboralController::class, 'edit'])->name('estatus-laboral.edit');
    Route::put('/personal/{id}/estatus-laboral/{estatus_id}/actualizar-estatus', [DatosLaboralController::class, 'update'])->name('estatus-laboral.update');

    # Experiencia Laboral
    Route::get('/personal/{id}/experiencia-laboral/nueva-experiencia', [HistorialLaboralController::class, 'create'])->name('experiencia-laboral.create');
    Route::post('/personal/{id}/experiencia-laboral/guardar-experiencia', [HistorialLaboralController::class, 'store'])->name('experiencia-laboral.store');
    Route::get('/personal/{id}/experiencia-laboral/{experiencia_id}/editar-experiencia', [HistorialLaboralController::class, 'edit'])->name('experiencia-laboral.edit');
    Route::put('/personal/{id}/experiencia-laboral/{experiencia_id}/actualizar-experiencia', [HistorialLaboralController::class, 'update'])->name('experiencia-laboral.update');
    Route::delete('/personal/{id}/experiencia-laboral/{experiencia_id}/eliminar-experiencia', [HistorialLaboralController::class, 'destroy'])->name('experiencia-laboral.destroy');

    # Actividades no Procesadas
    Route::get('/personal/{id}/actividades-no-procesadas', [ActividadesProcesadasController::class, 'index'])->name('reporte.index');
    Route::get('/personal/{id}/actividades-no-procesadas/nuevo-reporte', [ActividadesProcesadasController::class, 'create'])->name('reporte.create');
    Route::post('/personal/{id}/actividades-no-procesadas/guardar-reporte', [ActividadesProcesadasController::class, 'store'])->name('reporte.store');
    Route::get('/personal/{id}/actividades-no-procesadas/{reporte_id}/ver-reporte', [ActividadesProcesadasController::class, 'show'])->name('reporte.show');
    Route::get('/personal/{id}/actividades-no-procesadas/{reporte_id}/editar-reporte', [ActividadesProcesadasController::class, 'edit'])->name('reporte.edit');
    Route::put('/personal/{id}/actividades-no-procesadas/{reporte_id}/actualizar-reporte', [ActividadesProcesadasController::class, 'update'])->name('reporte.update');
    Route::get('/personal/{id}/get-nombre-municipios', [ActividadesProcesadasController::class, 'getNameMunicipio'])->name('reporte.getNameMunicipio');
    # Integridad Laboral Personal
    Route::get('/personal/{id}/integridad-laboral/nueva-prueba', [IntegridadLaboralController::class, 'create'])->name('prueba.create');
    Route::post('/personal/{id}/integridad-laboral/guardar-prueba', [IntegridadLaboralController::class, 'store'])->name('prueba.store');
    Route::get('/personal/{id}/integridad-laboral/{prueba_id}/ver-prueba', [IntegridadLaboralController::class, 'show'])->name('prueba.show');
    Route::get('/personal/{id}/integridad-laboral/{prueba_id}/editar-prueba', [IntegridadLaboralController::class, 'edit'])->name('prueba.edit');
    Route::put('/personal/{id}/integridad-laboral/{prueba_id}/actualizar-prueba', [IntegridadLaboralController::class, 'update'])->name('prueba.update');


    # Modulo Empresa
    Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresa.index');
    Route::get('/empresas/nueva-empresa', [EmpresaController::class, 'create'])->name('empresa.create');
    Route::post('/empresas/guardar-empresa', [EmpresaController::class, 'store'])->name('empresa.store');
    Route::get('/empresas/{id}/ver-empresa', [EmpresaController::class, 'show'])->name('empresa.show');
    Route::get('/empresas/{id}/editar-empresa', [EmpresaController::class, 'edit'])->name('empresa.edit');
    Route::put('/empresas/{id}/actualizar-empresa', [EmpresaController::class, 'update'])->name('empresa.update');
    Route::delete('/empresas/{id}/eliminar-empresa', [EmpresaController::class, 'destroy'])->name('empresa.destroy');

    # Modulo Roles
    Route::get('configuraciones/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('configuraciones/roles/nuevo-rol', [RolesController::class, 'create'])->name('roles.create');
    Route::post('configuraciones/roles/guardar-rol', [RolesController::class, 'store'])->name('roles.store');
    Route::get('configuraciones/roles/{id}/editar-rol', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('configuraciones/roles/{id}/actualizar-rol', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('configuraciones/roles/{id}/eliminar-rol', [RolesController::class, 'destroy'])->name('roles.destroy');

    # Modulo Usuarios
    Route::get('configuraciones/usuarios', [UsuariosController::class, 'index'])->name('usuarios.index');
    Route::get('configuraciones/usuarios/nuevo-usuario', [UsuariosController::class, 'create'])->name('usuarios.create');
    Route::post('configuraciones/usuarios/guardar-usuario', [UsuariosController::class, 'store'])->name('usuarios.store');
    Route::get('configuraciones/usuarios/{id}/ver-usuario', [UsuariosController::class, 'show'])->name('usuarios.show');
    Route::get('configuraciones/usuarios/{id}/editar-usuario', [UsuariosController::class, 'edit'])->name('usuarios.edit');
    Route::put('configuraciones/usuarios/{id}/actualizar-usuario', [UsuariosController::class, 'update'])->name('usuarios.update');
    Route::delete('configuraciones/usuarios/{id}/eliminar-usuario', [UsuariosController::class, 'destroy'])->name('usuarios.destroy');



});

require __DIR__.'/auth.php';
