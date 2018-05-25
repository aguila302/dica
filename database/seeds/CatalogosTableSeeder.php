<?php

use App\Autopista;
use App\Carril;
use App\Condicion;
use App\Cuerpo;
use Illuminate\Database\Seeder;

class CatalogosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->rolesUsuarios();
        $this->rolesUsuariosVisitante();
        $this->creaAutopistas();
        $this->creaElementos();
        $this->creaCarriles();
        $this->creaCondiciones();
        $this->creaCuerpos();

        factory(App\User::class, 6)->create();
    }

    public function rolesUsuarios()
    {
        $userAdmin = factory(App\User::class)->create([
            'name'     => 'Usuario administrador',
            'username' => 'useradmin',
            'email'    => 'admin@calymayor.com.mx',
            'password' => bcrypt('admin'),
        ]);

        $userAdmin->assignRole('admin');
    }

    public function rolesUsuariosVisitante()
    {
        $userAdmin = factory(App\User::class)->create([
            'name'     => 'Usuario visitante',
            'username' => 'uservisitante',
            'email'    => 'visitante@calymayor.com.mx',
            'password' => bcrypt('visitante'),
        ]);

        $userAdmin->assignRole('visitante');
    }

    public function creaAutopistas()
    {
        $autopistas = array('Durango - Yerbanís', 'Yerbanis - Gómez Palacios', 'Kantunil - Cancún con Ramal al Aeropuerto', 'Libramiento Matehuala', 'San Luis Potosí - Villa de Arriaga', 'San Luis Potosí - Río Verde', 'Viaducto Bicentenario', 'Km. 188 - Jiménez', 'Jiménez - Camargo', 'Camargo - Delicias', 'Chihuahua - Cuauhtémoc');

        foreach ($autopistas as &$autopista) {
            factory(App\Autopista::class)->create([
                'nombre' => $autopista,
            ]);
        }
    }

    public function creaElementos()
    {
        $elementos = array('Señalamiento horizontal', 'Señalamiento vertical', 'Señalamiento y dispositivos para protección en zonas de obras viales', 'Dispositivos de seguridad', 'Dispositivos diversos', 'Obras de drenaje y complementarias', 'Derecho de via', 'Pavimento asfáltico', 'Pavimento hidráulico', 'Estructuras', 'Taludes', 'Instalaciones generales', 'Servicios conexos ', 'instalaciones especiales', 'SRV (Sistema de Registro Vehicular)', 'ITS', 'Plaza de cobro', 'Túnel');

        foreach ($elementos as &$elemento) {
            factory(App\Elemento::class)->create([
                'descripcion' => $elemento,
            ]);
        }
    }

    public function creaCarriles()
    {
        $carriles = array('Derecho', 'Izquierdo', 'Central', 'Ambos');
        foreach ($carriles as &$carril) {
            factory(App\Carril::class)->create([
                'descripcion' => $carril,
            ]);
        }
    }

    public function creaCondiciones()
    {
        $condiciones = array('Buena', 'Regular', 'Mala');
        foreach ($condiciones as &$condicion) {
            factory(App\Condicion::class)->create([
                'descripcion' => $condicion,
            ]);
        }
    }

    public function creaCuerpos()
    {
        $cuerpos = array('A', 'B', 'Único', 'Ambos');
        foreach ($cuerpos as &$cuerpo) {
            factory(App\Cuerpo::class)->create([
                'descripcion' => $cuerpo,
            ]);
        }
    }
}
