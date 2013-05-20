<?php

Yii::import('ext.eexcelview.*');
	/**
	* @author Nikola Kostadinov
	* @license GPL
	* @version 0.2
	*/	

	class ReporteEgresoView extends EExcelView
	{
            
            public $bandera = null;
            public $subtotal_proyecto = null;
            public $total_proyecto = null;
		public function renderHeader()
		{
			$i=0;
                        $default_border = array(
                            'style' => PHPExcel_Style_Border::BORDER_THIN,
                            'color' => array('rgb'=>'000000')
                        );
                        
                        $style_header = array(
                            'borders' => array(
                                'bottom' => $default_border,
                                'left' => $default_border,
                                'top' => $default_border,
                                'right' => $default_border,
                            ),
                                                    'fill' => array(
                                'type' => PHPExcel_Style_Fill::FILL_SOLID,
                                'color' => array('rgb'=>'819FF7'),
                            ),
                            'font' => array(
                                'bold' => true,
                            )
                        );
                        
                      
                       
                        
			foreach($this->columns as $n=>$column)
			{
                           
				++$i;
				if($column->name!==null && $column->header===null)
				{
					if($column->grid->dataProvider instanceof CActiveDataProvider)
						$head = $column->grid->dataProvider->model->getAttributeLabel($column->name);
					else
						$head = $column->name;
				} else
					$head =trim($column->header)!=='' ? $column->header : $column->grid->blankDisplay;
                                self::$activeSheet->setCellValue($this->columnName($i)."1" ,$head);
                                self::$activeSheet->getStyle($this->columnName($i)."1" )->applyFromArray( $style_header );
			}			
		}
		public function renderFooter()//footer created by francis
		{
			
			$i=0;
			$data=$this->dataProvider->getData();
			$row=count($data);
			foreach($this->columns as $n=>$column)
			{
				$i=$i+1;
			  
					$footer =trim($column->footer)!=='' ? $column->footer : "";

				self::$activeSheet->setCellValue($this->columnName($i).($row+2),$footer);
			}			
		}
		
		// Main consuming function, apply every optimization you could think of
		public function renderBody()
		{
			if($this->disablePaging) //if needed disable paging to export all data
				$this->enablePagination = false;

			self::$data = $this->dataProvider->getData();
//                        $solicitudes = $this->dataProvider->getData();
//                                foreach ($solicitudes as $solicitud) {
//                                    
//                                    print_r($solicitud);
//                                    echo "nombre de la wea: ".$solicitud->proyecto->nombre;
//                            
//                                }
                                
                        
			$n=count(self::$data);

			if($n>0)
				for($row=0; $row < $n; ++$row)
					$this->renderRow($row);
                                
		}
		

		public function renderRow($row)
		{
			$i=0;
                        
			foreach($this->columns as $n=>$column):
                                
                           
                                
                                
				if($column->value!==null) 
					$value=$this->evaluateExpression($column->value ,array('row'=>$row,'data'=>self::$data));
				  
				else if($column->name!==null) 
				{
				   //edited by francis to support relational dB tables
					$condition= explode(";", $column->name);
					$value=$column->name;
                                        
					// I don't understand this piece of code (the conditions and all that stuff), when these conditions will meet?
					// Francis, if you see this code ever again, please comment
					$countCondition = count($condition);

					if($countCondition==6 || $countCondition==5):
						switch($countCondition):
							case 6:
								$cond1=$this->dataProcess($condition[0],$row);
								if($condition[3]=='true')
									$cond2=$condition[2];
								else
									$cond2=$this->dataProcess($condition[2],$row);

								$cond3=$this->dataProcess($condition[4],$row);
								$cond4=$this->dataProcess($condition[5],$row);
								break;
							case 5:
								$cond1=$this->dataProcess($condition[0],$row);
								$cond2=$this->dataProcess($condition[2],$row);
								$cond3=$this->dataProcess($condition[3],$row);
								$cond4=$this->dataProcess($condition[4],$row);
								break;
							default:
								break;
						endswitch;

						switch($condition[1]):
							case '==':
								$value = ($cond1==$cond2)? $cond3 : $cond4;
								break;
							case '!=':
								$value = ($cond1!=$cond2)? $cond3 : $cond4;
								break;				
							case '<=':
								$value = ($cond1<=$cond2)? $cond3 : $cond4;
							case '>=':
								$value = ($cond1>=$cond2)? $cond3 : $cond4;
								break;
							case '<':
								$value = ($cond1<$cond2)? $cond3 : $cond4;
							case '>':
								$value = ($cond1>$cond2)? $cond3 : $cond4;
							default:
								break;	
						endswitch;

					elseif($countCondition!=1):
						$value='';
					else:
						$value=$this->dataProcess($column->name,$row);
					endif;
				}
				
				//date edited francis  
				$dateF= explode("-", $value);
				$c1=count($dateF);
					 
				if($c1==3 && $dateF[0]<9000 && $dateF[1]<13 && $dateF[2]<32)//{}
					$value=$dateF[2].'/'.$dateF[1].'/'.$dateF[0];
				//end of date  
				
				$value=$value===null ? "" : $column->grid->getFormatter()->format($value,$column->type);

				// Write to the cell (and advance to the next)
				
                                
//                                Editado por: Sergio Cárdenas Espinoza
//                                Lógica:
//                                CUANDO LA INFORMACION ESTA LISTA PARA SER IMPRESA
//                                SE APLICA LA SIGUIENTE LOGICA PARA IMPRIMIR INFORMES
//                                QUE NO SE IMPRIMA DE FORMA REPETIDA LOS PROYECTOS
//                                Y SE HAGA UNA SUMA POR PROYECTO Y UNA TOTAL.
                                 if($column->name=='total'):
                                     $this->total_proyecto = $value;
                                 endif;
                                 
                                 
                                 if($column->name=='centroCosto'){
                                    if($this->bandera!=$value){
                                        $this->bandera = $value;
                                        self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , $value);
                                    }else{
                                        self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , '');
                                    }
                                        
                                    }else{
                                        self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , $value);
                                    }
