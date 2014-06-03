<?php
$idcat = 0;
if (isset($_GET['cat'])) {
    $idcat = $_GET['cat'];
    //echo 'categoria: '.$idcat;
    $condition = "categoria ='{$idcat}'";
    switch ($idcat) {
        case 'noticias':
            $title = 'Noticias';
            break;
        case 'programaEducacion':
            $title = 'Programa de Educación Financiera';
            break;
        case 'glosario':
            $title = 'Glosario de Términos';
            break;
        case 'preguntasFrecuentes':
            $title = 'Preguntas Frecuentes';
            break;
        case 'gobiernoCorporativo':
            $title = 'Gobierno Corporativo';
            break;
        case 'lavadoActivos':
            $title = 'Lavado de Activos';
            break;

        default:
            break;
    }
}

$idSubCat = 0;
if (isset($_GET['subcat'])) {
    $idcat = $_GET['subcat'];
    //echo 'categoria: '.$idcat;
    $condition = "subcategoria ='{$idcat}'";
    switch ($idcat) {
        case 'informacionFinanciera':
            $title = 'Información Financiera';
            break;
        case 'indicadoresServicioCliente':
            $title = 'Indicadores de Servicio al Cliente';
            break;
        case 'informacionAccionistas':
            $title = 'Información de Accionistas';
            break;
        case 'manualPrevencion':
            $title = 'Manual de Prevención';
            break;
        case 'formularioPersonaNatural':
            $title = 'Persona Natural';
            break;
        case 'formularioPersonaJuridica':
            $title = 'Persona Jurídica';
            break;
        default:
            break;
    }
}
$criteria = new CDbCriteria(array('condition' => $condition,));

$informacion = Pdf::model()->findAll($criteria);
$word = Word::model()->findAll($criteria);

$this->pageTitle = Yii::app()->name . ' - ' . $title;

$count = 0;

$this->widget('zii.widgets.CBreadcrumbs', array(
    'links' => array(
        'Información',
        $title,
    ),
    'homeLink' => CHtml::link('Inicio', Yii::app()->homeUrl),
));
?>

<div class="row">
    <div class="span8" id="cont-hogar">
        <!--            <div class="home-icon">
                        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/icon_empresarial.png"/> 
                    </div>-->
        <?php if ($idcat == 'programaEducacion'): ?>
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/noticias/cultura_financiera.jpg"/> 
        <?php endif; ?>
        <div class="hogar-title">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="clear"></div>
        <p>
            <?php
