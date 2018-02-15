<?php
/**
 * Created by Artur Kupczak.
 */

require('Board.php');

class Chess extends Board {

	public $board;

	public function __construct()
	{
		$this->board = new Board();
		$this->createQueen();
	}

	private function createQueen()
	{
		for($col = 0; $col < 7; $col++)
		{
			if($this->board->queenCanBePlacedAtTheLocation($col))
			{
				$this->board->addQueen($col);

				if($this->board->solved_queens === 7)
				{
					return true;
				}
				if($this->createQueen()){
					return true;
				}

				$this->board->removeQueen($col);
			}
		}

		return false;
	}


}