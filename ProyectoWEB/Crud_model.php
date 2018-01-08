<?php
	requitre _DIR_ . '/../autoload.php';
	use Mike42\Escpos\Printer;
	use Mike42\escpos\EscposImage;
	use Mike42\Escpos\PrintConnectors\FilePrintConnector;
	use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

	if (!defined('BASEPATH'))
		

		function imprimir_entrada($placa, $date, $horae, $tipo)
		{
			try{
				$connector = new WindowsPrintConnector("Facturas");
				$printer = new Printer($connector);
				$printer -> selectPrintMode(Printer::MODE_DOUBLE_WIDTH);
				$printer -> setJustification(Printer::JUSTIFY_CENTER);

				$system_name =$this->db->get_where('settings', array('type' => 'system_name')) ->row()->description;
				$dueno_name = $this->db->get_where('settings', array('type' => 'nombre_dueno'))->row()->description;
				$nit =$this->db->get_where('settings', array('type' =>'nit'))->row()->description;
				$direccion =$this->db->get_where('settings', array('type' =>'address'))->row()->description;
				$celular =$this->db->get_where('settings', array('type' =>'cellphone'))->row()->description;

				$printer -> setTextSize(2,2);
				$printer -> text($system_name . "\n");
				$printer -> feed();
				$printer -> selectPrintMode();
				$printer -> text($dueno_name . "\n");
				$printer -> text("NIT: " . $nit . "\n");
				$printer -> text("DIR: " . $direccion . "\n");
				$printer -> text("CELULAR -" . $celular . "\n");
				$printer -> feed();

				$printer -> setEmphasis(true);
				$printer -> text("INGRESO \n");
				$printer -> text("--------------------------------------------\n");
				$printer ->setTextSize(4,3);
				$printer ->text "Placa " . $placa . "\n";
				$printer -> selectPrintMode();
				$printer -> text("--------------------------------------------\n");
				$printer -> setEmphasis(false);

				$printer -> selectPrintMode();
				$printer -> text("Fecha Entrada                     =" .$datefecha . "\n");
				$printer -> text("Hora Entrada                      =" .$datehora . "\n");
				$printer -> cut();
    
			    /* Close printer */
			    $printer -> close();
				} catch (Exception $e) {
   				 echo "Couldn't print to this printer: " . $e -> getMessage() . "\n";
				}
		}


	}
?>