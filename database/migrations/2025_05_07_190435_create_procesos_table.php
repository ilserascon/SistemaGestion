<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB; // Importar DB para insertar datos

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('procesos', function (Blueprint $table) {
            $table->id();
            $table->boolean('validado')->default(0); // Booleano con valor predeterminado
            $table->string('actividad')->nullable(); // Permitir nulos si no siempre se llena
            $table->string('responsable')->nullable(); // Permitir nulos
            $table->text('desarrollo')->nullable(); // Cambiado a text para contenido más largo
            $table->date('fecha_entregable')->nullable(); // Permitir nulos
            $table->date('fecha_finalizado')->nullable(); // Permitir nulos
            $table->string('tipo')->nullable(); // Permitir nulos
            $table->string('liga')->nullable(); // Permitir nulos
            $table->text('mensaje')->nullable(); // Permitir nulos
            $table->timestamps(); // Timestamps para created_at y updated_at
        });

        // Insertar datos predeterminados
        DB::table('procesos')->insert([
            [
                'validado' => 0,
                'actividad' => 'Autorización de servicio de gestión',
                'responsable' => 'Comercial',
                'desarrollo' => 'El cliente confirma de autorización del proyecto. Una vez autorizado continuar con las siguientes instrucciones:',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'WhatsApp',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Creación de carpeta de Gestión en Drive',
                'responsable' => 'Coordinador',
                'desarrollo' => 'Crear la carpeta de gestión y compartirla con el cliente',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Notificación de nuevo cliente',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Se envía al grupo de WhatsApp de gestión la notificación del nuevo cliente.',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'Asunto: Integración de un nuevo cliente

                Fecha: 16 Mayo 2024

                Estimado equipo,

                Es un placer informarles que hemos completado con éxito la integración de un nuevo cliente a nuestra cartera. Queremos compartir esta emocionante noticia con todos ustedes, ya que este logro es el resultado del arduo trabajo y dedicación de cada miembro del equipo, a continuación compartimos la información general del cliente:

                Nombre comercial: DiazLab
                Giro: Laboratorio

                A medida que avanzamos, es importante mantenernos enfocados en brindar el mejor servicio posible al nuevo cliente. Esto significa estar atentos a sus requerimientos, responder rápidamente a sus consultas y asegurarnos de cumplir o superar todas sus expectativas.

                Si tienen alguna pregunta o inquietud relacionada con este nuevo proyecto o cualquier otro asunto relacionado, no duden en comunicarse conmigo o con los miembros pertinentes del equipo.

                Felicitaciones nuevamente por este logro

                Atentamente 
                Área Comercial',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Crear carpeta de Canva (Logo de Whatsapp, Resumen Empresarial, cumpliendo objetivos)',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Crear carpeta de canva en el cual se crearan los proyectos de canva',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Crear agenda Google',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Crear agenda de Google Calendar',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Crear logotipo de grupo de Gestion',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Se solicita al cliente agendar una visita para realizar el diagnostico inicial de gestión.',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'Mensaje Automatico',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Crear grupo de WhatsApp',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Crear grupo de WhatsApp. Agregar a los usuarios',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Agregar logotipo al grupo de WhatsApp',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Agregar el logotipo de la empresa al grupo de WhatsApp',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Agregar Intructivo de uso del grupo de WhatsAp',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Agregar instructivo de uso de WhatsApp',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'Para asegurar una comunicación fluida y respetuosa, hemos establecido algunas reglas e instrucciones que les pedimos seguir:

                Respeto y cordialidad: Tratemos a todos con respeto. 

                Relevancia de los mensajes:  Mantengamos las conversaciones relacionadas con el propósito del grupo.

                Spam y promociones: 
                No está permitido el envío de spam, cadenas de mensajes o promociones personales sin autorización previa.

                Lenguaje apropiado: Utilicemos un lenguaje claro y apropiado para todos.

                Responder en privado: 
                Si un tema solo concierne a una persona, o se consideran temas delicados por favor, envíenle un mensaje privado en lugar de responder en el grupo.


                Si tienen alguna pregunta o sugerencia sobre estas reglas, no duden en comunicarse conmigo directamente.

                ¡Gracias por su cooperación y participación activa en el grupo! 
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Mensaje Bienvenida WhatsApp',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Enviar imagen de bienvenida al grupo de WhatApp y presentación del equipo de trabajo',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '¡Bienvenido a nuestra comunidad de Gestión Empresarial!

                Estamos encantados de tenerte como nuevo cliente y estamos aquí para ayudarte en todo lo que necesites. Nuestro equipo estará encantado de brindarte el mejor servicio posible. ¡Gracias por elegirnos y esperamos poder ofrecerte una experiencia excepcional!

                En la descripción de este grupo podrás encontrar las reglas de Uso de este grupo.

                En Azka Gestión y Desarrollo estamos comprometidos con el cambio.

                En breve estamos en contacto por este medio para continuar con el proceso de Gestión.
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Definir dia de gestión',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Enviar video de medios de uso de Whatsapp al grupo de Gestión',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'Hola!  Me puedes ayudar con los siguiente 

                Es necesario agendar el día y hora fijo de la sesión de gestión, te recuerdo que la sesión es de dos horas, lo cual les recomendamos estar disponibles y enfocados para sacar el máximo provecho. Te comparto los horarios disponibles:

                - Lunes de 8:00 am a 10:00 am 
                - Martes de 8:00 am a 10:00 am 
                - Miércoles de 8:00 am a 10:00 am 

                Favor de seleccionar el horario que se adapte a sus actividades, o si tienes alguna sugerencia estamos coméntanos. 
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Agendar la primera reunion (Diagnostico, Resumen empresarial, cumpliendo Objetivos)',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => '',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => 'Buenas tardes, sabemos lo importante de la comunicación e integración entre los equipos, queremos iniciar con el pie derecho este proyecto para esto será importarte presentarnos con tu equipo de trabajo y que nos conozcan con el fin de que se involucren en este nuevo proceso de cambio.

                La siguiente actividad consiste en programar una reunión grupal es necesario contar con la presencia de los lideres o responsables de áreas. 

                Sera una reunión de máximo 1 hora min en la cual se presentaran los siguiente temas: 

                Ejercicio del diagrama de flujo de la operación completa de la empresa

                La agenda programada es para el día Martes 02 de Julio del año en curso 11:30 am, Favor de confirmar la fecha de agenda o fecha sugerida según su calendario de actividades.
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Agendar diagnsotico de gestión con el cliente',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Contactar al cliente y agendar fecha para el diagnostico de Gestión. Una vez programada la agenda con el cliente se debera agregar la agenda en Google calendar',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '¡Hola!  

                ¡Muchas gracias! Por la confianza. Iniciaremos con la etapa de alta de clientes, para esto será necesario confirmar agenda para Diagnostico esto con el fin de conocer su proceso y el estatus de la información de tu empresa. El día martes 16 de abril a las 9:00 am

                En caso de no contar con disponibilidad para la fecha del diagnóstico favor de comentarnos por este medio la fecha de disponibilidad. 
                El diagnostico será de manera presencial 

                Quedamos en espera de su respuesta ¡Gracias!
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Recordatorio de diagnostico',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Enviar recordatorio al cliente de la agenda del diagnistico con un dia de anticipación',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Abrir plan de trabajo y adecuar al cliente',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Seguir instrucciones de minuta',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Presencial',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Solicitud de alta de cliente (Cliente)',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Revisar cada uno de los puntos del documentos de información solicitada y enviar liga al cliente para actualización y solicitud de información',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '¡Hola! Estamos muy emocionados de iniciar con el proceso de alta como cliente de Gestión, es importante que nos compartas la siguiente información al correo asesorazkagestion@gmail.com o por este medio si te resulta confiable y mas sencillo: 

                Base de datos de empleados 

                También es muy importante contar con la información general de tu empresa ayúdanos a llenar el siguiente formulario, da clic en el siguiente enlace:

                https://forms.gle/2DA4ZMiJ7TYkLxS2A

                Una vez terminada esta actividad responde esta actividad con la frase "listo actividad terminada". 

                Terminada la actividad en breve continuaremos con las siguientes instrucciones. 

                Si tienes alguna duda, estamos en contacto por este medio. 
                ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Seguimiento Formulario alta de cliente',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'Solicita al cliente responder el formulario para el alta por medio del correo electrinico y WhatsApp',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Solicitud de alta del cliente a administración',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => '',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Escritorio',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'validado' => 0,
                'actividad' => 'Inicio de etapa conociendo al equipo',
                'responsable' => 'Asesor de Gestión',
                'desarrollo' => 'En la visita de diagnostico se deberan cumplir con cada una de las actividades especificadas en la minuta.',
                'fecha_entregable' => null,
                'fecha_finalizado' => null,
                'tipo' => 'Presencial',
                'liga' => '',
                'mensaje' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('procesos');
    }
};
