<?php
/**
 * Description of DaoOperaciones
 *
 * @author José Martínez Pradas
 */
include "ConexionBD.php";
include_once "../Modelo/Estanteria.php";
include_once "../Modelo/Pasillo.php";
include_once "../Modelo/Caja.php";
include "../Modelo/ExcepcionInsertarCaja.php";

class DaoOperaciones {

//put your code here

    public function añadirEstanteria($_estanteria) {

        global $conexion;

        /* recojo los datos del objeto estanteria que es pasado al método
         * para guardarlo en las varibles para poder montar la orden sql para
         * añadir dichos datos a la BD
         */
        $codigo = $_estanteria->getCodigo();
        $numLejas = $_estanteria->getNumLejas();
        $idPasillo = $_estanteria->getPasillo();
        $numero = $_estanteria->getNumero();

        $todo_bien = true;
        $conexion->autocommit(false);
        $sql = "INSERT INTO estanteria VALUES(null, '$codigo', $numLejas, '$idPasillo', $numero,0)";
        $conexion->query($sql);

        if ($conexion->affected_rows > 0) {
            $todo_bien = true;
        } else {
            $todo_bien = false;
            return $idMensaje = $conexion->errno . $conexion->error;
        }

        $sql = "UPDATE pasillo SET huecosOcupados=huecosOcupados+1 WHERE id='$idPasillo'";
        $conexion->query($sql);
        if ($conexion->affected_rows == 1) {
            $todo_bien = true;
        } else {
            $todo_bien = false;
            return $mensaje = "ERROR";
        }

        if ($todo_bien == true) {
            $conexion->commit();
            return $mensaje = "TRANSACCIÓN CORRECTA";
        } else {
            $conexion->rollback();
            return $mensaje = "ERROR EN LA TRANSACCIÓN";
        }
    }

    public function listarEstanterias() {

        global $conexion;

        $sql = "SELECT e.codigoEstanteria,e.numLejas,e.numero,e.numLejasOcupadas, p.pasillo FROM estanteria as e,pasillo as p WHERE e.idPasillo=p.id";
        $resultado = $conexion->query($sql);

        if ($conexion->affected_rows > 0) {
            $ArrayEstanterias = $resultado->fetch_object();
            $objetos = array();

            while ($ArrayEstanterias) {
            //Creo el array $objetos para guardar en él los objetos creados
                $objetos[] = $ArrayEstanterias;
                $ArrayEstanterias = $resultado->fetch_object();
            }
        }
        return $objetos;
    }

