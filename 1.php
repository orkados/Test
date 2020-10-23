	<?php 

	function findSimple($a, $b)
	{
		$stack = array();
		for ($i = $a; $i <= $b; $i++) {
			$flag = true;
			for ($j = 2; $j < $i; $j++) {
				if ($i % $j == 0 && $i != $j) {
					$flag = false;
					break;
				}
			}
			if($flag)
			{
				array_push($stack, $i);
			}

		}
		return $stack;
	}

	function createTrapeze($a)
	{
		$stack = array();
		$quantity = count($a) / 3;
		$tmp_array = array();

		for ($i = 0; $i < $quantity; $i++) {
			$tmp_array= array(
				'a' => $a[$i*3],
				'b' => $a[$i*3 + 1],
				'c' => $a[$i*3 + 2],
			);
			array_push($stack, $tmp_array);
		}
		return ($stack);
	}


	function  squareTrapeze($a)
	{
		$quantity = count($a);
		for ($i = 0; $i < $quantity; $i++) {
			$a[$i] += ['s' => ($a[$i]['a'] + $a[$i]['b']) / 2 * $a[$i]['c']];
		}
		return ($a);
	}

	function  getSizeForLimit($a, $b)
	{
		$max_area = 0;
		$quantity = count($a);
		$stack = array();
		for ($i = 0; $i < $quantity; $i++) {
			if($a[$i]['s'] > $max_area && $a[$i]['s'] <= $b){
				$stack = $a[$i];
			}
		}
		return ($stack);
	}

	// Test
	//$temp_array = array(1,2,3,4,5,6);
	//print_r(getSizeForLimit(squareTrapeze(createTrapeze($temp_array)), 33));

	function getMin($a)
	{
		$min;
		foreach ($a as $value) {
			if($min == NULL || $min > $value) {
				$min = $value;
			}
		}
		return ($min);
	}

	// Test
	//$temp_array = array(12,22,3,41,56,611);
	//print_r(getMin($temp_array));


	function printTrapeze($a){
		$rows = count($a); // количество строк, tr
		$cols = 4; // количество столбцов, td

		$table = '<table border="1">';

		for ($tr = 0; $tr < $rows; $tr++){

			if($a[$tr]['s'] % 2 == 0 && !is_float($a[$tr]['s'])) {
				$table .= '<tr style="background-color:#FF0000">';
			}
			else
			{
				$table .= '<tr style="background-color:#FFFFFF">';
			}

			$table .= '<td>'. $a[$tr]['a'] .'</td>';
			$table .= '<td>'. $a[$tr]['b'] .'</td>';
			$table .= '<td>'. $a[$tr]['c'].'</td>';
			$table .= '<td>'. $a[$tr]['s'].'</td>';
			$table .= '</tr>';
		}

		$table .= '</table>';
		echo $table; 
	}

	//Test
	//$temp_array = array(12,222,2,41,56,611);
	//printTrapeze(squareTrapeze(createTrapeze($temp_array)), 33);

	class BaseMath {
		public $a;
		public $b;
		public $c;
		protected $f;

		public function __construct($a, $b, $c) {
			$this->a = $a;
			$this->b = $b;
			$this->c = $c;
		}

		public static function exp1($a, $b, $c) {
			return ($a * pow($b, $c));
		}

		public static function exp2($a, $b, $c) {
			if ($b != 0) {
				return pow($a / $b, $c);
			}

			else{
				return "Division by zero!";
			}

		}

		function getValue() {
			return "$this->f";
		}
	}


	class F1 extends BaseMath
	{
		public function __construct($a, $b, $c)
		{
			parent::__construct($a, $b, $c);
			$this->f = parent::exp1($a, $b, $c) + pow((parent::exp2($a, $c, $b) % 3), min($a, $b, $c));
		}
	}

	?>