//echo $servicios['desc_min'];         
            ?>
        </p>
        <div>

            <?php
            if ($idcat == 'noticias' || $idcat == 'programaEducacion' || $idcat == 'preguntasFrecuentes'):
                foreach ($informacion as $info) {
                    echo $info['descripcion'];
                }
            endif;
            ?>
            <?php if ($idcat == 'indicadoresServicioCliente'): ?>
                <p>Cumpliendo con la Ley de Transparencia estipulada por la Superintendencia de Bancos y Seguros, compartimos la siguiente información:</p>
                <br><br>
            <?php endif; ?>
            <?php if ($idcat == 'lavadoActivos'): ?>
                <p>Cumpliendo con las disposiciones emitidas por la Ley de Prevención, Detección y Erradicación del Delito de Lavado de Activos y del Financiamiento de Delitos, Las Resoluciones 
                    de la  Superintendencia de Bancos y Seguros y la Unidad de Análisis Financiero.</p>
                <br>
            <?php endif; ?>
            <?php if ($idcat == 'glosario'): ?>
                <ul class="nav nav-pills">
                    <li ><a href="#a">A</a></li>
                    <li ><a href="#b">B</a></li>
                    <li ><a href="#c">C</a></li>
                    <li ><a href="#d">D</a></li>
                    <li ><a href="#e">E</a></li>
                    <li ><a href="#f">F</a></li>
                    <li ><a href="#g">G</a></li>
                    <li ><a href="#h">H</a></li>
                    <li ><a href="#i">I</a></li>
                    <li ><a href="#j">L</a></li>
                    <li ><a href="#m">M</a></li>
                    <li ><a href="#n">N</a></li>
                    <li ><a href="#o">O</a></li>
                    <li ><a href="#p">P</a></li>
                    <li ><a href="#r">R</a></li>
                    <li ><a href="#s">S</a></li>
                    <li ><a href="#t">T</a></li>
                    <li ><a href="#u">U</a></li>
                    <li ><a href="#v">V</a></li>
                </ul>
                <strong id="a">Accidente:</strong><p> Es el  acontecimiento inesperado, repentino e involuntario que pueda ser causa de  daños a las personas o a las cosas independientemente de su voluntad.</p>
                <strong>Actuario:</strong><p> Es el  titulado académico profesional cuya función es la de resolver las cuestiones de  índole financiera, técnica, matemática y estadística de las empresas de seguro.</p>
                <strong>Afianzado:</strong><p> Persona  natural o jurídica (contratista) por cuenta de quien se otorga las garantías.</p>
                <strong>Agencia:</strong><p> Oficina  donde se realizan las funciones de contratación de la producción de seguros.  También puede ejercer otras funciones, tales como la emisión de pólizas y  liquidación de los siniestros.</p>
                <strong>Agente:</strong><p> En  España es la persona física o jurídica que, estando vinculada a una entidad  aseguradora mediante un contrato de agencia de seguros, se dedica a la mediación  o producción de seguros y a la conservación de la cartera conseguida, mediante  las gestiones comerciales y administrativas precisas para la obtención de los  contratos de seguro que la integran y su mantenimiento en vigor. Ningún agente  podrá estar simultáneamente vinculado por contrato de agencia de seguros con  más de una entidad aseguradora a menos que sea autorizado por ella en el  contrato de agencia o por escrito por posterioridad a su celebración.</p>
                <strong>Agravación del Riesgo:</strong><p> Es la alteración, posterior a la celebración del contrato, en la  potencialidad de un riesgo. El tomador del seguro o el asegurado deberán,  durante el curso del contrato, comunicar al Asegurador todas las circunstancias  que agraven el riesgo.</p>
                <strong>Ajustador:</strong><p> Persona  natural o jurídica, independiente a la compañía de seguros y al asegurado con  credencial otorgada por la Superintendencia de Bancos, encargada de determinar  la causa del siniestro, si existe o no cobertura de la póliza para determinado  evento; determinar la cuantía de la pérdida y realizar el ajuste del siniestro  para que la aseguradora liquide el reclamo, sí este está determinado como  amparado.</p>
                <strong>Anualidad:</strong><p> Es el  período de doce meses por el que se contratan, normalmente, las pólizas de  seguro. Se denomina prorrogable cuando tácitamente se renueven los contratos de  seguro al término de la primera anualidad.</p>
                <strong>Año en curso:</strong><p> El año  calendario o ejercicio financiero considerado.</p>
                <strong>Aplicación:</strong><p> Es un  certificado de seguro de la póliza de transporte importaciones, en aplicación a  una póliza maestra que se emite por cada o para cada una de las importaciones  que se realice.</p>
                <strong>Arbitraje:</strong><p> Es el  sistema mediante el cual en aquellas pólizas en la que existe disparidad en la  valorización del siniestro, se acude a peritos imparciales para determinar el  valor de los daños, y cuya decisión suele ser vinculante con las partes;  determinación por peritos imparciales del valor de los bienes o de la extensión  del daño. Es la fórmula prevista normalmente en las pólizas de seguro para  resolver las diferencias entre el asegurador y el asegurado respecto a la  valoración de un siniestro.</p>
                <strong>Asegurable:</strong><p> Persona  o bien que reúne las características predeterminadas para poder ser objeto de  la cobertura del seguro.</p>
                <strong>Asegurado:</strong><p> Es la  persona natural o jurídica que traslada a título oneroso, uno o más riesgos a la  compañía de seguros. Es el titular del interés asegurado. Es la persona sobre  la que recae la cobertura del riesgo.</p>
                <strong>Asegurador:</strong><p> Es la  empresa que asume la cobertura del riesgo, previamente autorizada a operar como  tal por la Superintendencia de Bancos y Seguros, Es la persona jurídica  debidamente aprobada por la Superintendencia de Bancos, técnica y  financieramente estructurada para asumir riesgos a cambio de una prima. Es  sinónimo de empresa de seguros o entidad dedicada a la cobertura del riesgo.</p>
                <strong>Asegurado en Fianzas:</strong><p> persona natural o jurídica a quien se asegura de que su contratista  cumpla con el contrato y de buen uso al anticipo recibido,</p>
                <strong>Auditoria -</strong><p> Es el  sistema de inspección de las cuentas, situaciones, estados, balances y  procedimientos operativos de la empresa de seguros, con el fin de comprobar si  su situación económico-financiera real es coincidente con sus datos contables.</p>
                <strong>Autoseguro:</strong><p> Ocurre  cuando la persona física o jurídica, soporta con su patrimonio las  consecuencias económicas' derivadas de sus propios riesgos, sin intervención de  ninguna entidad aseguradora, pero afectando específicamente una masa  patrimonial cuya constitución obedece a ciertos principios técnico-financieros.</p>
                <strong>Avería:</strong><p> Es el  defecto tangible de un riesgo sobre un bien.</p>
                <strong>Avería Gruesa:</strong><p> Es el  daño producido intencionalmente en un buque o en las mercancías que transporta  para evitar otros daños mayores en el propio buque o en su carga. Su cuantía se  distribuye proporcionalmente entre las partes beneficiadas de esa conducta  intencionada (dueño del buque, propietario de las mercancías, asegurador,  fletador, etc.).</p>
                <strong>Avería General:</strong><p> Es una pérdida parcial que nace de los intereses de una aventura en  proporción de su valorización. Las pérdidas y daños son en principio idénticos,  se deban o no a una cosa asegurable. Esto último si es muy importante para  determinar si un siniestro está cubierto o no por el asegurador, puesto que  éste no responde sino por aquellos cuya causa haya sido un peligro cubierto por  el seguro Pero tanto el reconocimiento como la limitación de los siniestros a  reconocer dependen de la cobertura. </p>
                <strong>Avería Particular:</strong><p> Es una pérdida parcial producida accidentalmente en un buque o en su  carga. Su cuantía, al contrario de lo que ocurre en la avería gruesa, sólo  afecta al propietario (o asegurador) de los bienes dañados.</p>
                <a href="#" class="scrollup">Scroll</a>
                <strong id="b">Beneficiario:</strong><p> Persona  natural o jurídica, que ha de percibir en caso de siniestro el pago del seguro.  Una sola persona natural o jurídica puede ser al mismo tiempo, beneficiario,  solicitante y asegurado. Persona a cuyo favor se toma el seguro. Técnicamente  se denomina así a la persona que ostenta el derecho a percibir la prestación indemnización  del Asegurador, es la persona designada en la póliza por el asegurado o  contratante como receptor de las prestaciones o indemnizaciones contratadas.</p>
                <strong>Broker o Agente Corredor de Seguros:</strong><p> Persona natural o jurídica con credencial otorgada por la  Superintendencia de Bancos que tiene a su cargo y bajo su responsabilidad, el  asesor al Asegurado en la contratación de pólizas de seguros, en el trámite de  siniestros y el mantenimiento de las pólizas. Es el intermediario entre el  Asegurado y la Aseguradora.</p>
                <strong>Bruto:</strong><p> Cifras  resultantes de los libros del asegurador directo, sin tener en cuenta sus sesiones  en reaseguro y recuperaciones.</p>
                <strong>Buena Fe:</strong><p> Forma  parte de las caracteres y principios básicos del Contrato de Seguro, obliga a  las partes a actuar entre sí con la máxima honestidad, no interpretando arbitrariamente  el sentido recto de los términos recogidos en su acuerdo, ni limitando o  exagerando los efectos que naturalmente se derivarían del modo en que los  contratantes hayan expresado su voluntad y contrario sus obligaciones. Le buena  fe tiene una especialísima importancia en el Contrato de Seguro.</p>
                <strong id="c">Cálculo de Probabilidades</strong><p>: Es la técnico que, por media de estudios estadísticos, permite  determinar, con relativa exactitud, el grado de probabilidad de que se produzca  un siniestro entre un gran número de riesgos.</p>
                <strong>Capital:</strong><p> En  lenguaje empresarial, se de este nombre al conjunto de dinero y otras activos  que necesita una sociedad para operar y llevar a cabo sus actividades de producción  y distribución de sus productos y/o servicios.</p>
                <strong>Capital Asegurado:</strong><p> Corresponde al valor atribuido por el titular de un contrato de seguro  a los bienes cubiertos par la póliza y cuyo importe es la cantidad máxima que  el asegurador está obligado a pagar, en caso de siniestro. Se llama así al máximo  pagadero en caso de siniestro, valor previamente estipulado en las condiciones  de la póliza.</p>
                <strong>Caratula de Póliza: </strong><p>Documento en el que se asientan los dates del bien o persona asegurada y  se enumeran las Coberturas del Contrato de Seguro.</p>
                <strong>Carga de siniestros:</strong><p> Costo total de siniestros de un determinado periodo, comprendido los  siniestros pagados, mas la Reserve Siniestros del arle en curse, menos una  eventual Reserve Siniestros del período precedente,</p>
                <strong>Cartera:</strong><p> Póliza  de seguro que se encuentra en un determinado momento.</p>
                <strong>Causa Próxima:</strong><p> Es la  causa o nexo directo que incide en un daño; par ejemplo en el caso de un buque  quo transporta vidrio, de repente se detiene bruscamente y se rompen los vidrios,  en este caso la causa próxima es la parada del buque.</p>
                <strong>Certificado de cobertura: </strong><p>Constancia provisoria de cobertura emitida per el asegurador.</p>
                <strong>Cláusula:</strong><p> Es  aquella quo permite aclarar conceptos de las condiciones generales de la póliza,  este no tiene costo, son parte de las condiciones especiales de una póliza.</p>
                <strong>Coaseguro:</strong><p> Es una  forma de dispersar el riesgo, presentándose tres alternativas: coaseguro  accidental, convenio de coaseguro y coaseguro pactado: Es el seguro de un mismo  riesgo pero de dos a más empresas aseguradoras.</p>
                <strong>Cobertura o Amparo Básico:</strong><p> Son Las coberturas a amperes que brinda una póliza encaso de suceder  un siniestro; se listan en la póliza los riesgos nombrados coma causa de  posibles pérdidas. Es igual a garantía.</p>
                <strong>Cobertura Adicional o Amparo Adicional:</strong><p> Es aquella clausula que amplía el alcance del seguro, por lo tanto  tiene un costo adicional, normalmente contratada para excluir una exclusión. </p>
                <strong>Coexistencia de Seguros (Doble Segura):</strong><p> Es la situación que se plantea, cuando sobre el mismo objeto existen  vanes seguros del mismo tipo, de tal modo que, teóricamente, si se p-produjere  la pérdida de dicho objeto a consecuencia de un siniestro, las indemnizaciones  conjuntes debidas per Las distintas aseguradoras sobrepasarían el valor real  del objeto, y serian por lo tanto, causa de lucro para el tomador del seguro.   </p>
                <strong>Comienzo y Fin de la Cobertura: </strong><p>Salvo pacto en contrario, la responsabilidad del asegurador comienza a  las 12 horas del día en el que se inicia la cobertura y termina a las 12 horas  del último día del plazo establecido.</p>
                <strong>Comisión:</strong><p> Importe  reconocido al producto de un seguro como compensación para su gestión al  obtener una solicitud aceptable de seguro.</p>
                <strong>Compañía de Seguros:</strong><p> Empresa que mediante un Contrato de Seguro asume las consecuencias dañosas  per la realización de un evento cuyo riesgo fue objeto de cobertura. </p>
                <strong>Condiciones Generales:</strong><p> Son las condiciones comunes del contrato, expresando disposiciones de  la ley de seguros y clausuras específicas sobre riesgos cubiertos, riesgos  excluidos, bienes con valor limitado, etc.</p>
                <strong>Condiciones Generales Específicas:</strong><p> Son las condiciones del contrato pero que se refieren a un rubro en  particular dentro de un ramo general. </p>
                <strong>Condiciones Particulares:</strong><p> Cobertura o condiciones que se contratan para cada póliza, si lo  requiere el asegurado que prevalecen ante las condiciones generales. Son  condiciones habitualmente impresas en anexos que tratan sobre las características  del riesgo y datos del asegurado, o bien sobre coberturas adicionales. </p>
                <strong>Contratante: </strong><p>Persona  natural a jurídica (pública o privada), que encarga la realización de una obra,  suministro de materiales a la prestación de un servicio. Es la persona que  suscribe la póliza de seguro con la empresa aseguradora.</p>
                <strong>Contratista: </strong><p>Persona  natural a jurídica que mediante un contrato debe ejecutar una obra, proveer material,  o prestar un servicio.</p>
                <strong>Contrato:</strong><p> Convenio  entre dos o más partes, en el quo una de ellas se obliga con la otra a Dar,  Hacer o no Hacer, a cambio de un precio.</p>
                <strong>Contrato de Seguros, Caracteres y  Principios Básicos:</strong><p> El contrato de seguro se caracteriza por  ser fundamentalmente oneroso, conmutativo, aleatorio, indivisible y de adhesión.</p>
                <strong>Contrato de Seguros:</strong><p> Es el documento a póliza suscrito con una entidad de seguros en el que  se establecen las normas que han de regular la relación contractual de  aseguramiento entre ambas partes (asegurador y asegurado), especificándose sus  derechos y obligaciones respectivos. Desde un punto de vista legal, el contrato  de seguro es aquel por el que el asegurador se obliga, mediante el cobro de una  prima y pare el caso de que se produzca el evento cuyo riesgo es objeto de  cobertura, a indemnizar, dentro de los límites pactados, el daño producido al  asegurado, o a satisfacer un capital, una renta u otras prestaciones convenidas.</p>
                <strong>Corredor:</strong><p> Es la  persona física a jurídica que realiza la actividad mercantil de mediación en  seguros privados, sin mantener contrato de agenda o vínculos que supongan afección  con entidades aseguradoras o perdida de independencia respecto a estas, y  ofreciendo asesoramiento profesional imparcial a quienes demandan la cobertura  de los riesgos a que se encuentran expuestos sus personas, patrimonios,  intereses o responsabilidades. Las personas físicas que ejerzan la actividad y  las que tengan a su cargo la dirección técnica, o puesto asimilado, de una  Sociedad de Correduría de Seguros, deberán estar en posesión del diploma de &ldquo;Mediador  de Seguros Titulado&quot;.</p>
                <strong>Cotización:</strong><p> Es el  mecanismo para establecer los costos del seguro desde el punto de vista  comercial, corno fuente de negoctiacti6n con el asegurado/Broker, asesor o  corredor para la posible posterior emisión de una a más pólizas que conforman  un programa de seguros.</p>
                <strong>Cúmulo de Riesgos:</strong><p> Se produce cuando determinadas partes de un mismo riesgo están  aseguradas simultáneamente por la misma entidad aseguradora, o cuando ciertos  riesgos distintos están sujetos al mismo evento; en este último sentido, se  dice, por ejemplo, que forman cúmulo las diversas factorías de una misma  Industria cuya proximidad hace presumible que el incendio iniciado en una de ellas  se propague a las restantes.</p>
                <strong id="d">Daño:</strong><p> Es la  perdida personal a material producida a consecuencia directa de un siniestro.</p>
                <strong>De cobro inmediato:</strong><p> Obligación de la Aseguradora, de realizar el pago tan pronto como el  Asegurado Contratante), le presente la documentación necesaria para el pago.</p>
                <strong>Declaración:</strong><p> Es una afirmación,  verdadera o falsa, sobre un objeto dada, rave indica la existencia o no de un  hecho.</p>
                <strong>Declaración Amistosa de Accidentes:</strong><p> Parte de siniestros por el cual se agilizan los trámites  administrativos de resolución del siniestro. Es imprescindible que este firmado  par ambos conductores, y que ambos tengan suscrito el seguro de Responsabilidad  Civil Obligatorio. La determinación de la responsabilidad del accidente se  bosara en los datos consignados en la declaración amistosa debidamente  cumplimentada, siendo la culpabilidad imputada al vehículo quo resulte  responsable.</p>
                <strong>Deducible:</strong><p> Es la participación  que el asegurado tiene en cada siniestro, se lo utilice técnicamente para  eliminar perdidas pequeñas que no ponen en riesgo el patrimonio del Asegurado:  su objetivo es disminuir el costo del seguro, para ello se lo conoce también  coma &quot;Costo indirecto del seguro&quot;. Como efecto positivo adicional de  la contratación de una póliza con un deducible adecuado, se consigue el que el  Asegurado tenga un mejor control sobre la administración de sus riesgos,  generalmente el deducible evita la reclamación de aquellos siniestros que están  bajo el control del Asegurado.</p>
                <strong>Denuncia del Siniestro:</strong><p>El tomador, a  derecho habiente, en su caso, debe comunicar al asegurador el acontecimiento  del siniestro dentro de los tres días de conocerlo. </p>
                <strong>Deprecación:</strong><p> Es la disminución  de valor que sufre el objeto asegurado a consecuencia del transcurso del  tiempo.</p>
                <strong>Derechohabientes:</strong><p> Son los herederos de una persona o beneficiarios de las indemnizaciones  establecidas en la póliza de seguro.</p>
                <strong>Dividendo:</strong><p> Parte  del beneficio económico que corresponde al titular del cada acción de una  compañía anónima de seguros.</p>
                <strong id="e">Efecto:</strong><p> Es el  resultado de la ocurrencia de una causa, para los fines del seguro, representa  los daños perdidas provenientes de la ocurrencia de una causa.</p>
                <strong>Efectivación:</strong><p> Solicitud del Asegurado (Contratante) para el cobro de las garantías, por  causas imputables al contratista.</p>
                <strong>Endoso:</strong><p> Es el  documento por medio del cual se traslada el derecho de indemnización sobre uno  o varios objetos del seguro, por un monto que nunca deberá ser mayor a la suma  asegurada de los bienes una o varias personas a entidades, en una póliza. Toda modificación  del contrato de seguro.</p>
                <strong>Entidad Aseguradora:</strong><p> Nombre con el que se designa, en general, a la empresa o sociedad  dedicada a la práctica del seguro.</p>
                <strong>Evento:</strong><p> Acontecimiento  a suceso imprevisto, es también sinónimo de siniestro</p>
                <strong>Evolución de las Reservas Siniestros:</strong><p> Cuadro que muestra cuanto se gasto en arios posteriores con respecto a  la Reserva Siniestros de un determinado año.</p>
                <strong>Exclusión de Riesgo:</strong><p> Clausula cuya consignación en la póliza es decisión de la aseguradora  en el sentido de establecer que el seguro no cubrirá los daños a consecuencia  de determinados riesgos. Decisión, que generalmente corresponde a la entidad  aseguradora, en virtud de la cual no quedan incluidas en las garantías de la póliza  determinados riesgos o, quedando incluidos éstos, las garantías del contrato no  surtirán efecto cuando concurran respecto a ellos determinadas circunstancias a  condiciones preestablecidas. También significa la decisión de la aseguradora,  en virtud de la cual no quedan incluidas en las garantías de la póliza  determinados riesgos a bien quedan condicionados a determinadas circunstancias.</p>
                <strong id="f">Fecha de iniciación: </strong><p>Día, mes y año en que inicia la cobertura acordada en fa transacción de  reaseguro.</p>
                <strong>Fecha de Vencimiento: </strong><p>Día, mes y año en que finaliza la cobertura acordada en la transacción  de reaseguro.</p>
                <strong>Frecuencia: </strong><p>Es la  relación que hay entre el número de siniestros de una determinada cartera de  seguro y el número total de pólizas de la misma.</p>
                <strong>Fianza:</strong><p> Es un  acuerdo a contrato suscrito entre tres partes, en el cual una parte llamada  Afianzador (compañía de Seguros) garantiza al acreedor de una obligación  (Beneficiario, Asegurado, contratante) que su deudor (Contratista. Afianzado)  la cumplirá en la forma prevista en el contrato. Si el deudor no lo hace, el  asegurador pagara la suma asegurada. Pero este servicio, la compañía de seguros  cobra una prima. </p>
                <strong>Franquicia:</strong><p> Es la  cantidad por la que el asegurado es propio asegurador de sus riesgos y en virtud  de la cual, en caso de siniestro, soportara con su patrimonio la parte de los  darlos que le corresponda. El régimen de franquicia se establece generalmente a  iniciativa de la entidad aseguradora, la cual puede así ofrecer un  abaratamiento de la prima al conseguir una importante reducción de los gastos  de tramitación de siniestros, como consecuencia de no tener que atender un gran  número de expedientes de pequeña cuantía Es el monto que se encuentra a cargo  del asegurado en caso de producirse el siniestro.</p>
                <strong id="g">Ganancia o Pérdida:</strong><p> El resultado positivo 0 negativo de las operaciones en cuestión.</p>
                <strong>Ganancias Técnica:</strong><p> Utilidad resultante directamente de la suscripción de riesgos (sin  tener en cuenta otras fuentes de ingresos de las Cías, De Seguros.</p>
                <strong>Garantía:</strong><p> Es el  límite estipulado en el contrato de seguros por el que el asegurador se hace  cargo de las consecuencias económicas de un siniestro.</p>
                <strong>Garantías:</strong><p> Es un  acuerdo en que una de las partes entrega condiciones que se vuelven obligaciones  para una de las partes. Implícitas o expresas. </p>
                <strong>Gastos:</strong><p> Montos  necesarios para la administración de la compañía de seguro.</p>
                <strong id="h">Hurto:</strong><p> Es el  calificativo que se da en seguros a la desaparición misteriosa de bienes, como  el resultado de la sustracción de los mismos per personas desconocidas en  circunstancias desconocidas y sin dejar huellas de violencia sobre los bienes. Apropiación  de una cosa ajena con ánimo de lucro, sin emplear fuerza en las cosas, intimidación  o violencia en las personas.</p>
                <strong id="i">Incondicional:</strong><p> Característica  de las pólizas para el Sector Publico, la Aseguradora no podía oponer aspectos  no previstos en la Ley, al pago.</p>
                <strong>Indemnización:</strong><p> Es la  cantidad suficiente y oportuna que se entrega al Asegurado en (caso de ocurrir  la eventualidad prevista en la póliza, siempre y cuando se haya contratado el  valor asegurado adecuado y correcto. Es la contraprestación a cargo del  Asegurador en caso de producirse el siniestro.</p>
                <strong>Indemnizaciones:</strong><p> Son los pagos que realizan las aseguradoras a los asegurados a  consecuencia de pérdidas o daños a sus bienes o a sus personas. Las leyes de  muchos países establecen que las indemnizaciones pueden ser en dinero o mediante  la reposición de los bienes dañados por otros de las mismas características o condiciones.  Esto es muy claro en el seguro de automóviles en donde la práctica es  normalmente la reparación de los daños en los talleres con los que operan las  aseguradoras y el asegurado no recibe ninguna cantidad de dinero por estos daños.</p>
                <strong>Índice de Frecuencia:</strong><p> Es el promedio del número de siniestros que registra una póliza durante  un año de seguro o el promedio anual de siniestros per año de una cartera de  seguros.</p>
                <strong>Indica de Intensidad: </strong><p>Es el coste promedio de los  siniestros  registrados en una póliza o con relación a una cartera de pólizas.</p>
                <strong>Infraseguro:</strong><p> Se  produce cuando la suma asegurada es menor que la suma asegurable y por la tanto  el Asegurado se convierte en su propio asegurador par la parte proporcional de  la que no aseguró. Esta regla proporcional se aplica por ítem u objeto  asegurado. En los supuestos de Infraseguro y en el caso de siniestro parcial,  reviste especial importancia la denominada Regla Proporcional que se aplica en la  determinación de la cifra indemnizatoria, y en virtud de la cual, el daño debe  ser liquidado teniendo en cuenta la proporción que exista entre el capital  asegurado y el valor real en el momento del siniestro.</p>
                <strong>Interés Asegurable:</strong><p> Es la relación económica existente entre el asegurado y el objeto asegurado  amenazada en su integridad por uno a varios riesgos. Relación de hecho o de  derecho que liga a una persona con un bien, susceptible de valoración  patrimonial objetiva y estimada. Es el objeta del contrato.</p>
                <strong id="l">LAP - Libre de Avería Particular: </strong><p>Es una cobertura del ramo de transportes que únicamente cubre las pérdidas  de las mercaderías, ocasionadas por daños del medio de transporte, por ejemplo:  caída del avión, hundimiento del barco.</p>
                <strong>Límite agregado anual:</strong><p> Se dice de aquel límite asegurado del cual se disminuyen las  indemnizaciones,no se atribuyen.</p>
                <strong>Limite Catastrófico:</strong><p> Es aquel que se estipula en la póliza y limita la indemnización por una  ocurrencia catastrófica.</p>
                <strong>Limite Colusorio: </strong><p>Corresponde al valor máximo en las pólizas de Fidelidad, que limita la  indemnización cuando dos o más personas se pusieron de acuerdo en cometer un ilícito  que determina una pérdida para el contratante de la póliza.</p>
                <strong>Limite Específico:</strong><p> Es el sistema de establecer los límites de responsabilidad de la póliza  de responsabilidad civil a en la sesión de responsabilidad civil de las pólizas  de vehículos o de Todo riesgo de construcción o de Todo riesgo de montaje, en  forma particular y por separado para los daños a terceras personas, con un  sublimite para cada persona afectada, y un límite igualmente separado para los  daños a la propiedad de terceros. </p>
                <strong>Limite Único Combinado:</strong><p> Este es un tipo de límite, que se emplea en la póliza de  responsabilidad civil o en la sesión de responsabilidad civil de las pólizas de  vehículos o de Todo riesgo de construcción o de Todo riesgo de montaje, para  establecer un solo límite para las indemnizaciones tanto de daños a terceras  personas a danos a los bienes de terceros, que se vean afectados en un  siniestro amparado</p>
                <strong>Líneas Aleadas:</strong><p> Es el nombre que se le da a las coberturas adicionales a amparos  adicionales de la póliza de incendio y/o rayo.</p>
                <strong id="m">M.A.S.:</strong><p> Monto  máximo expuesto, aplicable a pólizas que tengan varias direcciones, y aquella que  tenga una mayor concentración de valor asegurado en comparación con las demás  direcciones, es la que determina el monto máximo expuesto.</p>
                <strong>Mediador de Seguros:</strong><p> Persona natural o jurídica que realiza profesionalmente la mediación de  seguros. En España se clasifican en &quot;agentes y corredores&quot;. No pueden  asumir directa o indirectamente la cobertura de ninguna clase de riesgos ni  tomar a sui cargo, en todo o en parte, la siniestralidad objeto del seguro,  siendo nulo todo pacto en contrario.</p>
                <strong>Medida de la Prestación: </strong><p>Modalidad con que se contrata un seguro. Puede ser a primer riesgo  absoluto o a primer riesgo relativo.</p>
                <strong>Mercado Monetario:</strong><p> En él se negocian activos financieros a corto plazo (entre día y 12 o  18 meses). También se pueden y incluir en este mercado activos financieros con  plazo superior (Bonos bancarios o Emisiones del sector público), cada vez que  dichas emisiones gozan de reducido riesgo y elevada liquidez en mercados  secundarios (son susceptibles de ser negociados en operaciones con pacto de  recompra). En definitiva, son mercados caracterizados por una gran liquidez y  un reducido riesgo.</p>
                <strong id="n">Neto: </strong><p>Coma  &quot;bruto&quot;, pero luego de haber considerado as transacciones de  reaseguro.</p>
                <strong>Nulidad: </strong><p>Ineficacia  de un acto jurídico para producir sus efectos, jurídicamente, como si nunca  hubiera existido. La Ley establece diversas causas de nulidad. Entre ellas por inexistencia  de riesgo, algunos casos de reticencia a falsa declaración, intención de un  enriquecimiento ilícito, por falta de interés asegurable, por declaración inexacta  o culposa, por haber ocurrido el siniestro antes de la celebración del  contrato, etc.</p>
                <strong id="o">Objeto Asegurado:</strong><p> Sujetos tangibles o intangibles que se tienden a proteger contra un daño  o perjuicio.</p>
                <strong>Objeto del Seguro:</strong><p> Es la persona o bien sobre la que recae la protección, amparo e  cobertura del seguro. Es la compensación del perjuicio económico sufrido por el  patrimonio a consecuencia de un siniestro. </p>
                <strong>Ocupantes: </strong><p>Persona  transportada en un vehículo de motor, o que se encuentre en su interior a sobre  el cuándo permanezca detenido por incidencias de la circulación.</p>
                <strong>Pérdida Parcial:</strong><p> Se denomina al siniestro que sumados sus daños no supera el valor total  asegurable.</p>
                <strong id="p">Pérdida Total: </strong><p>Se considera al siniestro cuyo monto de daños supera el valor asegurable.</p>
                <strong>Pérdida Total Acordada:</strong><p> Es el sistema para establecer la forma de indemnizar una pérdida en la  que de mutuo acuerdo con el asegurado se declara pérdida total al objeto a conjunto  de objetos del seguro afectado/s.</p>
                <strong>Peritación o Peritaje:</strong><p> Es la función desarrollada por los que, con carácter profesional, hacen  la tasación o valoración de las consecuencias económicas de un siniestro.</p>
                <strong>Perito: </strong><p>Es la  persona encargada de la peritación.</p>
                <strong>Plazo de Gracia:</strong><p> Periodo durante el cual están en vigor las garantías de la póliza de  seguro aunque no se haya pagado la prima por el asegurado.</p>
                <strong>Plaza de Preaviso:</strong><p> Plazo señalado en la póliza durante el cual tanto el asegurado como el  asegurador puede comunicar a la otra parte su intención de rescindir el  contrato de seguro a partir de su próxima fecha de vencimiento.</p>
                <strong>Póliza:</strong><p> Es el  documento en el que se contienen las condiciones generales, particulares y  especiales que regulan las relaciones contractuales entre el asegurador y el  asegurado.</p>
                <strong>Pólizas a corto plazo:</strong><p> Pólizas emitidas por un plazo inferior a un año.</p>
                <strong>Póliza a Todo Riesgo:</strong><p> Póliza cuya cobertura se extiende a todos los riesgos asegurables que  puedan afectar a la cosa asegurada.</p>
                <strong>Porcentaje fijo:</strong><p> Proporción tija, no ajustable, aplicada a las primas pare el cálculo de  la reserva correspondiente.</p>
                <strong>Prestación:</strong><p> Se  denomina así en el sector asegurador al conjunto de obligaciones que tiene el  asegurador respecto al asegurado en caso de siniestro, singularmente en el  aspecto económico.</p>
                <strong>Prestaciones:</strong><p> Objetivo  o contenido de las obligaciones que puede consistir en dar, hacer o no hacer  alguna cosa. En la terminología aseguradora y en su acepción más amplia,  equivale al conjunto de obligaciones que, a cambio de la prima que recibe,  asume el asegurador en caso de siniestro, pero en la práctica se utiliza más frecuentemente  para referirse a las que no tienen un contenido puramente económico. En este  sentido, por ejemplo, se utiliza en la expresión &quot;prestaciones sanitarias&rdquo;.</p>
                <strong>Prima Comercial: </strong><p>Se denomina también Prima Bruta o Prima de Tarifa, y es la que aplica el  asegurador a un riesgo determinado y para una cobertura concreta. Está formada  como elementos base, por la Prima Pura más los recargos para gastos generales  de administración y gestión, gastos comerciales o de adquisición, gastos de cobranza  de las primas, gastos de liquidación de siniestros más, en su caso coeficiente  de seguridad y beneficio industrial.</p>
                <strong>Prima:</strong><p> Es la aportación  económica que ha de satisfacer el contratante o asegurado a la entidad aseguradora  en concepto de contraprestación por la cobertura de riesgo que esta le ofrece.  Desde el punto de vista jurídico, es el elemento material más importante del  contrato de Seguro porque su naturaleza, constitución y finalidad lo hacen ser  esencial y típico de dicho contrato. La prima no puede ser equivalente al riesgo,  sino proporcional, porque el pago de la indemnización depende de un  acontecimiento fortuito, que sucederá o no, y, que su cuantía se desconoce a  prori. La prima debe estar claramente estipulada en el contrato.</p>
                <strong>Prima de Inventario:</strong><p> Resulta de sumar a la Prima Pura, el recargo de Gastos de Administración  solamente.</p>
                <strong>Prima de depósito: </strong><p>Importe de prima pagado al comienzo de un periodo de póliza y que está  sujeto a posteriores ajustes durante la vigencia o al vencimiento del periodo  de póliza.</p>
                <strong>Prima no devengada o Reservas para riesgos  en curso:</strong><p> La parte de las primas respectivamente, reservas suscritas no  aplicables a los riesgos corridos en el año en curso, sino a los que se  correrán en él o los años subsiguientes.</p>
                <strong>Primas suscritas:</strong><p> Primas que actualmente figuran en los libros de la Cia., dentro del año  considerado (año en curso).</p>
                <strong>Prima, Elementos: </strong><p>Técnicamente la prima es el costo de la probabilidad media teórica de  que haya siniestro de una determinada clase.  </p>
                <strong>Prima Nivelada: </strong><p>Aquella  que permanece invariable durante la vigencia del riesgo.</p>
                <strong>Prima Pura o de Riesgo:</strong><p> Representa la unidad más simple y básica del concepto de prima, por cuanto  significa el coste real de riesgo asumido per el asegurador, sin tener en  cuenta sus gastos de gestión ni otros conceptos.</p>
                <strong>Prima Total:</strong><p> Esta se  obtiene al incremental la Prima Comercial con los gravámenes complementarios  que procedan, tales come impuestos, recargo per aplazamiento de page, etc. </p>
                <strong>Principio Indemnizatorio: </strong><p>Siempre respecto del asegurado. Corresponde a la acción de resarcir en  la misma medida o cantidad el daño originado por la ocurrencia de un riesgo sobre  un bien.</p>
                <strong>Póliza:</strong><p> Es el  instrumento probatorio por excelencia del contrato. Es aconsejable, antes de  celebrarlo, leer todas las cláusulas contenidas en el mismo para tener una información  completa de sus términos y condiciones. En él se reflejan las normas que de  forma general, particular o especial regulan la relación contractual convenida  entre el asegurador y el asegurado.</p>
                <strong>Premio:</strong><p> Es el  precio del seguro. Está compuesto por la prima pura, más el margen de ganancia  para el asegurador, la comisión del productor, los derechos de emulsión, los  recargos administrativos, los recargos financieros cuando correspondan, y los importes  destinados al pago de las tasas, impuestos y contribuciones que gravan al  contrato y a la operación de seguros.</p>
                <strong>Prima Pura:</strong><p> Es el  costo real del riesgo asumido, sin incluir gastos de gestión externa a interna.</p>
                <strong>Primer Riesgo Absoluto:</strong><p> Modalidad de medida de la prestación. El asegurador indemnizará el daño  hasta el límite de la suma asegurada, sin tener en cuenta la proporción que exista  entre esta suma y el valor asegurable.</p>
                <strong>Prorrata o Primer Riesgo Relativo: </strong><p>Modalidad de medida de la prestación. El asegurador indemnizará el daño  hasta el límite de la suma asegurada, siempre que el valor asegurable declarado  no sea inferior al momento del siniestro a su valor real. Si el valor  asegurable real del bien al momento del siniestro excediera el monto del valor  asegurable declarado, el asegurador solo indemnizará el daño en la proporción  que resulte de ambos valores.</p>
                <strong>Prorrata (Pro rata témporis):</strong><p> Expresión latina que significa en proporción al tiempo.</p>
                <strong>Propuesta/Solicitud de Seguro:</strong><p> Es el instrumento donde se específica al asegurador la naturaleza del riesgo,  sus características, el importe que se desea asegurar, etc. A través de este,  el asegurador aceptara rechazara el riesgo tras el estudio de dicha prepuesta.</p>
                <strong>Productor/Asesor de Seguros:</strong><p> Es la persona, habilitada per la Superintendencia de Bancos y Seguros,  que realiza la intermediación entre quien quiere contratar el seguro y la  entidad aseguradora. Es quien ejerce la actividad de intermediación promoviendo  la concertación de contratos de seguros, asesorando a asegurados y asegurables.</p>
                <strong>Provisiones:</strong><p> Son las  reservas que han de realizar las empresas de seguros para hacer frente a las  obligaciones futuras contraídas con sus asegurados. Son obligatorias, en cuanto  a las primas, las matemáticas, las de riesgo en curso; y en cuanto a los  siniestros, las de siniestros pendientes de liquidación o pago y las de  supersiniestralidad. Son voluntarias las de gestión empresarial y las de inversión  y fluctuación de valores.</p>
                <strong id="r">Ramo: </strong><p>Modalidad  o modalidades relativas a riesgos homogéneos asumidos por el asegurador, tales  como ramo de Vida, de Automóviles, de Incendio, etc. Se entiende por ramo al  conjunto de riesgos de características similares (ramo Vida, ramo Automóviles,  etc.). Para operar en un determinado ramo la entidad aseguradora debe estar  previamente autorizada por la Superintendencia de Seguros.</p>
                <strong>Reasegurador:</strong><p> Es la  persona jurídica que recibe sesiones de participación en riesgos de pólizas  emitidas por el Asegurador directo. (Compañía de seguros que en esta operación  se llama cedente; pudiendo ser estas sesiones, automáticas o facultativas.</p>
                <strong>Reaseguro:</strong><p> Es la opción  de la Aseguradora de dispersar el riesgo asumido mediante pólizas distribuyendo  la totalidad o parte del riesgo a otra compañía de seguros o a una empresa  constituida come Reaseguradora. Esta operación es solidaria por parte de la  aseguradora para con el reasegurador. Consiste en la cesión al reasegurador o  reaseguradores de parte de los riesgos que componen la cartera del asegurador  directo.</p>
                <strong>Recupero:</strong><p> Es el  valor correspondiente a la venta de salvamentos o el valor correspondiente a la  recuperación judicial o extrajudicial per parte de la aseguradora per haber ejercido  el derecho de subrogación frente a los terceros causantes de una perdida  indemnizada previamente per la aseguradora.</p>
                <strong>Regla Proporcional:</strong><p> Se aplica para la determinación de la cifra Indemnizatoria, y en virtud  de la cual el daño debe ser liquidado teniendo en cuenta la proporción que  exista entre el capital asegurado y el valor real en el momento del siniestro.  La regla proporcional puede no tener aplicación, cuando, mediante pago de la  correspondiente sobreprima.</p>
                <strong>Renovación:</strong><p> Se denomina  al proceso de extender la vigencia de la póliza por un periodo igual al  anterior.</p>
                <strong>Reserva de Siniestros:</strong><p> Es el valor inicial que se constituye como reserva y se toma coma guía  para realizar una posible indemnización posterior, dicha reserva, o provisión  se libera una vez que la compañía haya indemnizado o negado definitivamente un  reclamo.</p>
                <strong>Reserva Siniestra:</strong><p> (Reserva para siniestros pendientes de ajustes) costo estimado de las indemnizaciones  que deberá pagarse por siniestro no ajustado durante el año contable.</p>
                <strong>Reserve Tácita:</strong><p> Reserva tácita contenida en un activo o compromiso determinado.</p>
                <strong>Responsabilidad Civil:</strong><p> Es la responsabilidad de una persona natural a jurídica que emana de  los actos de la misma y le compromete frente a terceros en forma pecuniaria. La  póliza de Responsabilidad Civil, dentro del marco conceptual anteriormente  expuesto, ampara con límites monetarios y coberturas dichas responsabilidades  incurridas per negligencia probada del Asegurado, y después de verse obligado a  pagar indemnización a terceros por orden de un juez mediante sentencia ejecutoriada.</p>
                <strong>Restitución Automática:</strong><p> Es una cláusula adicional que permite restituir automáticamente el  valor asegurado de un bien después de un siniestro, mediante el pago de una  prima calculada per el periodo que falta para finalizar la vigencia original. </p>
                <strong>Retrocesión: </strong><p>Operación  típica de la actividad aseguradora mediante la cual el reasegurador cede una  parte del riesgo asumido por él a un segundo reasegurador.</p>
                <strong>Riesgo:</strong><p> Probabilidad  de ocurrencia de un hecho incierto, fortuito, accidental y que tiene  consecuencias dañinas a dañosas.</p>
                <strong>Riesgos Catastróficos:</strong><p> También conocidos como extraordinarios, son aquellos producidos por fenómenos  de la naturaleza, terrorismo, motín o tumulto popular, o hechos y actuaciones  de las fuerzas armadas en tiempos de paz. Están cubiertos mediante el cobro de  un recargo por el &quot;Consorcio de Compensación de Seguros&quot;.</p>
                <strong>Riesgo Asegurable:</strong><p> Desde el punto de vista técnico, es aquel objeto a conjunto de objetos  del seguro que pueden ser asegurados pare lo cual debe enmarcarse en un  conjunto de requisitos.</p>
                <strong>Riesgos no Asegurables:</strong><p> Todos los riesgos a que se someten los objetos de seguro pero que, dada  su naturaleza no son aceptables por los aseguradores como riesgos cubiertos.  Pertenecen a este grupo los riesgos derivados del vicio propio y de la  interferencia humane.</p>
                <strong>Riesgos no Cubiertos:</strong><p> Aquellos para los que, no obstante ser asegurables, no se han  contratado</p>
                coberturas. Ya sea quo esta falta de cobertura provenga de decisión del  asegurado o del asegurador, los daños o pérdidas quo se ocasionen a consecuencia  de la ocurrencia de estos riesgos no son indemnizables.</p>
                <strong>Renovación Automática:</strong><p> Es el acuerdo entre las partes por el cual el seguro se prorroga tácitamente  par un nuevo periodo de vigencia.</p>
                <strong>Rescisión Voluntaria: </strong><p>Excepto en los seguros de vida, cualquiera de las partes puede rescindir  el contrato sin expresar causa. Si lo hace el asegurador, debe otorgarle al  asegurado 15 días de plazo, Si lo pide el asegurado el efecto es inmediato.  Existen disposiciones sobre la forma de cálculo para la devolución de la prima  por el tiempo no corrido o transcurrido.</p>
                <strong>Resultados Técnicos: </strong><p>Cálculo de la Ganancia Pérdida derivada de comprar siniestros, comisiones  y gastos can las primas ingresadas, sin considerar las operaciones de inversión.</p>
                <strong>Reticencia: </strong><p>Toda declaración  falsa a no declaración de circunstancias conocidas par el asegurado, aun hechas  de buena fe, que a juicio de peritos hubiese impedido el contrato o modificado  sus condiciones si el asegurador se hubiese cerciorado del verdadero estado del  riesgo, hace nulo o el contrato.</p>
                <strong>Riesgo:</strong><p> Es la  probabilidad de ocurrencia de un siniestro. Es la posibilidad de que la persona  a bien asegurado sufra el siniestro previsto en las condiciones de póliza.</p>
                <strong>Riesgos No Asegurables</strong><p>: Son aquellos que quedan fuera de la cobertura general por parte de las  aseguradoras, por ser contrarios a la Ley.</p>
                <strong>Robo:</strong><p> Es el  hecho de la apropiación ilícita de bienes por parte de terceros, dejando huellas  de violencia contra las casas, en el lugar de los hechos. Es la apropiación de  una casa ajena, con ánimo de lucro, mediante fuerza en las cosas o violencia o  intimidación en las personas.</p>
                <strong id="s">Salvamento:</strong><p> Es el bien  o conjunto de bienes que se recuperan después de un siniestro indemnizado por  la Aseguradora. Se denomina así al hecho, tanto de procurar evitación de los daños  durante el siniestro, como los de los objetos, después de ocurrido, que haya  resultados indemnes.</p>
                <strong>Salvamento, Seguro Marítimo: </strong><p>Significa el rescate del barco y de la carga en el mar y que se  encuentra amenazada por un riesgo y que no podría ser posible rescatarla sin  los servicios de un salvador.  En  adición, se trata de la traducción del término inglés &ldquo;salvage loss&rdquo; que  significa lo siguiente: si una mercancía es dañada por un riesgo cubierto, y  para evitar su deterioro completa es vendida de emergencia en un puerto de  refugio (ni en el puerto de embarque ni en el puerto de destino), los aseguradores  suelen reconocer la pérdida de salvamento que consista en a diferencia entre el  valor asegurado (máximo el valor asegurable) y el resultado neto obtenido de su  venta de emergencia. </p>
                <strong>Salvamento, Gastos de:</strong><p> Si hablamos de gastos de salvamento, estamos normalmente pensando en  los gastos hechos para salvar <a href="http://algo.es">algo, es</a> decir para prevenir un siniestro o de un deterioro mayor.</p>
                <strong>Salvataje:</strong><p> Se  refiere al hecho de recuperar un objeto dañado de su lugar de daño, con el fin  de trasladarlo a otro sitio.</p>
                <strong>Saqueo:</strong><p> Es uno  de los riesgos típicos del seguro de transporte marítimo, aunque también existe  en el caso de seguro de incendios y otros. El saqueo suele no estar cubierto por  las pólizas básicas, pero puede ser incorporado a ellas mediante anexos  específicos a condición de primas generalmente bastantes elevadas. </p>
                <strong>Seguro:</strong><p> Es un  sistema de traslación de riesgos, en el que la Aseguradora se compromete a  pagar los siniestros, si estos ocurrieren, a cambio de una prima pagadera por  el asegurado. Es un sistema solidario de protección mutua, que está basado en  el principio de dispersión del riesgo. Existe un contrato de seguro cuando el  asegurador se obliga mediante el pago de una prima o cotización a resarcir un  daño o a cumplir la prestación convenida si ocurre el evento previsto.</p>
                <strong>Seguro de Automóviles:</strong><p> Seguro que tiene por finalidad la compensación de los daños ocasionados  por el uso y circulación de vehículos. En la mayoría de los países este tipo de  seguro tiene dos modalidades: el seguro obligatorio, que cubre aquellos daños  tanto personales como materiales ocasionados a terceros dentro de unos límites  fijados por ley, y el seguro voluntario, que cubre la cuantía que exceda del límite  de seguro obligatorio.</p>
                <strong>Seguro de Crédito:</strong><p> El que cubre al acreedor contra la posible insolvencia de su deudor  para efectuar el pago.</p>
                <strong>Seguro de Transporte: </strong><p>El objetivo de este seguro es cubrir los bienes o mercancías propiedad  del asegurado, cuando sean enviados de un lugar a otro por los diferentes  medios de transporte, siendo estos: Terrestres, aéreos, marítimos, o alguna combinación  de estos, por diversos riesgos inherentes durante el viaje de traslado e incluso  por el resguardo de la propia mercancía en bodegas antes de ser entregada al  lugar de destino.</p>
                <strong>Seguro por Cuenta Ajena:</strong><p> Se denomina así a aquellos seguros en los que el asegurado no es el  tomador del seguro, sino un tercero  determinado o indeterminado que adquiere los derechos derivados del contrate.</p>
                <strong>Seguros Multiriesgos</strong><p> <strong>Hogar:</strong><p> El objeto de este  seguro es el de proteger a los propietarios o inquilinos de un piso o vivienda  contra las pérdidas económicas debidas a riesgos tales como incendio, daños por  las aguas, robo, caída de aeronaves, roturas de espejos y cristales,  responsabilidad civil por hechos propios o de los ocupantes de la vivienda,  derivados de su utilización y, en su caso puede extenderse la garantía a los  accidentes personales, con la ventaja de tener reunidos todos estos riesgos en  una sola póliza de seguro.</p>
                <strong>Seguros Obligatorios:</strong><p> Son aquellos quo son impuestos por el Estado, tales como los de  Seguridad Social, Seguro de Vida Obligatorio, Seguro Colectivo para el Personal  del Estado, Seguro Obligatorio de Responsabilidad Civil Automotores, etc. </p>
                <strong>Seguros Patrimoniales: </strong><p>Bajo esta denominación se recogen todos los seguros cuyo fin principal  es reparar la pérdida sufrida, a causa de siniestro, en el patrimonio del  tomador del seguro. Son elementos esenciales de los seguros de daños: el interés  asegurable, que expresa la necesidad de que el tomador del seguro tenga algún  interés directo y personal de que el siniestro no se produzca.</p>
                <strong>Siniestralidad:</strong><p> Es la experiencia pasada del bien asegurado, tanto en intensidad como  en frecuencia. Se calcula sumando los siniestros incurridos comparados con la  prima devengada.</p>
                <strong>Siniestro: </strong><p>Es la  ocurrencia de un riesgo que causa pérdidas y/o daños, y que determina la  solicitud de indemnización a la aseguradora, por el valor que permita dejar las  cosas como estaban antes de la ocurrencia del siniestro. Es la manifestación  concreta del riesgo asegurado, qua produce unos daños garantizados en la póliza  hasta determinada cuantía. </p>
                <strong>Siniestros y Siniestros Pagados: </strong><p>Pagos efectuados para los siniestros avisados al asegurador por el  asegurado y/o terceros.</p>
                <strong>Sobreseguro:</strong><p> Es el  hecho de que una póliza se haya contratado por un valor asegurado mayor al  valor asegurable. En este caso la indemnización se limita al valor de la  perdida y que en ningún caso supere el interés asegurable. </p>
                <strong>Subagente:</strong><p> Es la  persona designada por un agente para colaborar con él en la producción de  seguro.</p>
                <strong>Subrogación: </strong><p>Por el  pago que realice la Aseguradora por la efectivización, el Asegurado cede los  derechos y acciones en contra del afianzado (contratista). También se define  como los derechos que correspondan al asegurado contra un tercero, en razón del  siniestro, se transfieren a la aseguradora hasta el monto de la indemnización  que abone. El asegurado es el responsable de todo acto que pe-ludí-que este  derecho a la aseguradora. Los derechos que correspondan al asegurado contra un  tercero, en razón del siniestro, se transfieren al asegurador hasta el monto de  la indemnización que abone, El asegurado es el responsable de todo acto que  perjudique este derecho del asegurador.</p>
                <strong>Sue and Labor:</strong><p> Es la  obligación que tiene el asegurado para tomar los razonables pasos para  minimizar o prevenir que un riesgo afecte a su propiedad. En cualquier caso de  pérdida o avería es obligación del asegurado y de sus empleados y agentes, adoptar  las medidas que puedan ser razonables para evitar o reducir una pérdida que sea  recuperable baso este seguro Los asegurados contribuirán a sufragar os gastos  debida y razonablemente incurridos por el asegurado. Sus empleados o agentes  por tales medidas.</p>
                <strong>Suma Asegurada:</strong><p> Se llama así al máximo pagadero en caso de siniestro. Es un valor  previamente estipulado en las condiciones de póliza.</p>
                <strong>Superintendencia de Bancos y Seguros:</strong><p> Entidad pública; persona jurídica de derecho público Organismotécnico y  autónomo dirigido por el Superintendente de Bancos que tiene a su cargo la  vigilancia y control de las instituciones del sistema financiero público y  privado así como de las compañías de seguros y reaseguros.</p>
                <strong>Supraseguro:</strong><p> Se  origina cuando el valor que el asegurado o contratante atribuye al objeto  garantizado en una póliza es superior al que realmente tiene. Ante una  circunstancia de este tipo, en caso de producirse un siniestro, la entidad  aseguradora sólo está obligada a satisfacer el valor de la venta del objeto  antes de suceder el accidente, con derecho a aplicar la regla proporcional  cuando el siniestro sea parcial, pues de otro modo podría producirse un  enriquecimiento injusto en el asegurado o contratante que llegaría a tener  interés en que se produjese el accidente</p>
                <strong>Suscripción:</strong><p> Tasación  (cotización) y aceptación de riesgos para ser asegurados.</p>
                <strong id="t">Tabla de mortalidad anual: </strong><p>Probabilidades de morir a cierta edad. Utilizado por actuarios para  calcular las primas y reservas para las anualidades en las que los beneficios  son pagados únicamente si la persona designada vive.</p>
                <strong>Tasa:</strong><p> Es el  porcentaje que cobra la entidad por asumir un riesgo tanto en seguro como en  reaseguro. </p>
                <strong>Tarifa:</strong><p> Es el  repertorio de los distintos tipos de prima aplicables en cada ramo de seguros  para los distintos riesgos.</p>
                <strong>Tarifa de Prima:</strong><p> Expresión con que en el argot de los aseguradores se denomina al  catálogo en que constan las distintas primas que habrán de aplicarse a los  riesgos asegurables por ramo de seguros.</p>
                <strong>Tarificación:</strong><p> Proceso  de complejidad variable que consiste en la determinación de las distintas  primas que habrán de aplicarse a los riesgos asegurables por ramo de seguros.</p>
                <strong>Tasa Comercial:</strong><p> Es el factor que aplicado a la suma asegurada nos permite además de  indemnizar las pérdidas, cubrir los gastos administrativos, los costos de  adquisición y la utilidad prevista.</p>
                <strong>Tasa de Prima:</strong><p> Proporción que, aplicada al capital asegurado, da como resultado la prima de  riesgo.</p>
                <strong>Tercero:</strong><p> Toda  persona que resulta afectada por acciones del asegurado que generan situaciones  de responsabilidad.</p>
                <strong>Tomador:</strong><p> Es la  persona que contrata el seguro con el asegurador. Generalmente en los seguros  individuales el tomador contrata el seguro por cuenta propia, uniéndose así en  una persona dos figuras (tomador o contratante y asegurado). Por el contrario  el seguro es por cuenta ajena cuando el tomador es distinto del asegurado; esta  situación es típica en los seguros colectivos.</p>
                <strong id="u">Unidad Monetaria:</strong><p> Es la denominación de la moneda que circula en un país, susceptible de  cambiarse en oro o divisas. Este concepto también expresa las cuentas del Fondo  Monetario Internacional en el que, por su carácter internacional, participan  diversas unidades monetarias procedentes de varios países. </p>
                <strong id="v">Valor Asegurable:</strong><p> Es el valor económico real del interés asegurable.</p>
                <strong>Valor Asegurado:</strong><p> Es el valor que consta en la póliza, este valor corresponde a los  valores solicitados por el cliente, por esta razón el cliente es el único  responsable de establecer la suma asegurada de la póliza, correspondiendo a la Compañía  y al Corredor de Seguros asesorado en los mecanismos para poder establecer una  suma asegurada correcta. También es la estimación económica del objeto  asegurado, es el monto máximo del contrato de seguro.</p>
                <strong>Valor C.&amp;.F.: </strong><p>Representa el valor FOB más el flete de importación &quot;Cost and  freight&rdquo;.</p>
                <strong>Valor C.I.F.: </strong><p>Representa  el valor C.&amp;.F. más el costo de seguro de transporte de importaciones  &quot;Cost insurance and freight&quot;.</p>
                <strong>Valor Convenido (o estimado):</strong><p> Es aquel en que, entre asegurador y asegurado, se preestablece la  valoración del interés que se asegura en caso de ocurrencia del siniestro.</p>
                <strong>Valor de Nuevo:</strong><p> Para  los vehículos nuevos o denominados cero kilómetros de la misma marca y tipo y  modelo del descrito en la póliza, es el valor de venta que el distribuidor o  concesionario autorizado ofrece al público en la fecha del siniestro, el cual  incluye impuestos correspondientes, tales como IVA y cualquier otro que la ley  imponga. </p>
                <strong>Valoración del Riesgo:</strong><p> En general se entiende por valoración el cálculo o apreciación  económica de una cosa. Entre los distintos tipos de valor se deben señalar los  siguientes por su incidencia en la determinación económica cuantitativa de la  cobertura die seguro.</p>
                <strong>Valor de la indemnización:</strong><p> Representa el valor entregado al Asegurado y/o beneficiario por  concepto de indemnización, habiéndose deducido los valores correspondientes a  franquicia deducible y depredación si aplica, pero antes de deducir el valor  correspondiente a restitución de suma asegurada.</p>
                <strong>Valor de Mercado (o real):</strong><p> En este caso el interés se valora de acuerdo con el precio por el que  normalmente puede adquirirse un bien de características similares, en el  momento el ocurrir el siniestro.</p>
                <strong>Valor de Reposición:</strong><p> Representa al valor que permita al momento de ocurrir un siniestro el  que la Compañía indemnice el valor equivalente al valor a nuevo del mismo bien  y de las mismas características, siempre y cuando dicho valor alcance para el  efecto y que el Asegurado realmente reemplace el bien afectado.</p>
                <strong>Valor de Siniestro: </strong><p>Representa el valor de los daños de un siniestro, que puede generar uno  o más reclamos con sus valores individuales. </p>
                <strong>Valor del Reclamo:</strong><p> Representa el valor que el asegurado espera como Indemnización.</p>
                <strong>Valor F.O.B.:</strong><p> Representa el valor de las mercaderías en el puerto de embarque &quot;FREE ON  BOARD&quot;, se lo emplea en el seguro de transporte de importaciones.</p>
                <strong>Valor Nuevo:</strong><p> En este  supuesto, la garantía real del seguro cubre el precio de venta del objeto  asegurado en estado de nuevo.</p>
                <strong>Veliz Real Actual:</strong><p> Es el equivalente del valor a nuevo del bien siniestrado y de las  mismas características, deduciendo la depreciación técnica (no contable) por  uso, calculando la vida transcurrida sobre la vida útil de dicho bien, el  sistema de depreciación es por saldos</p>
                <strong>Valor Venal:</strong><p> Es el  valor en venta que tiene el objeto asegurado en el momento inmediatamente  anterior a producirse el siniestro.</p>
                <strong>Vencimiento de la Póliza:</strong><p> Es la fecha pactada en el contrato para la finalización del mismo.</p>
                <strong>Vicio Propio:</strong><p> Germen  de destrucción o deterioro que lleva en sí las cosas por su propia naturaleza o  destino, aunque se las suponga de la mejor calidad de su especie. Las averías,  mermas o pérdidas de objetos asegurados provenientes de vicio propio no están  comprendidas dentro de los riesgos asumidos por el asegurador.</p>
                <strong>Vigencia:</strong><p> Es el  período de tiempo dado entre dos fechas y por un número determinado de días en  el cual una póliza provee cobertura. Esto es aplicable a las pólizas de base  anual, por ejemplo no se aplica a transporte de importaciones.</p>
                <strong>Vigencia del Seguro: </strong><p>Es el plazo durante el cual el contrato está en vigor y el asegurado se  encuentra cubierto. </p>
            <?php endif; ?>
            <div class="descargas">
                <?php if ($idcat == 'informacionFinanciera') { ?>
                    <p>Cumpliendo con la Ley de Transparencia estipulada por la 
                        Superintendencia de Bancos y Seguros, compartimos la siguiente información:</p>
                    <br>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Estados Financieros 2012 
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Estados Financieros 2012') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    Estados Financieros 2013
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Estados Financieros 2013') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse5">
                                    Estados Financieros 2014 
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Estados Financieros 2014') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse3">
                                    Margen de Solvencia 2012
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Margen de Solvencia 2012') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse4">
                                    Margen de Solvencia 2013
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Margen de Solvencia 2013') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse6">
                                    Margen de Solvencia 2014
                                </a>
                            </div>
                            <div id="collapse6" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php
                                        if (!empty($informacion)) {
                                            foreach ($informacion as $info) {
                                                if ($info['keyword'] == 'Margen de Solvencia 2014') {
                                                    echo '<li><a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                            <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                                                }
                                            }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }// fin de informacion financiera
                if ($idcat == 'lavadoActivos' || $idcat == 'programaEducacion') {
                    $criteria2 = new CDbCriteria(array('condition' => "categoria='{$idcat}'", 'order' => 'name_real ASC'));
                    $informacion = Pdf::model()->findAll($criteria2);
                    if (!empty($informacion) && ($idcat != 'glosario')):
                        echo '<ul>';
                        foreach ($informacion as $info) {
                            echo '<li>
                                <a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '" target="_blank">
                                    <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                        }
                        echo '</ul>';
                    endif;
                } else {
                    if (!empty($informacion) && ($idcat != 'glosario')):
//                        echo '<ul>';
//                        foreach ($informacion as $info) {
//                            echo '<li>
//                                <a href="/ecuasuiza/uploads/pdf/' . $info['pdf'] . '">
//                                    <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
//                        }
//                        echo '</ul>';
                    endif;
                    ?>
                <?php } ?>
                <?php if ($idcat == 'indicadoresServicioCliente'): ?>
                    <div class="accordion" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    Cumplimiento de Siniestros 2014
                                </a>
                            </div>
                            <div id="collapseOne" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <ul>
                                        <?php foreach ($informacion as $info) { ?>
                                            <li>
                                                <a href="/ecuasuiza/uploads/pdf/<?php echo $info['pdf'] ?>" target="_blank">
                                                    <img src="<?php echo Yii::app()->request->baseUrl ?>/img/hogar/icon_pdf.png"/><?php  echo $info['name']; ?></a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <ul>
                    <?php
                    if (!empty($word) && ($idcat != 'glosario')) {
                        foreach ($word as $info) {
                            echo '<li><a href="/ecuasuiza/uploads/word/' . $info['word'] . '" target="_blank">
                                <img src="' . Yii::app()->request->baseUrl . '/img/hogar/icon_pdf.png"/>' . $info['name'] . '</a></li>';
                        }
                    }
                    ?>
                </ul>
            </div>

        </div>
    </div>
    <div class="span2">
        <div class="btn-cotizar">
            <a href="<?php echo Yii::app()->createUrl('site/contactenos') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/contactenos.jpg"/></a>
            <a href="<?php echo Yii::app()->createUrl('cotizador/cotizador') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/cotizar.jpg"/></a>
        </div>
    </div>
</div>
<div class="row">
    <div class="span11" id="divisor-down">
        <img src="<?php echo Yii::app()->request->baseUrl; ?>/img/line_down.png"/> 
    </div>
</div>
<div class="row cont-icos">
    <h4>OTROS PRODUCTOS ></h4>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 53)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_auto.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('hogar/index') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_hogar.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/individuales', array('id' => 54)) ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_vida.png"/></a></div>
    <div class="span2"><a href="<?php echo Yii::app()->createUrl('seguros/empresariales') ?>"><img src="<?php echo Yii::app()->request->baseUrl; ?>/img/hogar/seg_empresarial.png"/></a></div>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function () {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
</script>
