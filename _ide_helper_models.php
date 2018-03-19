<?php
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App{
/**
 * App\Modalidad
 *
 * @property int $id
 * @property string $nombre
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modalidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modalidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modalidad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Modalidad whereUpdatedAt($value)
 */
	class Modalidad extends \Eloquent {}
}

namespace App{
/**
 * App\Expediente
 *
 * @property int $id
 * @property int $alumno_escuela_id
 * @property string|null $fecha_apertura
 * @property string|null $fecha_cierre
 * @property string|null $observaciones
 * @property int|null $totalHoras
 * @property int|null $totalMontos
 * @property int $estado_expediente_id
 * @property int|null $certificado
 * @property string|null $ingresadoPor
 * @property string|null $modificadoPor
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Alumno_escuela $alumno_escuela
 * @property-read \App\Estado_expediente $estado_expediente
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Expediente_servicio_social[] $serviciossociales
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereAlumnoEscuelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereCertificado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereEstadoExpedienteId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereFechaApertura($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereFechaCierre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereIngresadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereModificadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereTotalHoras($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereTotalMontos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente whereUpdatedAt($value)
 */
	class Expediente extends \Eloquent {}
}

namespace App{
/**
 * App\Departamento
 *
 * @property int $id
 * @property string $nombre
 * @property string $isocode
 * @property int $zonesv_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereIsocode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Departamento whereZonesvId($value)
 */
	class Departamento extends \Eloquent {}
}

namespace App{
/**
 * App\Estado
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ServicioSocial[] $estado_ss
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado whereUpdatedAt($value)
 */
	class Estado extends \Eloquent {}
}

namespace App{
/**
 * App\Expediente_servicio_social
 *
 * @property int $id
 * @property int $expediente_alumno_id
 * @property int $servicio_social_id
 * @property int $horas_ganadas
 * @property int $estado_ss_estudiante
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\ServicioSocial $ssexp
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereEstadoSsEstudiante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereExpedienteAlumnoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereHorasGanadas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereServicioSocialId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Expediente_servicio_social whereUpdatedAt($value)
 */
	class Expediente_servicio_social extends \Eloquent {}
}

namespace App{
/**
 * App\Municipio
 *
 * @property int $id
 * @property string $nombre
 * @property int $departamento_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ServicioSocial[] $municipio_ss
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Municipio whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Municipio whereDepartamentoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Municipio whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Municipio whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Municipio whereUpdatedAt($value)
 */
	class Municipio extends \Eloquent {}
}

namespace App{
/**
 * App\Alumno_escuela
 *
 * @property int $id
 * @property string $carnet
 * @property int $escuela_id
 * @property string|null $ingresadoPor
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Alumno $alumno
 * @property-read \App\Escuela $escuela
 * @property-read \App\Expediente $expediente
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereCarnet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereEscuelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereIngresadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno_escuela whereUpdatedAt($value)
 */
	class Alumno_escuela extends \Eloquent {}
}

namespace App{
/**
 * App\Beneficiario
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $dui
 * @property string|null $correo
 * @property string|null $telefono
 * @property string|null $organizacion
 * @property string|null $telefono_organizacion
 * @property string|null $correo_organizacion
 * @property string|null $direccion_organizacion
 * @property int $municipio_id
 * @property int $tipo_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ServicioSocial[] $beneficiario_ss
 * @property-read \App\Municipio $municipio
 * @property-read \App\Tipo_beneficiario $tipo
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereCorreoOrganizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereDireccionOrganizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereDui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereMunicipioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereOrganizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereTelefonoOrganizacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereTipoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Beneficiario whereUpdatedAt($value)
 */
	class Beneficiario extends \Eloquent {}
}

namespace App{
/**
 * App\Especialidad
 *
 * @property int $id
 * @property string $tipo
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad whereTipo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Especialidad whereUpdatedAt($value)
 */
	class Especialidad extends \Eloquent {}
}