    public function sacarEstanteriasLibres() {

        global $conexion;

        $sql = "SELECT e.id,e.codigoEstanteria,e.numLejas,e.numero,e.numLejasOcupadas,p.pasillo FROM estanteria as e, pasillo as p WHERE e.numLejasOcupadas<e.numlejas AND e.idPasillo=p.id";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $objetos = array();
            $ArrayEstLibres = $resultado->fetch_object();
            while ($ArrayEstLibres) {
                $objetos[] = $ArrayEstLibres;
                $ArrayEstLibres = $resultado->fetch_object();
            }
        }
        return $objetos;
    }

    public function crearArraylejas($_idEstanteria) {

        global $conexion;
        //seleccionamos el numero de lejas TOTALES de la estantería seleccionada
        $lejas = array();

        $sql = "SELECT numLejas FROM estanteria WHERE id='$_idEstanteria'";
        $resultado = $conexion->query($sql);

        if ($resultado > 0) {
        //creamos un vector vacío de lejas
            $fila = $resultado->fetch_array();
        //introducimos cada leja en el nuevo vector y devolvemos el vector
            for ($i = 1; $i < $fila['numLejas'] + 1; $i++) {
                array_push($lejas, $i);
            }
        }

        //seleccionamos el numero de lejas que contienen una caja en la estanteria seleccionada
        $sql = "SELECT numLeja FROM ocupacion WHERE idEstanteria='$_idEstanteria'";
        $resultado = $conexion->query($sql);

        if ($resultado > 0) {
            ?>

            <option value="">Elige leja</option>

            <?php
            $fila = $resultado->fetch_array();
            //creamos array de lejas ocupadas
            $lejasocupadas = array();

            while ($fila) {
                array_push($lejasocupadas, $fila['numLeja']);
                $fila = $resultado->fetch_array();
            }

            //comprobamos si cada leja de las totales se corresponde con las ocupadas, si es así se imprime en el select
            for ($i = 0; $i < count($lejas); $i++) {
                if (!in_array($lejas[$i], $lejasocupadas)) {
                    ?> 
                    <option value="<?php echo $lejas[$i] ?>"><?php echo $lejas[$i] ?></option>
                    <?php
                }
            }
        }
    }

    public function sacarPasillosLibres() {

        global $conexion;

        /* Creamos la consulta para poder sacar que pasillos tienen al menos
         * un hueco disponible, para ello apuntamos hacia los huecos ocupados y 
         * los hueco vacios.
         */
        $sql = "SELECT * FROM pasillo WHERE huecosOcupados<huecosDisponibles";
        $resultado = $conexion->query($sql);

        if ($resultado->num_rows > 0) {
            $objetos = array();
            $ArrayPasillos = $resultado->fetch_assoc();

            while ($ArrayPasillos) {
                $id = $ArrayPasillos['id'];
                $pasillo = $ArrayPasillos['pasillo'];
                //$numero = $ArrayPasillos['numero'];
                $huecosDisponibles = $ArrayPasillos['huecosDisponibles'];
                $huecosOcupados = $ArrayPasillos['huecosOcupados'];

                /* Con los datos sacados de la BD creamos un objeto que usaremos
                 * para enviarlo al select de la vista para que muestre los
                 * pasillos que contienen al menos un hueco libre
                 */
                $objPasillo = new Pasillo($id, $pasillo, $huecosDisponibles, $huecosOcupados);
                $objetos[] = $objPasillo;
                $ArrayPasillos = $resultado->fetch_assoc();
            }
        }
        return $objetos;
    }

    public function crearArrayLugares($_idPasillo) {

        global $conexion;
//seleccionamos el numero de huecos DISPONIBLES en el pasillo seleccionado
        $huecosLibres = array();
//creamos un vector vacío de huecos vacios dentro del pasillo

        $sql = "SELECT huecosDisponibles FROM pasillo WHERE id='$_idPasillo'";
        $resultado = $conexion->query($sql);
        if ($resultado > 0) {

            $fila = $resultado->fetch_array();
//introducimos cada hueco en el nuevo vector y devolvemos el vector
            for ($i = 1; $i < $fila['huecosDisponibles'] + 1; $i++) {
                array_push($huecosLibres, $i);
            }
        }

        /* seleccionamos los números del hueco donde están montadas las estanterias
         * del pasillo seleccionado.
         */
        $sql = "SELECT numero FROM estanteria WHERE idPasillo='$_idPasillo'";
        $resultado = $conexion->query($sql);
        if ($resultado > 0) {
            ?>

            <option value="">Elige lugar</option>
            <?php
            $fila = $resultado->fetch_array();
            $numerosocupadas = array();
            //creamos array de huecos ocupados por una estantería

            while ($fila) {
                array_push($numerosocupadas, $fila['numero']);
                $fila = $resultado->fetch_array();
            }
            //comprobamos si cada hueco vacio coincide con los huecos ocupados, si no es así se imprime en el select

            for ($i = 0; $i < count($huecosLibres); $i++) {
                if (!in_array($huecosLibres[$i], $numerosocupadas)) {
                    ?> 

                    <option value="<?php echo $huecosLibres[$i] ?>"><?php echo $huecosLibres[$i] ?></option>

                    <?php
                }
            }
        }
    }

    public function insertarCaja($_caja, $_ocupacion) {

        global $conexion;

        $codigo = $_caja->getCodigo();
        $contenido = $_caja->getContenido();
        $alto = $_caja->getAlto();
        $ancho = $_caja->getAncho();
        $profundidad = $_caja->getProfundidad();
        $material = $_caja->getMaterial();
        $color = $_caja->getColor();

        $idEstanteria = $_ocupacion->getIdEstanteria();
        $numLejas = $_ocupacion->getNumLeja();


        $sql = "INSERT INTO caja VALUES(null,'$codigo','$contenido',$alto,$ancho,$profundidad,'$material','$color')";
        $resultado = $conexion->query($sql);
        if ($conexion->affected_rows > 0) {
            $mensaje = ($conexion->affected_rows);
            //return $mensaje;
        } else {
            $message = $conexion->error;
            $code = $conexion->errno;
            throw new ExcepcionInsertarCaja($message, $code, "INSERT CAJA");
            //return $mensaje = "Error a la hora de insertar";
        }

        //$id = 80;

        $id = $conexion->insert_id;

        $sql = "INSERT INTO ocupacion VALUES(null,$id,$idEstanteria,$numLejas)";
        $resultado = $conexion->query($sql);
        if ($conexion->affected_rows > 0) {
            $mensaje = ($conexion->affected_rows);
            $todo_bien = true;
            //return $mensaje;
        } else {
            $message = $conexion->error;
            $code = $conexion->errno;
            throw new ExcepcionInsertarCaja($message, $code, "INSERT OCUPACION");
            //return $mensaje = "Error a la hora de insertar";
        }

        $sql = "UPDATE estanteria SET numLejasOcupadas=numLejasOcupadas+1 WHERE id='$idEstanteria'";
        $resultado = $conexion->query($sql);
        if ($conexion->affected_rows > 0) {
            $todo_bien = true;
        } else {
            $message = $conexion->error;
            $code = $conexion->errno;
            throw new ExcepcionInsertarCaja($message, $code, "UPDATE ESTANTERIA");
        }

        /* if ($todo_bien == true) {
          $conexion->commit();
          return $mensaje = "TRANSACCIÓN CORRECTA";
          } else {
          $conexion->rollback();
          return $mensaje = "ERROR EN LA TRANSACCIÓN";
          } */
    }

    public function listarCajas() {

        global $conexion;

        $sql = "SELECT * FROM caja";
        $resultado = $conexion->query($sql);
        if ($conexion->affected_rows > 0) {
            $objetos = array();
            $ArrayCajas = $resultado->fetch_assoc();

            while ($ArrayCajas) {
                $codigo = $ArrayCajas['codigoCaja'];
                $contenido = $ArrayCajas['contenido'];
                $alto = $ArrayCajas['alto'];
                $ancho = $ArrayCajas['ancho'];
                $profundidad = $ArrayCajas['profundidad'];
                $material = $ArrayCajas['material'];
                $color = $ArrayCajas['color'];

                $caja = new Caja($codigo, $contenido, $alto, $ancho, $profundidad, $material, $color);
                $objetos[] = $caja;
                $ArrayCajas = $resultado->fetch_assoc();
            }
        }
        return $objetos;
    }

    public function inventario() {

        global $conexion;

        $orden = "SELECT e.codigoEstanteria,p.pasillo,e.numero,o.numLeja,c.codigoCaja,c.alto,c.ancho,c.profundidad,c.color,c.material,c.contenido FROM caja as c,estanteria as e,pasillo as p,ocupacion as o WHERE e.idPasillo=p.id AND c.id=o.idCaja AND e.id=o.idEstanteria ORDER BY p.pasillo,e.numero";
        $resultado = $conexion->query($orden);

        if ($resultado->num_rows > 0) {
            $objetos = array();
            $ArrayEstLibres = $resultado->fetch_object();

            while ($ArrayEstLibres) {
                $objetos[] = $ArrayEstLibres;
                $ArrayEstLibres = $resultado->fetch_object();
            }
        }
        return $objetos;
    }

    public function venderCaja($_codigoCaja){
        
        global $conexion;
        
        $orden = "DELETE * FROM caja WHERE codigoCaja='".$_codigoCaja."'";
        $resultado = $conexion->query($orden);
    }
}
