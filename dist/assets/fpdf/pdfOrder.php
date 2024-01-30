<?php

require('./fpdf.php');

class PDF extends FPDF
{

   // Cabecera de página
   function Header()
   {
      include '../../databases/db.php';

      if(isset($_GET['id'])) {

         $id = $_GET['id'];

         $consulta_info = $conn->prepare("SELECT * FROM VIEW_ORDER WHERE id = ?");
         $consulta_info->bind_param("i", $id);
         $consulta_info->execute();
         $dato_info = $consulta_info->get_result()->fetch_object();
      } else {
         echo "Error: No se proporcionó el parámetro 'id' en la URL";

      }

      $this->Image('logo.png', 178, 10, 25); //logo de la empresa,moverDerecha,moverAbajo,tamañoIMG
      $this->SetFont('Arial', 'B', 16); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto

      $this->SetTextColor(48, 62, 108); //color
      $this->SetFillColor(228, 243, 248); //colorFondo
      //creamos una celda o fila
      $this->Cell(110, 15, utf8_decode('Detalle de la Orden de compra'), 0, 1, 'L', 0); // AnchoCelda,AltoCelda,titulo,borde(1-0),saltoLinea(1-0),posicion(L-C-R),ColorFondo(1-0)

      $this->SetTextColor(128, 138, 134); //color 218, 230, 237   199, 213, 218   146, 184, 217

      $this->SetFont('Arial', 'B', 10);
      $this->Cell(90, 10, utf8_decode("ID : " . $dato_info->id), 0, 0, '', 0);
      $this->Cell(90, 10, utf8_decode("Proveedor : " . $dato_info->company_name), 0, 0, '', 0);
      $this->Ln(7);

      $this->SetFont('Arial', 'B', 10);
      $this->Cell(90, 10, utf8_decode("RUC : " . $dato_info->ruc), 0, 0, '', 0);
      $this->Cell(90, 10, utf8_decode("Dirección : " . $dato_info->address), 0, 0, '', 0);
      $this->Ln(7);

      $date = explode(" ", $dato_info->date_time);
      $day = $date[0];
      $hour = $date[1];

      $this->SetFont('Arial', 'B', 10);
      $this->Cell(90, 10, utf8_decode("Fecha : " . $day), 0, 0, '', 0);
      $this->Cell(90, 10, utf8_decode("Hora : " . $hour), 0, 0, '', 0);
      $this->Ln(7);

      $this->SetFont('Arial', 'B', 10);
      $this->Cell(90, 10, utf8_decode("Requerimiento : " . $dato_info->id_requirement), 0, 0, '', 0);
      $this->Ln(10);

      /* TITULO DE LA TABLA */
      //color
      $this->SetTextColor(138, 148, 144); //199, 213, 218
      $this->SetFont('Arial', '', 12);
      $this->Cell(100, 10, utf8_decode("Productos de la Orden de compra"), 0, 1, '', 0);
      $this->Ln(1);

      /* CAMPOS DE LA TABLA */
      //color
      $this->SetFillColor(245, 245, 245); //colorFondo
      $this->SetTextColor(108, 118, 114); //colorTexto
      $this->SetDrawColor(163, 163, 163); //colorBorde
      $this->SetFont('Arial', 'B', 8);
      $this->Cell(15, 10, utf8_decode('ID'), 0, 0, 'C', 1);
      $this->Cell(70, 10, utf8_decode('Producto'), 0, 0, 'C', 1);
      $this->Cell(60, 10, utf8_decode('Categoria'), 0, 0, 'C', 1);
      $this->Cell(20, 10, utf8_decode('Precio'), 0, 0, 'C', 1);
      $this->Cell(23 , 10, utf8_decode('Cantidad'), 0, 1, 'C', 1);
   }

   // Pie de página
   function Footer()
   {
      include '../../databases/db.php';

      if(isset($_GET['id'])) {

         $id = $_GET['id'];

         $consulta_info = $conn->prepare("SELECT * FROM VIEW_ORDER WHERE id = ?");
         $consulta_info->bind_param("i", $id);
         $consulta_info->execute();
         $dato_info = $consulta_info->get_result()->fetch_object();
      } else {
         echo "Error: No se proporcionó el parámetro 'id' en la URL";

      }

      $this->SetY(-15); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 8); //tipo fuente, negrita(B-I-U-BIU), tamañoTexto
      $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C'); //pie de pagina(numero de pagina)

      $this->SetY(-35); // Posición: a 1,5 cm del final
      $this->SetFont('Arial', 'I', 10); //tipo fuente, cursiva, tamañoTexto
      
      $this->Cell(94, 5, utf8_decode('Monto de la Orden de Compra:'), 0, 0, 'L', 0); 
      $this->Cell(94, 5, utf8_decode('Sub Total:'), 0, 1, 'R', 0);
      $this->Cell(94, 5, utf8_decode('Nota: El monto de la Orden de compra incluye IGV.'), 0, 0, 'L', 0); 
      $this->Cell(94, 5, utf8_decode('S/. ' . $dato_info->subtotal), 0, 1, 'R', 0);
      $this->Cell(94, 5, utf8_decode(''), 0, 0, 'L', 0); 
      $this->Cell(94, 5, utf8_decode('Total:'), 0, 1, 'R', 0);
      $this->Cell(94, 5, utf8_decode(''), 0, 0, 'L', 0); 
      $this->Cell(94, 5, utf8_decode('S/. ' . $dato_info->total), 0, 1, 'R', 0);
      //$hoy = date('d/m/Y');
      //$this->Cell(355, 10, utf8_decode($hoy), 0, 0, 'C'); // pie de pagina(fecha de pagina)
   }
}

include '../../databases/db.php';
/* CONSULTA INFORMACION DEL HOSPEDAJE */

$pdf = new PDF();
$pdf->AddPage(); /* aqui entran dos para parametros (horientazion,tamaño)V->portrait H->landscape tamaño (A3.A4.A5.letter.legal) */
$pdf->AliasNbPages(); //muestra la pagina / y total de paginas

$i = 0;
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(88, 92, 108); //colorTexto
$pdf->SetDrawColor(203, 203, 203); //colorBorde

if(isset($_GET['id'])) {
   $id = $_GET['id'];

   $consulta_productos = $conn->prepare("SELECT * FROM PRODUCT_REQUIREMENT WHERE id = ?");
   $consulta_productos->bind_param("i", $id);
   $consulta_productos->execute();
   
   // Obtener el resultado de la consulta
   $resultados_productos = $consulta_productos->get_result();

   // Verificar si se encontraron resultados
   if($resultados_productos->num_rows > 0) {
       while ($datos_producto = $resultados_productos->fetch_object()) {
           /* TABLA */
           $pdf->Cell(15, 10, utf8_decode($datos_producto->pr_id), 1, 0, 'C', 0);
           $pdf->Cell(70, 10, utf8_decode($datos_producto->name), 1, 0, 'C', 0);
           $pdf->Cell(60, 10, utf8_decode($datos_producto->category_name), 1, 0, 'C', 0);
           $pdf->Cell(20, 10, utf8_decode($datos_producto->price), 1, 0, 'C', 0);
           $pdf->Cell(23, 10, utf8_decode($datos_producto->quantity), 1, 1, 'C', 0);
       }
   } else {
       echo "No se encontró ningún producto con el ID proporcionado.";
   }
} else {
   echo "Error: No se proporcionó el parámetro 'id' en la URL";
}

$pdf->Output('Detalle de la Orden de compra.pdf', 'D');//nombreDescarga, Visor(I->visualizar - D->descargar)