namespace App{
/**
 * App\Tipo_beneficiario
 *
 */
	class Tipo_beneficiario extends \Eloquent {}
}

namespace App{
/**
 * App\ServicioSocial
 *
 * @property int $id
 * @property int $escuela_id
 * @property string $nombre
 * @property string|null $descripcion
 * @property int|null $tutor_id
 * @property int $beneficiario_id
 * @property int $municipio_id
 * @property string $fecha_ingreso
 * @property string|null $fecha_fin
 * @property float|null $monto
 * @property int|null $beneficiarios_directos
 * @property int|null $beneficiarios_indirectos
 * @property int $estado_id
 * @property int|null $horas_totales
 * @property int $numero_estudiantes
 * @property int $modalidad_id
 * @property string|null $ingresadoPor
 * @property string|null $modificadoPor
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Beneficiario $beneficiario
 * @property-read \App\Escuela $escuela
 * @property-read \App\Estado $estado
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Expediente_servicio_social[] $expediente_serviciosocials
 * @property-read \App\Municipio $municipio
 * @property-read \App\Tutor|null $tutor
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereBeneficiarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereBeneficiariosDirectos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereBeneficiariosIndirectos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereEscuelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereEstadoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereFechaIngreso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereHorasTotales($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereIngresadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereModalidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereModificadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereMunicipioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereNumeroEstudiantes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereTutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\ServicioSocial whereUpdatedAt($value)
 */
	class ServicioSocial extends \Eloquent {}
}

namespace App{
/**
 * App\rol
 *
 * @property int $id
 * @property string $nombre
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol whereUpdatedAt($value)
 */
	class rol extends \Eloquent {}
}

namespace App{
/**
 * App\Estado_expediente
 *
 * @property int $id
 * @property string $nombre
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Expediente $expediente
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado_expediente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado_expediente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado_expediente whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Estado_expediente whereUpdatedAt($value)
 */
	class Estado_expediente extends \Eloquent {}
}

namespace App{
/**
 * App\Alumno
 *
 * @property string $carnet
 * @property string $nombre
 * @property string $apellido
 * @property string|null $direccion
 * @property string|null $telefono
 * @property string|null $correo
 * @property string|null $lugar_trabajo
 * @property string|null $telefono_trabajo
 * @property string|null $ingresadoPor
 * @property string|null $modificadoPor
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Alumno_escuela[] $alumno_escuela
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereCarnet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereIngresadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereLugarTrabajo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereModificadoPor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereTelefono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereTelefonoTrabajo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Alumno whereUpdatedAt($value)
 */
	class Alumno extends \Eloquent {}
}

namespace App{
/**
 * App\Escuela
 *
 * @property int $id
 * @property string $codigo
 * @property string $nombre
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escuela whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escuela whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escuela whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escuela whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Escuela whereUpdatedAt($value)
 */
	class Escuela extends \Eloquent {}
}

namespace App{
/**
 * App\rol_user
 *
 * @property int $id
 * @property int $rol_id
 * @property int $user_id
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol_user whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol_user whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol_user whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol_user whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\rol_user whereUserId($value)
 */
	class rol_user extends \Eloquent {}
}

namespace App{
/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $apellido
 * @property string $email
 * @property string $username
 * @property string $password
 * @property int|null $escuela_id
 * @property \App\rol $rol_id
 * @property string|null $remember_token
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \App\Escuela|null $escuela
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read \App\rol $rol
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEscuelaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUsername($value)
 */
	class User extends \Eloquent {}
}

namespace App{
/**
 * App\Tutor
 *
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property int|null $especialidad_id
 * @property string|null $carnet
 * @property string $dui
 * @property string $correo
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\ServicioSocial[] $tutor_ss
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereCarnet($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereDui($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereEspecialidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Tutor whereUpdatedAt($value)
 */
	class Tutor extends \Eloquent {}
}