//                                    else{
//                                        self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , $value);
//                                   }
                                
                                
                                //self::$activeSheet->setCellValue( $this->columnName(++$i).($row+2) , $value);
                                
			endforeach;
			
			// As we are done with this row we DONT need this specific record
			unset(self::$data[$row]);		
		}

		public function dataProcess($name,$row)
		{
			// Separate name (eg person.code into array('person', 'code'))
			$separated_name = explode(".", $name);
			
			// Count 
			$n=count($separated_name);
				
			// Create a copy of  the data row. Now we can "dive" trough the array until we reach the desired value
			// (because is nested)
			$aux = self::$data[$row]; //if n is greater than zero, we will loop, if not, $aux actually holds the desired value

			for($i=0; $i < $n; ++$i)
				$aux = $aux[$separated_name[$i]]; // We keep a deeper reference each time

			return $aux;
		}	
				
		public function run()
		{
			$this->renderHeader();
			$this->renderBody();	
			$this->renderFooter();
			
			//set auto width
			if($this->autoWidth)
				foreach($this->columns as $n=>$column)
					self::$objPHPExcel->getActiveSheet()->getColumnDimension($this->columnName($n+1))->setAutoSize(true);
			
			//create writer for saving
			$objWriter = PHPExcel_IOFactory::createWriter(self::$objPHPExcel, $this->exportType);
			if(!$this->stream)
				$objWriter->save($this->filename);
			else //output to browser
			{
				if(!$this->filename)
					$this->filename = $this->title;
                                if (ob_get_length() > 0) {
                                  ob_end_clean();
                                }
				header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
				header('Pragma: public');
				header('Content-type: '.$this->mimeTypes[$this->exportType]['Content-type']);
				header('Content-Disposition: attachment; filename="'.$this->filename.'.'.$this->mimeTypes[$this->exportType]['extension'].'"');
				header('Cache-Control: max-age=0');				
				$objWriter->save('php://output');			
				Yii::app()->end();
			}
		}

		/**
		* Returns the coresponding excel column.(Abdul Rehman from yii forum)
		* 
		* @param int $index
		* @return string
		*/
		public function columnName($index)
		{
			--$index;
			if($index >= 0 && $index < 26)
				return chr(ord('A') + $index);
			else if ($index > 25)
				return ($this->columnName($index / 26)).($this->columnName($index%26 + 1));
			else
				throw new Exception("Invalid Column # ".($index + 1));
		}		
		
	}