<?php
/**
 * Created by Artur Kupczak.
 */

require('Board.php');

class Chess extends Board {

	protected $solved_rows = 0;
	protected $solved_queens = 0;

	public function __construct()
	{
		$this->createQueen();
	}

	private function createQueen()
	{
		for($col = 0; $col < 7; $col++)
		{
			if($this->queenCanBePlacedAtTheLocation($col))
			{
				$this->addQueen($col);

				if($this->solved_queens === 7)
				{
					return true;
				}
				if($this->createQueen()){
					return true;
				}

				$this->removeQueen($col);
			}
		}

		return false;
	}


}