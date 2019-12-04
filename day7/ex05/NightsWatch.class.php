<?php
class NightsWatch implements IFighter
{
	private $arr = array();
	public function recruit($some)
	{
		$this->arr[] = $some;
	}
	public function fight()
	{
		foreach ($this->arr as $val)
			if (method_exists(get_class($val), 'fight'))
				$val->fight();
	}
}
?>
